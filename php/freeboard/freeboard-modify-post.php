<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $desc  = mysqli_real_escape_string($conn, $_POST['desc']);
        $sql = "SELECT author FROM freeboard WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['author'] == $_SESSION['user_id']) {
            $sql = "UPDATE freeboard SET title=$title, description=$desc WHERE id=$id";
            mysqli_query($conn, $sql);
            echo '{"status":"s"}';
            exit;
        }
        echo '{"status":"x"}';
        exit;
    }
?>