<?php
    require("assignmentManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if (in_array($_SESSION['user_id'], $assignmentManager)) {
            $sql = "DELETE FROM assignment WHERE id='$id'";
            mysqli_query($conn, $sql);
            exit;
        }
    }
?>
