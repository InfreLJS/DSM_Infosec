<?php
    require("../db/connect-db.php");
    require("../account/logincheck.php");
?>

<div class="for-members container-fluid">
    <div class="row">
        <?php require("../leftside.php"); ?>
        <div class="col-md-6">
            <h1><a href="#" onclick="refreshResume(); return false;" class="header-refresh">내 레주메</a></h1>
            <div id="resume">
                <table class="table table-bordered table-resume" id="table-resume">
                    <tbody>
                    </tbody>
                </table>
                <h1 id="loading">LOADING...</h1>
            </div>
            <hr>
            <div class="text-center" id="not-allowed-submits">
                <h2>허가되지 않은 신청</h2>
                <table class="table table-bordered list-table" id="table-not-allowed-resume">
                    <thead>
                        <tr class="info">
                            <th width="15%">ID</th>
                            <th width="25%">종류</th>
                            <th width="45%">제목</th>
                            <th width="15%">취소</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <h1 id="loading">LOADING...</h1>
            </div>
            <hr>
            <div class="btn-group list-btn-group" role="group">
                <a class="btn btn-danger" id="delete-resume-btn" data-toggle="modal" data-target="#delete-resume-modal">제거</a>
                <a class="btn btn-success" id="add-resume-btn" data-toggle="modal" data-target="#add-resume-modal">추가</a>
            </div>
        </div>
        <?php require("../rightside.php"); ?>
        <div class="modal fade text-center" tabindex="-1" id="add-resume-modal" role="dialog" aria-labelledby="add-resume-modal" aria-hidden="true" style="padding-top:2%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">내 레주메 정보 추가 신청</h4>
                    </div>
                    <div class="modal-body">
                        <form id="add-resume-form">
                            <div class="form-group">
                                <select class="form-control" name="type">
                                    <option value="0">--- 레주메 종류 선택 ---</option>
                                    <option value="1">관심분야</option>
                                    <option value="2">자격증 취득</option>
                                    <option value="3">수상</option>
                                    <option value="4">대회 공모전</option>
                                    <option value="5">어학 인증</option>
                                    <option value="6">해외 연수</option>
                                    <option value="7">인턴</option>
                                    <option value="8">특허</option>
                                    <option value="9">프로젝트</option>
                                    <option value="10">전공 동아리</option>
                                    <option value="11">멘토링</option>
                                    <option value="12">대외 참여</option>
                                    <option value="13">봉사</option>
                                    <option value="14">독서</option>
                                    <option value="15">예술 체육</option>
                                    <option value="16">취미 기타</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="제목">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="desc" placeholder="설명"></textarea>
                            </div>
                            <div class="form-group">
                                <label>시작 날짜</label>
                                <input type="date" class="form-control" name="startdate">
                            </div>
                            <div class="form-group">
                                <label>종료 날짜</label>
                                <input type="date" class="form-control" name="enddate">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                        <input type="button" class="btn btn-success" value="신청" onclick="addResume(); return false;">
                    </div>
                </div>
            </div>
            <div id="alert-error-add-resume" class="alert alert-danger">
                <div></div>
            </div>
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
                        <input id="resume-delete" type="button" class="btn btn-warning" value="삭제">
                        <input type="button" class="btn btn-danger" value="닫기" data-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
            <div id="alert-error-show-resume-detail" class="alert alert-danger">
                <div></div>
            </div>
        </div>
    </div>
</div>