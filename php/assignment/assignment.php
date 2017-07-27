<?php
    require("assignmentManager.php");
    require("../account/logincheck.php");
    $page = 1;
?>

<div class="for-members container-fluid">
    <div class="row">
        <?php require("../leftside.php"); ?>
        <div class="col-md-6">
            <h1><a href="#" onclick="refreshAssignment(); return false;" class="header-refresh">과제</a></h1>
            <?php 
                if (in_array($_SESSION['user_id'], $assignmentManager)) {
            ?>
            <div class="btn-group head-btn-group" role="group">
                <a class="btn btn-default" id="write-assignment-btn" data-toggle="modal" data-target="#add-assignment-modal">추가</a>
            </div>
            <?php } ?>
            <table class="table list-table" id="assignment-table">
                <thead>
                    <tr class="info">
                        <th width="15%">과목</td>
                        <th width="40%">주제</td>
                        <th width="35%">기한</td>
                        <th width="10%">종료</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>
        <?php require("../rightside.php"); ?>
        <div class="modal fade text-center" tabindex="-1" id="add-assignment-modal" role="dialog" aria-labelledby="add-assignment-modal" aria-hidden="true" style="padding-top:15%;">
            <div class="modal-dialog modal-assignment">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">과제 추가</h4>
                    </div>
                    <div class="modal-body">
                        <form id="add-assignment-form">
                            <div class="form-group">
                                <select class="form-control" name="subject" placeholder="과목">
                                    <option value="0">기하와 벡터</option>
                                    <option value="1">네트워크</option>
                                    <option value="2">영어</option>
                                    <option value="3">문학</option>
                                    <option value="4">미적분I</option>
                                    <option value="5">미술</option>
                                    <option value="6">정보보안</option>
                                    <option value="7">진로와 직업</option>
                                    <option value="8">창체</option>
                                    <option value="9">체육</option>
                                    <option value="10">한국사</option>
                                    <option value="11">해킹</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="주제">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="desc" placeholder="설명"></textarea>
                            </div>
                            <div class="form-group">
                                <label>기한</label>
                                <input type="date" class="form-control" name="untildate">
                                <input type="time" class="form-control" name="untiltime">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                        <input type="button" class="btn btn-success" value="등록" onclick="addAssignment();">
                    </div>
                </div>
            </div>
            <div id="alert-error-add-assignment" class="alert alert-danger">
                <div></div>
            </div>
        </div>
        <div class="modal fade text-center" tabindex="-1" id="show-assignment-modal" role="dialog" aria-labelledby="show-assignment-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="assignment-title" id="assignment-title"></h4>
                        <p class="assignment-info" id="assignment-subject"></p>
                        <p class="assignment-info" id="assignment-until"></p>
                    </div>
                    <div class="modal-body">
                        <pre class="assignment-desc" id="assignment-desc"></pre>
                    </div>
                    <div class="modal-footer">
                        <div id="assignment-btn-group">
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-error-assignment" class="alert alert-danger">
                <div></div>
            </div>
        </div>
        <div class="modal fade text-center" tabindex="-1" id="modify-assignment-modal" role="dialog" aria-labelledby="modify-assignment-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">과제 수정</h4>
                    </div>
                    <div class="modal-body">
                        <label for="modify-assignment-title">주제</label>
                        <input type="text" class="form-control" id="modify-assignment-title">
                        <label for="modify-assignment-subject">과목</label>
                        <select class="form-control" id="modify-assignment-subject" name="subject" placeholder="과목">
                            <option value="0">기하와 벡터</option>
                            <option value="1">네트워크</option>
                            <option value="2">영어</option>
                            <option value="3">문학</option>
                            <option value="4">미적분I</option>
                            <option value="5">미술</option>
                            <option value="6">정보보안</option>
                            <option value="7">진로와 직업</option>
                            <option value="8">창체</option>
                            <option value="9">체육</option>
                            <option value="10">한국사</option>
                            <option value="11">해킹</option>
                        </select>
                        <label for="modify-assignment-title">기한</label>
                        <input type="date" class="form-control" id="modify-assignment-untildate">
                        <input type="time" class="form-control" id="modify-assignment-untiltime">
                        <label for="modify-assignment-title">설명</label>
                        <textarea class="form-control" id="modify-assignment-desc"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div id="modify-assignment-btn-group">
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-error-modify-assignment" class="alert alert-danger">
                <div></div>
            </div>
        </div>
    </div>
</div>