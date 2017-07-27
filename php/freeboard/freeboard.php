<?php
    require("../account/logincheck.php");
    $page = 1;
?>

<div class="for-members container-fluid">
    <div class="row">
        <?php require("../leftside.php"); ?>
        <div class="col-md-6">
            <h1><a href="#" onclick="refreshFreeboard(); return false;" class="header-refresh">자유게시판</a></h1>
            <div class="btn-group head-btn-group" role="group">
                <a class="btn btn-default" id="write-post-btn" data-toggle="modal" data-target="#write-post-modal">글쓰기</a>
            </div>
            <table class="table list-table" id="freeboard-table">
                <thead>
                    <tr class="info">
                        <th width="34%">제목</td>
                        <th width="17%">작성자</td>
                        <th width="25%">시간</td>
                        <th width="12%">댓글</td>
                        <th width="12%">추천</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>
        <?php require("../rightside.php"); ?>
        <div class="modal fade text-center" tabindex="-1" id="show-resume-modal" role="dialog" aria-labelledby="show-resume-modal" aria-hidden="true" style="padding-top:2%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="resume-title">RESUME</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-resume" id="table-resume"><tbody></tbody></table>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="닫기" data-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
            <div id="alert-error-show-resume" class="alert alert-danger">
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
                        <input type="button" class="btn btn-danger" value="닫기" data-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
            <div id="alert-error-show-resume-detail" class="alert alert-danger">
                <div></div>
            </div>
        </div>
        <div class="modal fade text-center" tabindex="-1" id="write-post-modal" role="dialog" aria-labelledby="write-post-modal" aria-hidden="true" style="padding-top:15%;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">게시글 작성</h4>
                    </div>
                    <div class="modal-body">
                        <form id="write-post-form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="write-post-form-title" name="title" placeholder="제목">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="write-post-form-desc" name="desc" placeholder="본문"></textarea>
                            </div>
                            <div id="write-post-form-file">
                            </div>
                            <input type="button" class="form-control" id="write-post-form-morefile" value="+" onclick="moreFile();">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                        <input type="button" class="btn btn-success" value="등록" onclick="writePost(); return false;">
                    </div>
                </div>
            </div>
            <div id="alert-error-write-post" class="alert alert-danger">
                <div></div>
            </div>
        </div>
        <div class="modal fade text-center" tabindex="-1" id="show-post-modal" role="dialog" aria-labelledby="show-post-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="post-title" id="post-title"></h4>
                        <p class="post-info" id="post-author"></p>
                        <p class="post-info" id="post-created"></p>
                    </div>
                    <div class="modal-body">
                        <pre class="post-desc" id="post-files"></pre>
                        <pre class="post-desc" id="post-desc"></pre>
                    </div>
                    <div id="post-comment"></div>
                    <div class="text-center" id="post-comment-write">
                        <input type="text" id="comment-write-desc" class="form-control">
                        <input type="button" id="comment-write-btn" class="btn btn-success" value="제출">
                    </div>
                    <div class="modal-footer">
                        <div id="post-btn-group">
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-error-post" class="alert alert-danger">
                <div></div>
            </div>
        </div>
    </div>
</div>