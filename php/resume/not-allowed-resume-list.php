<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $sql = "SELECT userresume.id, title, resumetype.name FROM userresume LEFT JOIN resumetype ON userresume.type=resumetype.id WHERE user='".$user_id."' AND allowed=0";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?=htmlspecialchars($row['id'])?></td>
    <td><?=htmlspecialchars($row['name'])?></td>
    <td><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=htmlspecialchars($row['title'])?></a></td>
    <td><a href="#" onclick="cancelAddResume('<?=htmlspecialchars($row['id'])?>'); return false;">취소</a></td>
</tr>
<?php } ?>