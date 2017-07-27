<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");
    session_start();
    
    if($_POST['type']=="list") {
        $id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $sql = "SELECT comment.id, author, users.name, description, created FROM comment LEFT JOIN users ON comment.author = users.id WHERE post='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows == 0) {
?>
<div id="comment-none"><p>댓글 없음!</p></div>
<input type="hidden" id="comment-count" value="0">
<?php   } else { ?>
<table id="comment-table" class="table table-condensed">
<?php       while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td>
            <p style="text-align: right;">작성자 : <?=htmlspecialchars($row['name'])?> / 작성 일시 : <?=$row['created']?></p>
            <p class="comment-description" id="comment-<?=$row['id']?>-desc" style="text-align: left;"><?=htmlspecialchars($row['description'])?></p>
<?php           if ($_SESSION['user_id'] == $row['author'] || in_array($_SESSION['user_id'], $freeboardManager)) { ?>
            <p class="comment-btn-group" id="comment-<?=$row['id']?>-btn-group" style="text-align: right;"><a id="comment-delete" onclick="deleteComment(<?=$row['id']?>,<?=$_POST['post_id']?>);">삭제</a> <a id="comment-modify" onclick="modifyComment(<?=$row['id']?>,<?=$_POST['post_id']?>,0);">수정</a></p>
<?php           } ?>
        </td>
    </tr>
<?php       } ?>
</table>
<?php   }
    } elseif($_POST['type']=="write") {
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $sql = "INSERT INTO comment (author, description, created, post) VALUES ('$user_id', '$desc', now(), '$post_id')";
        mysqli_query($conn, $sql);
    } elseif($_POST['type']=="delete") {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT author FROM comment WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['author'] == $_SESSION['user_id']) {
            $sql = "DELETE FROM comment WHERE id=$id";
            mysqli_query($conn, $sql);
        }
        exit;
    } elseif($_POST['type']=="modify") {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $desc  = mysqli_real_escape_string($conn, $_POST['desc']);
        $sql = "SELECT author FROM comment WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['author'] == $_SESSION['user_id']) {
            $sql = "UPDATE comment SET description='".$desc."' WHERE id='".$id."'";
            mysqli_query($conn, $sql);
        }
        exit;
    } elseif($_POST['type']=="count") {
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
        $sql = "SELECT count(id) AS count FROM comment WHERE post='$post_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['count'];
    }
?>