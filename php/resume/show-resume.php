<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT name, title, description, type, startdate, enddate, allowed FROM userresume LEFT JOIN users ON userresume.user=users.stu_id WHERE userresume.id='{$id}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['allowed'] == '1'){
            $allowed = '등록됨';
        }else {
            $allowed = '등록 안 됨';
        }

        echo '{
            "user":"'.htmlspecialchars($row['name']).'",
            "title":"'.htmlspecialchars($row['title']).'",
            "desc":"'.htmlspecialchars($row['description']).'",
            "type":"'.$row['type'].'",
            "startdate":"'.date("Y년 m월 d일", strtotime($row['startdate'])).'",
            "enddate":"'.date("Y년 m월 d일", strtotime($row['enddate'])).'",
            "allowed":"'.$allowed.'"
        }';
    }
?>