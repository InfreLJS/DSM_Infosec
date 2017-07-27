<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT freeboard.id, title, description, created, users.name, author, best, fileexist, files FROM freeboard LEFT JOIN users ON freeboard.author = users.id WHERE freeboard.id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['author'] == $_SESSION['user_id'] || in_array($_SESSION['user_id'], $freeboardManager)) {
            $enable = 1;
        } else {
            $enable = 0;
        }

        echo '{
            "id":"'.$row['id'].'",
            "title":"'.$row['title'].'",
            "desc":"'.$row['description'].'",
            "created":"'.$row['created'].'",
            "best":"'.$row['best'].'",
            "author":"'.$row['name'].'",
            "enable":"'.$enable.'",
            "fileexist":"'.$row['fileexist'].'",
            "files":"'.$row['files'].'"
        }';
    }
?>