<?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        echo 'Not Logined';
        exit;
    }
?>