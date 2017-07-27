<?php
    require("../db/connect-db.php");
    require("logincheck.php");
?>

<div class="for-members container-fluid">
    <div class="row">
        <?php require("../leftside.php"); ?>
        <div class="col-md-6">
            <h1>내 정보</h1>
            <div id="myinfo">
                <?php
                    $sql = "SELECT stu_id, name, birthday, message, profile, profileext FROM users WHERE id='{$_SESSION['user_id']}'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if($row['profile'] == '1') {
                ?>
                <img id="myinfo-profile-image" class="img-thumbnail" src="../../files/<?=$_SESSION['user_id']?>/profile.<?=$row['profileext']?>" alt="Profile Image">
                <?php } else { ?>
                <img id="myinfo-profile-image"  class="img-thumbnail" src="../../image/no-profile.jpg" alt="Profile Image">
                <?php } ?>
                <div id="myinfo-change-profile-image">
                    <div>
                        <input class="form-control" type="button" value="프로필 사진 변경" data-toggle="modal" data-target="#change-profile-image-modal">
                        <input class="form-control" type="button" value="기본 사진으로" onclick="changeProfileImage(1);">
                    </div>
                </div>
                <div id="myinfo-text">
                    <p>이름 : <?=htmlspecialchars($row['name'])?></p>
                    <p>학번 : <?=htmlspecialchars($row['stu_id'])?></p>
                    <p>생일 : <?=date('Y년 m월 d일', strtotime($row['birthday']))?></p>
                    <p>한 줄 소개 : <?=htmlspecialchars($row['message'])?></p>
                </div>
            </div>
            <hr>
            <div class="btn-group list-btn-group" role="group">
                <a class="btn btn-info" id="modify-myinfo-btn" data-toggle="modal" data-target="#myinfo-edit-modal">수정</a>
                <a class="btn btn-danger" id="delete-account-btn" onclick="if(confirm('그동안 회원님이 작성하신 자유게시판 글, 댓글, 레주메 정보가 전부 삭제됩니다. 정말 회원탈퇴 하시겠습니까?')){deleteAccount();}">회원탈퇴</a>
            </div>
        </div>
        <?php require("../rightside.php"); ?>
        <div class="modal fade text-center" tabindex="-1" id="myinfo-edit-modal" role="dialog" aria-labelledby="myinfo-edit-modal" aria-hidden="true" style="padding-top:2%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">내 정보 수정</h4>
                    </div>
                    <div class="modal-body">
                        이름 : <input id="myinfo-edit-name" class="form-control" type="text" placeholder="<?=htmlspecialchars($row['name'])?>">
                        학번 : <input id="myinfo-edit-stuid" class="form-control" type="text" placeholder="<?=htmlspecialchars($row['stu_id'])?>">
                        생일 : <input id="myinfo-edit-birthday" class="form-control" type="date" value="<?=htmlspecialchars($row['birthday'])?>">
                        한 줄 소개 : <input id="myinfo-edit-message" class="form-control" type="text" placeholder="<?=htmlspecialchars($row['message'])?>">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                        <input type="button" class="btn btn-success" value="제출" onclick="editmyinfo(); return false;">
                    </div>
                </div>
            </div>
            <div id="alert-error-myinfo-edit" class="alert alert-danger">
                <div></div>
            </div>
        </div>
        <div class="modal fade text-center" tabindex="-1" id="change-profile-image-modal" role="dialog" aria-labelledby="change-profile-image-modal" aria-hidden="true" style="padding-top:2%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">프로필 이미지 수정</h4>
                    </div>
                    <div class="modal-body">
                        <p>프로필 이미지는 .png, .jpg, .jpeg .tif, .tiff, .gif 확장자만 지원합니다.</p>
                        <input id="profile-image" class="form-control" type="file">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                        <input type="button" class="btn btn-success" value="제출" onclick="changeProfileImage(0); return false;">
                    </div>
                </div>
            </div>
            <div id="alert-error-change-profile-image" class="alert alert-danger">
                <div></div>
            </div>
        </div>
    </div>
</div>