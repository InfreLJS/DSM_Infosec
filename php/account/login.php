<?php
    require_once('../admin/admins.php');
    require_once('../db/connect-db.php');
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '{"status":"a"}';
        exit;
    }

    if (isset($_POST['id']) && isset($_POST['pw'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $pw = hash("sha256", mysqli_real_escape_string($conn, $_POST['pw']));
        $sql = "SELECT id FROM users WHERE id='$id' AND pw='$pw'";
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['user_id'] = $row['id'];
            if(in_array($_SESSION['user_id'], $admins))
                echo '{"status":"m"}';
            else
                echo '{"status":"s"}';
        } else {
            echo '{"status":"f"}';
            exit;
        }
    } else {
        echo '{"status":"x"}';
        exit;
    }
?>