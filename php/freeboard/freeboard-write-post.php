<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $sql = "SELECT id FROM freeboard WHERE id IN (SELECT MAX(id) FROM freeboard)";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $post_id = ((int)$row['id'] + 1);
        $sql = "ALTER TABLE freeboard AUTO_INCREMENT = ".$post_id;
        if (count($_FILES)!=0 && count($_FILES)<=10) {
            $fileUploadDir = "../../files/".$_SESSION['user_id']."/";
            $files = "";
            $fileext = "";
            mysqli_query($conn, $sql);
            for ($i=1; $i<=count($_FILES); $i++) {
                if ($_FILES['writePost_file'.(count($_FILES)-$i+1)]['type'] != "") {
                    $fileext = $fileext.pathinfo($_FILES['writePost_file'.(count($_FILES)-$i+1)]['name'])['extension'].".";
                    $uploadFile = $fileUploadDir.$post_id.$i.'.'.pathinfo($_FILES['writePost_file'.(count($_FILES)-$i+1)]['name'])['extension'];
                    if (!is_dir($fileUploadDir)) {
                        mkdir($fileUploadDir, 0700, true);
                    }
                    if (!move_uploaded_file($_FILES['writePost_file'.(count($_FILES)-$i+1)]['tmp_name'], $uploadFile)) {
                        echo '{"status":"f"}';
                        exit;
                    } else {
                        $files = "<img src=\'".substr($uploadFile, 6)."\' alt=\'".basename($_FILES['writePost_file'.(count($_FILES)-$i+1)]['name'])."\' width=\'100%\'><br>".$files;
                    }
                }
            }
            $sql = "INSERT INTO freeboard (title, description, author, created, files, fileexist, fileext) VALUES('".$title."', '".$desc."', '".$user_id."', now(), '$files','".count($_FILES)."', '".$fileext."')";
        } else {
            $sql = "INSERT INTO freeboard (title, description, author, created) VALUES('".$title."', '".$desc."', '".$user_id."', now())";
        }
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        echo '{"status":"x"}';
    }
?>