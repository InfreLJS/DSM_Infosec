<?php
    require("admins.php");
    require("../db/connect-db.php");
    require("../account/logincheck.php");
    $page = 1;

    if (!in_array($_SESSION['user_id'], $admins)) {
        exit;
    }
?>  

<div class="admin for-members container-fluid">
    <div class="row">
        <?php require("../leftside.php"); ?>
        <div class="col-md-6">
            <h1>ADMIN</h1>
            <div class="text-center" id="not-allowed-submits">
                <h3>허가되지 않은 신청(Resume)</h3>
                <table class="table list-table">
                    <thead>
                        <tr class="info">
                            <th width="10%">ID</th>
                            <th width="25%">종류</th>
                            <th width="45%">제목</th>
                            <th width="10%">거절</th>
                            <th width="10%">승인</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT userresume.id, title, resumetype.name FROM userresume LEFT JOIN resumetype ON userresume.type=resumetype.id WHERE allowed=0";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?=htmlspecialchars($row['id'])?></td>
                            <td><?=htmlspecialchars($row['name'])?></td>
                            <td><a href="#" onclick="showResumeDetail(<?=$row['id']?>); return false;"><?=htmlspecialchars($row['title'])?></a></td>
                            <td><a href="#" onclick="rejectResume(<?=$row['id']?>); return false;">거절</a></td>
                            <td><a href="#" onclick="approveResume(<?=$row['id']?>); return false;">승인</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require("../rightside.php"); ?>
    </div>
    <div class="modal fade text-center" tabindex="-1" id="show-resume-detail-modal" role="dialog" aria-labelledby="show-resume-detail-modal" aria-hidden="true" style="padding-top:2%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="resume-title" id="resume-title"></h4>
                    <p class="resume-info" id="resume-user"></p>
                    <p class="resume-info" id="resume-type"></p>
                    <p class="resume-info" id="resume-startdate"></p>
                    <p class="resume-info" id="resume-enddate"></p>
                    <p class="resume-info" id="resume-allowed"></p>
                </div>
                <div class="modal-body">
                    <pre class="resume-desc" id="resume-desc"></pre>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" value="닫기" data-dismiss="modal" aria-label="Close">
                </div>
            </div>
        </div>
        <div id="alert-error-show-resume-detail" class="alert alert-danger">
            <div></div>
        </div>
    </div>
</div>