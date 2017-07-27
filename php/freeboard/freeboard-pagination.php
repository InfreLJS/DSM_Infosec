<?php
    require("freeboardManager.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");

    $page = mysqli_real_escape_string($conn, $_GET['page']);
    $sql = "SELECT count(id) AS c FROM freeboard";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numOfPage = ceil($row['c']/$pageLimit);
    $firstPage = ((ceil((float)$page/5)-1)*5)+1;
    if ($firstPage-1<1) {
?>
<ul class="pagination"><li class="disabled"><a href="#"><span>&laquo;</span></a></li>
<?php } else { ?>
<ul class="pagination"><li><a href="#" onclick="freeboardPage=<?=$firstPage-1?>; refreshFreeboard(); return false;"><span>&laquo;</span></a></li>
<?php }
    for ($i=0; $i < 5; $i++) {
        if ($firstPage+$i>$numOfPage) { ?>
    <li class="disabled"><a href="#"><?=$firstPage+$i?></a></li>
<?php } elseif ($page == $firstPage+$i) { ?>
    <li class="active"><a href="#" onclick="freeboardPage=<?=$firstPage+$i?>; refreshFreeboard(); return false;"><?=$firstPage+$i?></a></li>
<?php } else { ?>
    <li><a href="#" onclick="freeboardPage=<?=$firstPage+$i?>; refreshFreeboard(); return false;"><?=$firstPage+$i?></a></li>
<?php } } if ($firstPage+5>$numOfPage) { ?>
    <li class="disabled"><a href="#"><span>&raquo;</span></a></li>
</ul>
<?php } else { ?>
    <li><a href="#" onclick="freeboardPage=<?=$firstPage+5?>; refreshFreeboard(); return false;"><span>&raquo;</span></a></li>
</ul>
<?php } ?>