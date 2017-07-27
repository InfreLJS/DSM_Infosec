<?php
    require("php/admin/admins.php");
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>대덕소프트웨어마이스터고 정보보안과</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 파비콘 -->
        <link href="image/pavicon128.jpg?ver=0.1" rel="shortcut icon">
        <!-- 부트스트랩 css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- 나눔고딕 폰트 -->
        <link href="font/nanumgothic/css/nanumgothic.css" rel="stylesheet">
        <!-- css -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery, jQuery Cookie -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <!-- 부트스트랩 js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- js -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <!-- 네비게이션 -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="navbar-header" href="#top" onclick="movePage('home'); return false;">
                    <img src="image/logo.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#top">Top</a>
                    </li>
                    <li>
                        <a href="#introduce">소개</a>
                    </li>
                    <li>
                        <a href="#work">활동</a>
                    </li>
                    <li>
                        <a href="#members">구성원</a>
                    </li>
                    <li>
                        <a href="#contact">CONTACT</a>
                    </li>
                    <?php if(isset($_SESSION['user_id'])) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">For Members <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="movePage('myinfo'); return false;">내 정보</a></li>
                            <li><a href="#" onclick="movePage('resume'); return false;">레주메</a></li>
                            <li><a href="#" onclick="movePage('freeboard'); return false;">자유게시판</a></li>
                            <li><a href="#" onclick="movePage('assignment'); return false;">과제</a></li>
                            <?php if(in_array($_SESSION['user_id'], $admins)) { ?>
                            <li><a href="#" onclick="movePage('admin'); return false;">For Admin</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="#" id="logout-button" onclick="logout(); return false;">로그아웃</a></li>
                    <?php } else { ?>
                    <li class="dropdown">
                    </li>
                    <li><a id="login-button" data-toggle="modal" data-target="#login-modal">로그인</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <article>
        </article>
    </body>
</html>
