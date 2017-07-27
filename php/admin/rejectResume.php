<?php
    require("admins.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (!in_array($_SESSION['user_id'], $admins)) {
        echo '{"status":"n"}';
        exit;
    }

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "DELETE FROM userresume WHERE id = '{$id}'";
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        echo '{"status":"x"}';
        exit;
    }
?>