<!-- Home -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <h1>DSM INFORMATION SECURITY</h1>
        <h3>대덕소프트웨어마이스터고등학교 정보보안과</h3>
    </div>
</header>

<!-- Introduce -->
<div id="introduce" class="introduce match_parent">
    <div class="container match_parent">
        <div class="background-image background-hidden" id="introduce-backimg"><img src="image/school.jpg" alt="background image" style="width:100%;"></div>
        <div class="row">
            <div class="col-md-12 introduce-text" id="introduce-text">
                <h2 class="text-center">소개</h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-12">
                        <p class="title-small">대덕소프트웨어마이스터고등학교</p>
                        <p class="lead text-small">대덕소프트웨어마이스터고등학교는 대전광역시 유성구 가정북로에 위치해 있는 소프트웨어 개발 및 정보보안 분야의 인재 양성을 위한 국내 최초의 미래창조과학부 참여형 ‘소프트웨어 마이스터고등학교'입니다.</p>
                        <p class="lead text-small"><a target="_blank" href="http://dsmhs.djsch.kr/main.do">홈페이지 바로가기</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="title-small">대덕소프트웨어마이스터고등학교 정보보안과</p>
                        <p class="lead text-small">대덕소프트웨어마이스터고등학교 정보보안과는 국내 마이스터고등학교 중 유일한 정보보안과로, 2014년 대덕소프트웨어마이스터고등학교가 대한민국 최초의 소프트웨어 마이스터고등학교로 지정된 이후 지금까지 이어져 오고 있습니다.</p>
                        <p class="lead text-small">정보보안과 학생들은 시스코 네트워킹, 리눅스 시스템, 웹 프로그래밍 및 웹 해킹에 대한 체계적인 교육을 받고 있으며, 학교의 적극적인 지원으로 각종 체험학습과 견학 활동을 통해 견문을 넓히고 있습니다.</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="image/classphoto1.jpg" alt="photo" class="img-thumbnail" style="height:250px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="title-small">Network</p>
                        <p class="lead text-small">Cisco Packet Tracer</p>
                    </div>
                    <div class="col-md-4">
                        <p class="title-small">System</p>
                        <p class="lead text-small">Linux</p>
                    </div>
                    <div class="col-md-4">
                        <p class="title-small">Web</p>
                        <p class="lead text-small">HTML / CSS / Javascript / PHP / SQL</p>
                        <p class="lead text-small">SQL Injection / XSS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row 끝 -->
    </div>
    <!-- container 끝 -->
</div>

<!-- Work -->
<div id="work" class="work match_parent">
    <div class="container match_parent">
        <div class="row">
            <div class="col-md-12 introduce-text" id="introduce-text">
                <h2 class="text-center">활동</h2>
                <hr class="small">
            </div>
        </div>
        <!-- row 끝 -->
    </div>
    <!-- container 끝 -->
</div>

<!-- Members -->
<div id="members" class="members bg-primary">
    <div class="container text-vertical-center">
        <div class="row text-center">
            <div class="col-md-10 col-md-offset-1">
                <h2>DSM InfoSec Members</h2>
                <hr class="small">
                <div class="row">
                    <?php
                        require("db/connect-db.php");

                        for ($i = 1; $i <= 18; $i++) { 
                            $number = sprintf('%02d',$i);
                            $sql = "SELECT name, profile, profileext FROM users WHERE stu_id='204{$number}'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="col-md-2">
                        <div class="member" onclick="showResume('204<?=$number?>');">
                            <?php if($row['profile'] == '1') { ?>
                            <img src="files/<?='204'.$number?>/profile.<?=htmlspecialchars($row['profileext'])?>" alt="profile photo" class="img-thumbnail" style="width:100px;">
                            <?php } else { ?>
                            <img src="image/no-profile.jpg" alt="profile photo" class="img-thumbnail" style="width:100px;">
                            <?php } ?>                            
                            <h4>
                                <strong><?=$row['name']?></strong>
                            </h4>
                            <p>2학년 4반 <?=$i?>번</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- row 끝 -->
            </div>
            <!-- col-lg-10 끝 -->
        </div>
        <!-- row 끝 -->
    </div>
    <!-- container 끝 -->
</div>

<!-- Map -->
<div id="contact" class="contact">
    <div class="row" style="height:80%;">
        <div class="col-md-12" style="height:100%;">
            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJizoTOj9KZTURpAWySnuRFI0&key=AIzaSyC2o13jot2QF5ev_FhhdXBZECrUTS4jOSU"></iframe>
        </div>
    </div>
    <div class="row" style="padding:40px 100px 0px 100px;">
        <div class="col-md-4 text-center">
            <p class="title-small">안소희 (담임 선생님)</p>
            <p class="lead text-small"><strong style="color:white;">Phone:</strong> 010-1234-1234</p>
            <p class="lead text-small"><strong style="color:white;">Email:</strong> abc@abc.com</p>
        </div>
        <div class="col-md-4 text-center">
            <p class="title-small">이재석 (반장)</p>
            <p class="lead text-small"><strong style="color:white;">Phone:</strong> 010-9487-0392</p>
            <p class="lead text-small"><strong style="color:white;">Email:</strong> infreljs@gmail.com</p>
        </div>
        <div class="col-md-4 text-center">
            <p class="title-small">정필성 (부반장)</p>
            <p class="lead text-small"><strong style="color:white;">Phone:</strong> 010-1234-1234</p>
            <p class="lead text-small"><strong style="color:white;">Email:</strong> abc@abc.com</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h4><strong>DSM INFORMATION SECURITY</strong>
                </h4>
                <p>대전광역시 유성구 가정북로 76(장동 23-9)
                <br>대덕소프트웨어마이스터고등학교 정보보안과</p>
                <ul class="list-unstyled">
                    <li>Phone : (+82) 10-9487-0392</li>
                    <li>Email : <a href="mailto:infreljs@gmail.com">infreljs@gmail.com</a>
                    </li>
                </ul>
                <hr class="small">
                <p class="text-muted">&copy; 대덕소프트웨어마이스터고등학교 정보보안과 2017</p>
            </div>
        </div>
    </div>
</footer>
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
<div class="modal fade text-center" tabindex="-1" id="login-modal" role="dialog" aria-labelledby="login-modal" aria-hidden="true" style="padding-top:15%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">로그인</h4>
            </div>
            <div class="modal-body">
                <form id="login-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" placeholder="아이디" onkeydown="if(event.keyCode==13){login();}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pw" placeholder="비밀번호" onkeydown="if(event.keyCode==13){login();}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-info" value="Join" data-toggle="modal" data-target="#join-modal">
                <input type="button" class="btn btn-success" value="Login" onclick="login();">
            </div>
        </div>
    </div>
    <div id="alert-error-login" class="alert alert-danger">
        <div></div>
    </div>
</div>
<div class="modal fade text-center" tabindex="-1" id="join-modal" role="dialog" aria-labelledby="join-modal" aria-hidden="true" style="padding-top:15%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">회원가입</h4>
            </div>
            <div class="modal-body">
                <form id="join-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" placeholder="아이디">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="stu_id" placeholder="학번">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pw" placeholder="비밀번호">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="이름">
                    </div>
                    <div class="form-group">
                        <label for="join_user_birthday">생일</label>
                        <input type="date" class="form-control" name="birthday">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="message" placeholder="메시지">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-danger" value="취소" data-dismiss="modal" aria-label="Close">
                <input type="button" class="btn btn-success" value="제출" onclick="join();">
            </div>
        </div>
    </div>
    <div id="alert-error-join" class="alert alert-danger">
        <div></div>
    </div>
</div>