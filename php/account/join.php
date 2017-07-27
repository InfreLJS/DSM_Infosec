<?php
    require_once('../db/connect-db.php');
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '{"status":"a"}';
        exit;
    }

    if (isset($_POST['id']) && isset($_POST['pw'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $stu_id = mysqli_real_escape_string($conn, $_POST['stu_id']);
        $pw = hash("sha256", mysqli_real_escape_string($conn, $_POST['pw']));
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $sql = "SELECT id FROM users WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows >= 1) {
            echo '{"status":"e"}';
        } else {
            $sql = "INSERT INTO users (id, stu_id, pw, name, birthday, message) VALUES ('$id', '$stu_id', '$pw', '$name', '$birthday', '$message')";
            mysqli_query($conn, $sql);
            echo '{"status":"s"}';
            exit;
        }
    } else {
        echo '{"status":"x"}';
        exit;
    }
?>