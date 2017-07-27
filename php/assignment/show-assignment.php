<?php
    require("assignmentManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT id, title, description, subject, until FROM assignment WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (in_array($_SESSION['user_id'], $assignmentManager)) {
            $enable = 1;
        } else {
            $enable = 0;
        }

        echo '{
            "id":"'.htmlspecialchars($row['id']).'",
            "title":"'.htmlspecialchars($row['title']).'",
            "desc":"'.preg_replace('/\r\n|\r|\n/','\n',htmlspecialchars($row['description'])).'",
            "subject":"'.htmlspecialchars($row['subject']).'",
            "until":"'.htmlspecialchars($row['until']).'",
            "enable":"'.$enable.'"
        }';
        exit;
    }
?>