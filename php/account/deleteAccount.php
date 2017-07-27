<?php
    require("../db/connect-db.php");
    require("logincheck.php");
    require("../functions.php");

    removeDir("../../files/".$_SESSION['user_id']);

    $sql = "DELETE FROM users WHERE id='".$_SESSION['user_id']."'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM freeboard WHERE author='".$_SESSION['user_id']."'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM comment WHERE author='".$_SESSION['user_id']."'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM userresume WHERE user='".$_SESSION['user_id']."'";
    mysqli_query($conn, $sql);
    
    session_destroy();
    exit;
?>
