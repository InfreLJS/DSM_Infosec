<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");
    if(isset($_GET['user_id'])) {
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    } else {
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);        
    }
?>

<tr>
    <td width="150px" rowspan="3">
        <?php
            $sql = "SELECT name, birthday, message, profile, profileext FROM users WHERE id='{$user_id}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($row['profile'] == '1') {
        ?>
        <img src="files/<?=htmlspecialchars($user_id)?>/profile.<?=htmlspecialchars($row['profileext'])?>" alt="profile photo" class="img-thumbnail" style="width:150px;">
        <?php } else { ?>
        <img src="image/no-profile.jpg" alt="profile photo" class="img-thumbnail" style="width:150px;">
        <?php } ?>
    </td>
    <td width="100px;">이 &nbsp;름</td>
    <td><?=$row['name']?></td>
</tr>
<tr>
    <td>생 &nbsp;일</td>
    <td><?=date("Y년 m월 d일",strtotime($row['birthday']."00:00:00"))?></td>
</tr>
<tr>
    <td>메시지</td>
    <td><?=$row['message']?></td>
</tr>
<tr>
    <td>전 &nbsp;공</td>
    <td colspan="3">정보보안과</td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=1";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>관 &nbsp;심<br>분 &nbsp;야</td>
    <td colspan="3">
        <ul style="padding:0px; margin:0px;">
            <?php
                if($result -> num_rows == 0) {
            ?>
            <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
            <?php
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
            <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']?></a></li>
            <?php } } ?>
        </ul>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=2";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td rowspan="7">경<br>력<br>사<br>항</td>
    <td>자격증<br>취 &nbsp;득</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=3";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>수 &nbsp;상</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=4";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>대 &nbsp;회<br>공모전</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=5";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>어 &nbsp;학<br>인 &nbsp;증</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=6";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>해 &nbsp;외<br>연 &nbsp;수</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate']."~".$row['enddate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=7";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>인 &nbsp;턴</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate']."~".$row['enddate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=8";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>특 &nbsp;허</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=9";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td rowspan="4">전<br>공<br>활<br>동</td>
    <td>프 &nbsp;로<br>젝 &nbsp;트</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate']."~".$row['enddate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=10";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>전 &nbsp;공<br>동아리</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=11";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>멘토링</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=12";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>대 &nbsp;외<br>참 &nbsp;여</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=13";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td rowspan="4">기<br>타<br>사<br>항</td>
    <td>봉 &nbsp;사</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=14";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>독 &nbsp;서</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=15";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>예 &nbsp;술<br>체 &nbsp;육</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']." (".$row['startdate'].")"?></a></li>
        <?php } } ?>
    </td>
</tr>
<?php
    $sql = "SELECT id, title, startdate, enddate FROM userresume WHERE user='".$user_id."' AND allowed=1 AND type=16";
    $result = mysqli_query($conn, $sql);
?>
<tr>
    <td>취 &nbsp;미<br>기 &nbsp;타</td>
    <td colspan="2">
        <?php
            if($result -> num_rows == 0) {
        ?>
        <li style="list-style:none; padding:0px; text-align:center;"><h2 class="resume-none">없음</h2></li>
        <?php
            } else {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=$row['title']?></a></li>
        <?php } } ?>
    </td>
</tr>