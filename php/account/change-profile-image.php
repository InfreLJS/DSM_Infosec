<?php
    require_once('../db/connect-db.php');
    require("logincheck.php");
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $allowedExt = array('png','jpg','jpeg','tif','tiff','gif');

    if ($_FILES['profile_image']['type'] != "" && in_array(pathinfo($_FILES['profile_image']['name'])['extension'], $allowedExt)) {
        $fileUploadDir = "../../files/".$_SESSION['user_id']."/";
        $fileext = pathinfo($_FILES['profile_image']['name'])['extension'];
        $uploadFile = $fileUploadDir.'profile.'.pathinfo($_FILES['profile_image']['name'])['extension'];
        if (!is_dir($fileUploadDir)) {
            mkdir($fileUploadDir, 0700, true);
        }
        if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadFile)) {
            echo '{"status":"f"}';
            exit;
        }
        $sql = "UPDATE users SET profile=1, profileext='{$fileext}' WHERE id='{$user_id}'";
        mysqli_query($conn, $sql);
        echo '{"status":"s"}';
        exit;
    } else {
        $sql = "SELECT profileext FROM users WHERE id='{$user_id}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(!@unlink("../../files/".$_SESSION['user_id']."/profile.".$row['profileext'])) {
            echo '{"status":"f"}';
            exit;
        }
        $sql = "UPDATE users SET profile=0, profileext=NULL WHERE id='{$user_id}'";
        mysqli_query($conn, $sql);
        echo '{"status":"x"}';
        exit;
    }
?>