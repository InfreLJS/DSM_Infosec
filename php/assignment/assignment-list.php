<?php
    require("assignmentManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    if (isset($_GET['page'])){
        $page = mysqli_real_escape_string($conn, $_GET['page']);
    } else {
        $page = 1;
    }

    $sql = "SELECT id, title, subject, until, IF(until < now(), 0, 1) AS end FROM assignment ORDER BY end DESC, until ASC LIMIT ".$pageLimit." OFFSET ".(($page-1)*$pageLimit);
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?=htmlspecialchars($subjectArr[$row['subject']])?></td>
    <td><a href="#" onclick="showAssignment(<?=$row['id']?>); return false;"><?=htmlspecialchars($row['title'])?></a></td>
    <td><?=date("Y년 m월 d일 h시 i분 A",strtotime($row['until']))?></td>
    <td><?php if($row['end']){echo 'X';}else{echo 'O';}?></td>
</tr>
<?php } ?>