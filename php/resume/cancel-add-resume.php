<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $sql = "SELECT user FROM userresume WHERE id='{$id}' AND allowed=0";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['user'] == $_SESSION['user_id']){
            $sql = "DELETE FROM userresume WHERE id={$id}";
            mysqli_query($conn, $sql);
            echo '{"status":"s"}';
            exit;
        } else {
            echo '{"status":"n"}';
            exit;
        }
    } else {
        echo '{"status":"x"}';
        exit;
    }
?>