<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['page'])){
        $page = mysqli_real_escape_string($conn, $_GET['page']);
    } else {
        $page = 1;
    }

    $sql = "SELECT freeboard.id, freeboard.title, freeboard.author, users.name, freeboard.created, best, count(comment.id) as comments FROM freeboard LEFT JOIN users ON freeboard.author = users.id LEFT JOIN comment ON freeboard.id = comment.post GROUP BY freeboard.id ORDER BY freeboard.id DESC LIMIT ".$pageLimit." OFFSET ".(($page-1)*$pageLimit);
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><a href="#" onclick="showPost(<?=$row['id']?>); return false;"><?=htmlspecialchars($row['title'])?></a></td>
    <td><a href="#" onclick="showResume(<?=$row['author']?>); return false;"><?=htmlspecialchars($row['name'])?></a></td>
    <td><?=htmlspecialchars($row['created'])?></td>
    <td id="freeboard-table-comment-<?=$row['id']?>"><?=$row['comments']?></td>
    <td><?=$row['best']?></td>
</tr>
<?php } ?>