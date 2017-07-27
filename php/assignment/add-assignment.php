<?php
    require("assignmentManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $until = mysqli_real_escape_string($conn, $_POST['until']);
        $sql = "SELECT id FROM assignment WHERE id IN (SELECT MAX(id) FROM assignment)";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = ((int)$row['id'] + 1);
        $sql = "ALTER TABLE assignment AUTO_INCREMENT = ".$id;
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO assignment (title, description, subject, until) VALUES('".$title."', '".$desc."', '".$subject."', '".$until."')";
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        echo '{"status":"x"}';
    }
?>