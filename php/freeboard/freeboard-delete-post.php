<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT author, fileexist, fileext FROM freeboard WHERE id='".$id."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['author']==$_SESSION['user_id'] || in_array($_SESSION['user_id'], $freeboardManager)) {
            if ($row['fileexist']!='0') {
                $fileext = explode(".", $row['fileext']);
                for($i=1; $i<=$row['fileexist']; $i++) {
                    if (!@unlink("../../files/".$_SESSION['user_id']."/".$_GET['id'].$i.".".$fileext[$i-1])) {
                        echo 'file delete fail';
                        exit;
                    }
                }
            }
            $sql = "DELETE FROM freeboard WHERE id='".$id."'";
            mysqli_query($conn, $sql);
        }
    }
?>
