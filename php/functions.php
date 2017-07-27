<?php
    function removeDir ($path)
    {
        // 디렉토리 구분자를 하나로 통일시킴
        $path = str_replace('\'', '/', $path);
        
        // 경로 마지막에 존재하는 디렉토리 구분자는 삭제
        if ($path[(strlen($path)-1)] == '/') {
            $tmp = '';
            for ($i=0; $i < (strlen($path) -1); $i++) {
                $tmp .= $path[$i];
            }
            $path = $tmp;
        }
        
        // 존재하는 디렉토리인지 확인
        // 존재하지 않으면 false를 반환
        if (!file_exists($path)) {
            return false;
        }
        
        // 디렉토리 핸들러 생성
        $oDir = dir($path);
        
        // 디렉토리 하부 컨텐츠 각각에 대하여 분석하여 삭제
        while (($entry = $oDir->read())) {
            // 상위 디렉토리를 나타내는 문자열인 경우 처리하지 않고 continue
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            
            // 또 다른 디렉토리인 경우 함수 실행
            // 파일인 경우 즉시 삭제
            if (is_dir($path.'/'.$entry)) {
                removeDir($path.'/'.$entry);
            } else {
                unlink($path.'/'.$entry);
            }
        }
        
        // 해당 디렉토리 삭제
        rmdir($path);
        
        // 결과에 따라 해당 디렉토리가 삭제되지 않고 존재하면 false를 반환 반대의 경우에는 true를 반환
        if (file_exists($path)) {
            return false;
        } else {
            return true;
        }
    }
?>