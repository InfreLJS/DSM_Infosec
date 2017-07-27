<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
        $enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $sql = "SELECT id FROM userresume WHERE id IN (SELECT MAX(id) FROM userresume)";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = ((int)$row['id'] + 1);
        $sql = "ALTER TABLE userresume AUTO_INCREMENT = ".$id;
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO userresume (title, description, type, startdate, enddate, user) VALUES('".$title."', '".$desc."', '".$type."', '".$startdate."', '".$enddate."', '".$user_id."')";
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        echo '{"status":"x"}';
    }
?>