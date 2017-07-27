<?php
    require("assignmentManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_POST['title']) && isset($_POST['desc'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $desc  = mysqli_real_escape_string($conn, $_POST['desc']);
        $until = mysqli_real_escape_string($conn, $_POST['until']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        if (in_array($_SESSION['user_id'], $assignmentManager)) {
            $sql = "UPDATE assignment SET title='$title', description='$desc', subject='$subject', until='$until' WHERE id='$id'";
            mysqli_query($conn, $sql);
            echo '{"status":"s"}';
            exit;
        }
        echo '{"status":"x"}';
        exit;
    }
?>