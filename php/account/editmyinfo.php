<?php
    require_once('../db/connect-db.php');
    require("logincheck.php");

    if (isset($_POST['name']) && isset($_POST['stu_id']) && isset($_POST['birthday']) && isset($_POST['message'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $stu_id = mysqli_real_escape_string($conn, $_POST['stu_id']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $sql = "UPDATE users SET name='{$name}', stu_id='{$stu_id}', birthday='{$birthday}', message='{$message}' WHERE id='{$_SESSION['user_id']}'";
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        echo '{"status":"x"}';
        exit;
    }
?>