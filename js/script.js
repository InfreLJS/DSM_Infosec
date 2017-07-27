// 현재 페이지 (home, freeboard 등등)
var nowpage;
// 자유게시판 페이지
var freeboardPage = 1;
// 과제 페이지
var assignmentPage = 1;
// 알림 div 페이드 setTimeout
var alertFade;

$(document).ready(function () {
    // 처음 화면 구성.
    $.ajax({
        type: "get",
        url: "php/main.php",
        dataType: "text",
        success: function (data, status, xhr) {
            $('article').fadeOut(250, function () {
                $(this).html(data).fadeIn(250);
                createBtnScrollAnimation();
                createNavbarScrollResponsive();
                createMainScrollResponsive();
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });

    // 현재 페이지 초기화
    nowpage = "home"
});

// 버튼 스크롤 애니메이션 구현 함수
function createBtnScrollAnimation() {
    $(function () {
        $('a[href*="#"]:not([href="#"],[data-toggle],[data-target],[data-slide])').on("click", function () {
            var target = $(this.hash);
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        });
    });
}

// 화면 이동 관련
function movePage(index) {
    if (index == "home") {
        if (nowpage != "home") {
            $.ajax({
                type: "get",
                url: "php/main.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        $(".navbar-nav>li").eq(0).html('<a href="#top">Top</a>').addClass("active");
                        $(".navbar-nav>li").eq(1).html('<a href="#introduce">소개</a>');
                        $(".navbar-nav>li").eq(2).html('<a href="#work">활동</a>');
                        $(".navbar-nav>li").eq(3).html('<a href="#members">구성원</a>');
                        $(".navbar-nav>li").eq(4).html('<a href="#contact">CONTACT</a>');
                        $(".dropdown").removeClass('active');
                        createBtnScrollAnimation();
                        createNavbarScrollResponsive();
                        createMainScrollResponsive();
                    });
                    nowpage = "home";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else if (index == "freeboard") {
        if (nowpage != "freeboard") {
            $.ajax({
                type: "get",
                url: "php/freeboard/freeboard.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        refreshFreeboard();
                        $(".navbar-nav>li").removeClass("active").eq(0).html('<a href="#" onclick="movePage(\'home\'); return false;">Home</a>');
                        $(".navbar-nav>li").eq(1).html('');
                        $(".navbar-nav>li").eq(2).html('');
                        $(".navbar-nav>li").eq(3).html('');
                        $(".navbar-nav>li").eq(4).html('');
                        $(".dropdown").addClass('active');
                        $(document).off("scroll");
                    });
                    nowpage = "freeboard";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else if (index == "myinfo") {
        if (nowpage != "myinfo") {
            $.ajax({
                type: "get",
                url: "php/account/myinfo.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        $(".navbar-nav>li").removeClass("active").eq(0).html('<a href="#" onclick="movePage(\'home\'); return false;">Home</a>');
                        $(".navbar-nav>li").eq(1).html('');
                        $(".navbar-nav>li").eq(2).html('');
                        $(".navbar-nav>li").eq(3).html('');
                        $(".navbar-nav>li").eq(4).html('');
                        $(".dropdown").addClass('active');
                        $(document).off("scroll");
                    });
                    nowpage = "myinfo";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else if (index == "assignment") {
        if (nowpage != "assignment") {
            $.ajax({
                type: "get",
                url: "php/assignment/assignment.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        refreshAssignment();
                        $(".navbar-nav>li").removeClass("active").eq(0).html('<a href="#" onclick="movePage(\'home\'); return false;">Home</a>');
                        $(".navbar-nav>li").eq(1).html('');
                        $(".navbar-nav>li").eq(2).html('');
                        $(".navbar-nav>li").eq(3).html('');
                        $(".navbar-nav>li").eq(4).html('');
                        $(".dropdown").addClass('active');
                        $(document).off("scroll");
                    });
                    nowpage = "assignment";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else if (index == "resume") {
        if (nowpage != "resume") {
            $.ajax({
                type: "get",
                url: "php/resume/resume.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        refreshResume();
                        refreshNotAllowedResume();
                        $(".navbar-nav>li").removeClass("active").eq(0).html('<a href="#" onclick="movePage(\'home\'); return false;">Home</a>');
                        $(".navbar-nav>li").eq(1).html('');
                        $(".navbar-nav>li").eq(2).html('');
                        $(".navbar-nav>li").eq(3).html('');
                        $(".navbar-nav>li").eq(4).html('');
                        $(".dropdown").addClass('active');
                        $(document).off("scroll");
                    });
                    nowpage = "resume";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else if (index == "admin") {
        if (nowpage != "admin") {
            $.ajax({
                type: "get",
                url: "php/admin/admin.php",
                dataType: "text",
                success: function (data, status, xhr) {
                    $('article').fadeOut(250, function () {
                        $(this).html(data).fadeIn(250);
                        $(".navbar-nav>li").removeClass("active").eq(0).html('<a href="#" onclick="movePage(\'home\'); return false;">Home</a>');
                        $(".navbar-nav>li").eq(1).html('');
                        $(".navbar-nav>li").eq(2).html('');
                        $(".navbar-nav>li").eq(3).html('');
                        $(".navbar-nav>li").eq(4).html('');
                        $(".dropdown").addClass('active');
                        $(document).off("scroll");
                    });
                    nowpage = "admin";
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    }
}


// 스크롤 반응
function createMainScrollResponsive() {
    $(document).scroll(function () {
        // aboutdsm, aboutdsminfosec 애니메이션
        if ($(this).scrollTop() > ($("#top").height() / 6)) {
            $('#introduce-backimg').removeClass("background-hidden");
            $('#introduce-backimg').addClass("background-show");
        } else {
            $('#introduce-backimg').removeClass("background-show");
            $('#introduce-backimg').addClass("background-hidden");
        }
        if ($(this).scrollTop() > ($("#top").height() / 3)) {
            $('#introduce-text').removeClass("about-text-hidden");
            $('#introduce-text').addClass("about-text-show");
        } else {
            $('#introduce-text').removeClass("about-text-show");
            $('#introduce-text').addClass("about-text-hidden");
        }
    });
    $("#show-resume-modal").on("shown.bs.modal", function () {
        $("body").addClass("modal-opened");
    }).on("hidden.bs.modal", function () {
        $("body").removeClass("modal-opened");
    });
}

function createNavbarScrollResponsive() {
    $(document).scroll(function () {
        // 네비게이션 active
        for (var i = 0; i <= 5; i++) {
            if ($(this).scrollTop() >= ($("#top").height() * i) && $(this).scrollTop() < ($("#top").height() * (i + 1))) {
                $('.navbar .navbar-nav li').eq(i).addClass("active");
            } else {
                $('.navbar .navbar-nav li').eq(i).removeClass("active");
            }
        }
    });
}


// 로그인 & 로그아웃
function login() {
    form = document.getElementById("login-form");
    var id = form.id.value;
    var pw = form.pw.value;

    errorMsg = "";
    if (id == "") {
        errorMsg += "아이디를 입력하세요.<br>";
    }
    if (pw == "") {
        errorMsg += "비밀번호를 입력하세요.<br>";
    }

    if (errorMsg != "") {
        $("#alert-error-login").removeClass("alert-success").addClass("alert-danger");
        alertError("login", errorMsg + "로그인을 다시 시도하세요.");
    } else {
        $.ajax({
            type: "post",
            url: "php/account/login.php",
            data: {
                id: id,
                pw: pw
            },
            dataType: "JSON",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    $(".navbar-nav>li").eq(5).html('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">For Members <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="#" onclick="movePage(\'myinfo\'); return false;">내 정보</a></li><li><a href="#" onclick="movePage(\'resume\'); return false;">레주메</a></li><li><a href="#" onclick="movePage(\'freeboard\'); return false;">자유게시판</a></li><li><a href="#" onclick="movePage(\'assignment\'); return false;">과제</a></li></ul>');
                    $(".navbar-nav>li").eq(6).html('<a href="#" id="logout-button" onclick="logout(); return false;">로그아웃</a>');
                    $("#login-modal").modal("hide");
                } else if (data.status == "m") {
                    $(".navbar-nav>li").eq(5).html('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">For Members <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="#" onclick="movePage(\'myinfo\'); return false;">내 정보</a></li><li><a href="#" onclick="movePage(\'resume\'); return false;">레주메</a></li><li><a href="#" onclick="movePage(\'freeboard\'); return false;">자유게시판</a></li><li><a href="#" onclick="movePage(\'assignment\'); return false;">과제</a></li><li><a href="#" onclick="movePage(\'admin\'); return false;">For Admin</a></li></ul>');
                    $(".navbar-nav>li").eq(6).html('<a href="#" id="logout-button" onclick="logout(); return false;">로그아웃</a>');
                    $("#login-modal").modal("hide");
                } else if (data.status == "f") {
                    $("#alert-error-login").removeClass("alert-success").addClass("alert-danger");
                    alertError("login", "아이디나 비밀번호가 틀렸습니다.<br>로그인을 다시 시도하세요.");
                } else {
                    $("#alert-error-login").removeClass("alert-success").addClass("alert-danger");
                    alertError("login", "잘못된 접근입니다.<br>로그인을 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
    return false;
}

function logout() {
    $.ajax({
        type: "get",
        url: "php/account/logout.php",
        dataType: "text",
        success: function (data, status, xhr) {
            movePage("home");
            $(".navbar-nav>li").eq(5).html('');
            $(".navbar-nav>li").eq(6).html('<a id="login-button" data-toggle="modal" data-target="#login-modal">로그인</a>');
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function join() {
    form = document.getElementById("join-form");
    var id = form.id.value;
    var stu_id = form.stu_id.value;
    var pw = form.pw.value;
    var name = form.name.value;
    var birthday = form.birthday.value;
    var message = form.message.value;

    errorMsg = "";
    if (id == "") {
        errorMsg += "아이디를 입력하세요.<br>";
    }
    if (stu_id == "") {
        errorMsg += "학번을 입력하세요.<br>";
    }
    if (pw == "") {
        errorMsg += "비밀번호를 입력하세요.<br>";
    }
    if (name == "") {
        errorMsg += "이름을 입력하세요.<br>";
    }
    if (birthday == "") {
        errorMsg += "생일을 입력하세요.<br>";
    }
    if (message == "") {
        errorMsg += "메시지를 입력하세요.<br>";
    }

    if (errorMsg != "") {
        alertError("join", errorMsg + "회원가입을 다시 시도하세요.");
    } else {
        $.ajax({
            type: "post",
            url: "php/account/join.php",
            data: {
                id: id,
                stu_id: stu_id,
                pw: pw,
                name: name,
                birthday: birthday,
                message: message
            },
            dataType: "JSON",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    $("#alert-error-login").removeClass("alert-danger").addClass("alert-success");
                    alertError("login", "회원가입을 성공했습니다.");
                    $("#join-modal").modal("hide");
                } else if (data.status == "e") {
                    alertError("join", "이미 존재하는 아이디입니다.<br>회원가입을 다시 시도하세요.");
                } else {
                    alertError("join", "잘못된 접근입니다.<br>회원가입을 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function editmyinfo() {
    var name = $("#myinfo-edit-name").val();
    var birthday = $("#myinfo-edit-birthday").val();
    var message = $("#myinfo-edit-message").val();

    errorMsg = "";
    if (name == "") {
        errorMsg += "이름을 입력하세요.<br>";
    }
    if (birthday == "") {
        errorMsg += "생일을 입력하세요.<br>";
    }
    if (message == "") {
        errorMsg += "메시지를 입력하세요.<br>";
    }

    if (errorMsg != "") {
        alertError("myinfo-edit", errorMsg + "내 정보 수정을 다시 시도하세요.");
    } else {
        $.ajax({
            type: "post",
            url: "php/account/editmyinfo.php",
            data: {
                name: $("#myinfo-edit-name").val(),
                birthday: $("#myinfo-edit-birthday").val(),
                message: $("#myinfo-edit-message").val()
            },
            dataType: "JSON",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    nowpage = "myinfo_refresh";
                    movePage("myinfo");
                    $("#myinfo-edit-modal").modal("hide");
                } else {
                    alertError("myinfo-edit", "잘못된 접근입니다.<br>회원가입을 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function changeProfileImage(level) {
    if (level == 0) {
        errorMsg = "";
        if ($("#profile-image").prop('files')[0] == undefined) {
            errorMsg += "파일을 선택하세요.<br>";
        }

        if (errorMsg != "") {
            alertError("change-profile-image", errorMsg + "프로필 사진 변경을 다시 시도하세요.");
        } else {
            var formdata = new FormData();
            formdata.append("profile_image", $("#profile-image").prop('files')[0]);
            $.ajax({
                type: "post",
                url: "php/account/change-profile-image.php",
                data: formdata,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data, status, xhr) {
                    if (data.status == "s") {
                        $("#change-profile-image-modal").modal("hide");
                        nowpage = "myinfo_refresh";
                        movePage("myinfo");
                    } else {
                        alertError("change-profile-image", "잘못된 접근입니다.<br>프로필 사진 변경을 다시 시도하세요.");
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    } else {
        $.ajax({
            type: "post",
            url: "php/account/change-profile-image.php",
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data, status, xhr) {
                if (data.status == "x") {
                    nowpage = "myinfo_refresh";
                    movePage("myinfo");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function deleteAccount() {
    $.ajax({
        type: "get",
        url: "php/account/deleteAccount.php",
        dataType: "text",
        success: function (data, status, xhr) {
            alert("회원탈퇴가 완료되었습니다!");
            movePage("home");
            $(".navbar-nav>li").eq(5).html('');
            $(".navbar-nav>li").eq(6).html('<a id="login-button" data-toggle="modal" data-target="#login-modal">로그인</a>');
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function alertError(name, errorMsg) {
    $("[id^='alert-error-'").css("opacity", "0");
    clearTimeout(alertFade);
    $("#alert-error-" + name + " div").html("<p>" + errorMsg + "</p>");
    $("#alert-error-" + name).css("opacity", "1");
    alertFade = setTimeout(function () {
        $("#alert-error-" + name).css("opacity", "0");
    }, 3000);
}

// 자유게시판

function refreshFreeboard() {
    $.ajax({
        type: "get",
        url: "php/freeboard/freeboard-list.php",
        data: {
            page: freeboardPage
        },
        dataType: "text",
        success: function (data, status, xhr) {
            $('#freeboard-table tbody').fadeOut(250, function () {
                $('#freeboard-table tbody').html(data).fadeIn(250);
                $.ajax({
                    type: "get",
                    url: "php/freeboard/freeboard-pagination.php",
                    data: {
                        page: freeboardPage
                    },
                    dataType: "text",
                    success: function (data, status, xhr) {
                        $('#pagination').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

// 게시글 작성
function writePost() {
    form = document.getElementById("write-post-form");
    var title = form.title.value;
    var desc = form.desc.value;

    errorMsg = "";
    if (form.title.value == "") {
        errorMsg += "제목을 입력하세요.<br>";
    }
    if (form.desc.value == "") {
        errorMsg += "본문을 입력하세요.<br>";
    }

    if (errorMsg != "") {
        alertError("write-post", errorMsg + "게시글 작성을 다시 시도하세요.");
    } else {
        var formdata = new FormData();
        formdata.append("title", title);
        formdata.append("desc", desc);
        for (var i = 1; i <= $('input[id^="writePost_file"]').length; i++) {
            formdata.append("writePost_file" + i, $("#writePost_file" + i).prop('files')[0]);
        }
        $.ajax({
            type: "post",
            url: "php/freeboard/freeboard-write-post.php",
            data: formdata,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    $("#write-post-modal").modal("hide");
                    refreshFreeboard();
                } else {
                    alertError("write-post", "잘못된 접근입니다.<br>게시글 작성을 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

var files = 1;

function moreFile() {
    if (files <= 10) {
        $("#write-post-form-file").append('<input id="writePost_file' + files + '" type="file" class="form-control" name="writePost_file' + files++ + '">');
    } else {
        alertError("write-post", "파일은 10개까지 첨부 가능합니다.");
    }
}



function showPost(id) {
    $.ajax({
        type: "get",
        url: "php/freeboard/freeboard-show-post.php",
        data: {
            id: id
        },
        dataType: "json",
        success: function (data, status, xhr) {
            $('#post-title').text(data.title);
            $('#post-author').text("작성자 : " + data.author);
            $('#post-created').text("시간 : " + data.created);
            $('#comment-write-btn').off("click");
            $('#comment-write-btn').on("click", function () {
                errorMsg = "";
                if ($("#comment-write-desc").val() == "") {
                    errorMsg += "댓글을 입력하세요.<br>";
                }
                if (errorMsg != "") {
                    alertError("post", errorMsg + "댓글 작성을 다시 시도하세요.");
                } else {
                    $.ajax({
                        type: "post",
                        url: "php/freeboard/comment.php",
                        data: {
                            type: "write",
                            desc: $("#comment-write-desc").val(),
                            post_id: id
                        },
                        dataType: "text",
                        success: function (data, status, xhr) {
                            refreshComment(id);
                            $("#comment-write-desc").val("");
                        },
                        error: function (xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
            if (data.fileexist >= 1) {
                $('#post-files').html(data.files);
            }
            $('#post-desc').text(data.desc);
            if (data.enable == 1) {
                $('#post-btn-group').html('<input type="button" class="btn btn-info" value="수정" onclick="modifyPost(' + data.id + ', 0);"><input type="button" class="btn btn-danger" value="삭제" onclick="if(confirm(\'정말 삭제하시겠습니까?\')){deletePost(' + data.id + ');}"><input type="button" class="btn btn-warning" value="닫기" data-dismiss="modal" aria-label="Close">');
            } else {
                $('#post-btn-group').html('<input type="button" class="btn btn-warning" value="닫기" data-dismiss="modal" aria-label="Close">');
            }
            refreshComment(id);
            $("#show-post-modal").modal("show");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function modifyPost(id, level) {
    if (level == 0) {
        var title = $('#post-title').text();
        var desc = $('#post-desc').text();
        $('#post-title').html('<input type="text" id="post-modify-title" class="form-control" value="' + title + '">');
        $('#post-desc').html('<textarea id="post-modify-desc" class="form-control">' + desc + '</textarea>');
        $('#post-btn-group').html('<input type="button" class="btn btn-danger" value="취소" onclick="showPost(' + id + ');"><input type="button" class="btn btn-success" value="제출" onclick="modifyPost(' + id + ',1);">');
    } else {
        errorMsg = "";
        if ($('#post-modify-title').val() == "") {
            errorMsg += "제목을 입력하세요.<br>";
        }
        if ($('#post-modify-desc').val() == "") {
            errorMsg += "본문을 입력하세요.<br>";
        }

        if (errorMsg != "") {
            alertError("post", errorMsg + "게시글 수정을 다시 시도하세요.");
        } else {
            $.ajax({
                type: "post",
                url: "php/freeboard/freeboard-modify-post.php",
                data: {
                    id: id,
                    title: $('#post-modify-title').val(),
                    desc: $('#post-modify-desc').val()
                },
                dataType: "json",
                success: function (data, status, xhr) {
                    if (data.status == "s") {
                        refreshFreeboard();
                        showPost(id);
                    } else {
                        alertError("post", "잘못된 접근입니다.<br>게시글 작성을 다시 시도하세요.");
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    }
}

function deletePost(id) {
    $.ajax({
        type: "get",
        url: "php/freeboard/freeboard-delete-post.php",
        data: {
            id: id
        },
        dataType: "text",
        success: function (data, status, xhr) {
            refreshFreeboard();
            $("#show-post-modal").modal("hide");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function refreshComment(post_id) {
    $.ajax({
        type: "post",
        url: "php/freeboard/comment.php",
        data: {
            type: "list",
            post_id: post_id
        },
        dataType: "text",
        success: function (data, status, xhr) {
            $("#post-comment").html(data);
            $.ajax({
                type: "post",
                url: "php/freeboard/comment.php",
                data: {
                    type: "count",
                    post_id: post_id
                },
                dataType: "text",
                success: function (data, status, xhr) {
                    $("#freeboard-table-comment-" + post_id).text(data);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function deleteComment(comment_id, post_id) {
    $.ajax({
        type: "post",
        url: "php/freeboard/comment.php",
        data: {
            type: "delete",
            id: comment_id
        },
        dataType: "text",
        success: function (data, status, xhr) {
            refreshComment(post_id);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function modifyComment(comment_id, post_id, level) {
    if (level == 0) {
        var desc = $('#comment-' + comment_id + '-desc').text();
        $('#comment-' + comment_id + '-desc').html('<input type="text" id="comment-modify-desc" class="form-control" value="' + desc + '">');
        $('#comment-' + comment_id + '-btn-group').html('<a href="#" id="comment-modify-cancel" onclick="refreshComment(' + post_id + '); return false;">취소</a> <a id="comment-modify-submit" onclick="modifyComment(' + comment_id + ',' + post_id + ', 1);">제출</a>');
    } else {
        $.ajax({
            type: "post",
            url: "php/freeboard/comment.php",
            data: {
                type: "modify",
                id: comment_id,
                desc: $('#comment-modify-desc').val()
            },
            dataType: "text",
            success: function (data, status, xhr) {
                refreshComment(post_id);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

// 숙제
function addAssignment() {
    form = document.getElementById("add-assignment-form");
    var title = form.title.value;
    var desc = form.desc.value;
    var subject = form.subject.value;
    var untildate = form.untildate.value;
    var untiltime = form.untiltime.value;

    errorMsg = "";
    if (title == "") {
        errorMsg += "제목을 입력하세요.<br>";
    }
    if (desc == "") {
        errorMsg += "설명을 입력하세요.<br>";
    }
    if (subject == "") {
        errorMsg += "본문을 입력하세요.<br>";
    }
    if (untildate == "") {
        errorMsg += "기한(날짜)을 입력하세요.<br>";
    }
    if (untiltime == "") {
        errorMsg += "기한(시간)을 입력하세요.<br>";
    }

    if (errorMsg != "") {
        alertError("add-assignment", errorMsg + "과제 추가를 다시 시도하세요.");
    } else {
        $.ajax({
            type: "post",
            url: "php/assignment/add-assignment.php",
            data: {
                title: title,
                desc: desc,
                subject: subject,
                until: untildate + " " + untiltime
            },
            dataType: "json",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    $("#add-assignment-modal").modal("hide");
                    refreshAssignment();
                } else {
                    alertError("add-assignment", "잘못된 접근입니다.<br>과제 추가를 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function refreshAssignment() {
    $.ajax({
        type: "get",
        url: "php/assignment/assignment-list.php",
        data: {
            page: assignmentPage
        },
        dataType: "text",
        success: function (data, status, xhr) {
            $('#assignment-table tbody').fadeOut(250, function () {
                $('#assignment-table tbody').html(data).fadeIn(250);
                $.ajax({
                    type: "get",
                    url: "php/assignment/assignment-pagination.php",
                    data: {
                        page: assignmentPage
                    },
                    dataType: "text",
                    success: function (data, status, xhr) {
                        $('#pagination').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function showAssignment(id) {
    $.ajax({
        type: "get",
        url: "php/assignment/show-assignment.php",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data, status, xhr) {
            var subjectArr = ["기하와 벡터", "네트워크", "영어", "문학", "미적분I", "미술", "정보보안", "진로와 직업", "창체", "체육", "한국사", "해킹"];
            $('#assignment-title').text(data.title);
            $('#assignment-subject').text("과목 : " + subjectArr[data.subject]);
            $('#assignment-until').text("기한 : " + data.until);
            $('#assignment-desc').text(data.desc);
            if (data.enable == 1) {
                $('#assignment-btn-group').html('<input type="button" class="btn btn-info" value="수정" onclick="modifyAssignment(' + data.id + ', 0);"><input type="button" class="btn btn-danger" value="삭제" onclick="if(confirm(\'정말 삭제하시겠습니까?\')){deleteAssignment(' + data.id + ');}"><input type="button" class="btn btn-warning" value="닫기" data-dismiss="modal" aria-label="Close">');
            } else {
                $('#assignment-btn-group').html('<input type="button" class="btn btn-warning" value="닫기" data-dismiss="modal" aria-label="Close">');
            }
            $("#show-assignment-modal").modal("show");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function modifyAssignment(id, level) {
    if (level == 0) {
        var subjectArr = ["네트워크", "영어", "문학", "미적분I", "미술", "정보보안", "진로와 직업", "창체", "체육", "한국사", "해킹"];
        var title = $('#assignment-title').text();
        var subject = subjectArr.indexOf($('#assignment-subject').text().substr(5));
        var untildate = $('#assignment-until').text().substr(5, 10);
        var untiltime = $('#assignment-until').text().substr(16);
        var desc = $('#assignment-desc').text();
        $('#modify-assignment-title').val(title);
        $('#modify-assignment-subject').val(subject).prop("selected", true);
        $('#modify-assignment-untildate').val(untildate);
        $('#modify-assignment-untiltime').val(untiltime);
        $('#modify-assignment-desc').text(desc);
        $('#modify-assignment-btn-group').html('<input type="button" class="btn btn-danger" value="취소"  data-dismiss="modal" aria-label="Close"><input type="button" class="btn btn-success" value="제출" onclick="modifyAssignment(' + id + ',1);">');
        $("#modify-assignment-modal").modal("show");
    } else {
        errorMsg = "";
        if ($('#modify-assignment-title').val() == "") {
            errorMsg += "주제를 입력하세요.<br>";
        }
        if ($('#modify-assignment-subject').val() == "") {
            errorMsg += "과목을 입력하세요.<br>";
        }
        if ($('#modify-assignment-untildate').val() == "") {
            errorMsg += "기한(날짜)을 입력하세요.<br>";
        }
        if ($('#modify-assignment-untiltime').val() == "") {
            errorMsg += "기한(시간)을 입력하세요.<br>";
        }
        if ($('#modify-assignment-desc').val() == "") {
            errorMsg += "설명을 입력하세요.<br>";
        }

        if (errorMsg != "") {
            alertError("modify-assignment", errorMsg + "과제 수정을 다시 시도하세요.");
        } else {
            $.ajax({
                type: "post",
                url: "php/assignment/modify-assignment.php",
                data: {
                    id: id,
                    title: $('#modify-assignment-title').val(),
                    subject: $('#modify-assignment-subject').val(),
                    until: $('#modify-assignment-untildate').val() + " " + $('#modify-assignment-untiltime').val(),
                    desc: $('#modify-assignment-desc').val()
                },
                dataType: "json",
                success: function (data, status, xhr) {
                    if (data.status == "s") {
                        refreshAssignment();
                        showAssignment(id);
                        $("#modify-assignment-modal").modal("hide");
                    } else {
                        alertError("modify-assignment", "잘못된 접근입니다.<br>게시글 작성을 다시 시도하세요.");
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    }
}

function deleteAssignment(id) {
    $.ajax({
        type: "get",
        url: "php/assignment/delete-assignment.php",
        data: {
            id: id
        },
        dataType: "text",
        success: function (data, status, xhr) {
            refreshAssignment();
            $("#show-assignment-modal").modal("hide");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

// Resume

function addResume() {
    form = document.getElementById("add-resume-form");
    var type = form.type.value;
    var title = form.title.value;
    var desc = form.desc.value;
    var startdate = form.startdate.value;
    var enddate = form.enddate.value;

    errorMsg = "";
    if (title == "") {
        errorMsg += "제목을 입력하세요.<br>";
    }
    if (desc == "") {
        errorMsg += "설명을 입력하세요.<br>";
    }
    if (type == "0") {
        errorMsg += "종류를 선택하세요.<br>";
    }
    if (startdate == "") {
        errorMsg += "시작 날짜를 입력하세요.<br>";
    }
    if (enddate == "") {
        errorMsg += "종료 날짜를 입력하세요.<br>";
    }

    if (errorMsg != "") {
        alertError("add-resume", errorMsg + "내 레주메 정보 추가 신청을 다시 시도하세요.");
    } else {
        $.ajax({
            type: "post",
            url: "php/resume/add-resume.php",
            data: {
                title: title,
                desc: desc,
                type: type,
                startdate: startdate,
                enddate: enddate
            },
            dataType: "json",
            success: function (data, status, xhr) {
                if (data.status == "s") {
                    $("#add-resume-modal").modal("hide");
                    refreshResume();
                    refreshNotAllowedResume();
                } else {
                    alertError("add-resume", "잘못된 접근입니다.<br>과제 추가를 다시 시도하세요.");
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function deleteResume(id) {
    $.ajax({
        type: "get",
        url: "php/resume/delete-resume.php",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data, status, xhr) {
            refreshResume();
            refreshNotAllowedResume();
            $("#show-resume-detail-modal").modal("hide");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function refreshResume() {
    $.ajax({
        type: "get",
        url: "php/resume/resume-list.php",
        dataType: "text",
        success: function (data, status, xhr) {
            $('#loading').remove();
            $('#table-resume tbody').html(data);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function refreshNotAllowedResume() {
    $.ajax({
        type: "get",
        url: "php/resume/not-allowed-resume-list.php",
        dataType: "text",
        success: function (data, status, xhr) {
            $('#loading').remove();
            $('#table-not-allowed-resume tbody').html(data).fadeIn(250);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function cancelAddResume(id) {
    $.ajax({
        type: "get",
        url: "php/resume/cancel-add-resume.php",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data, status, xhr) {
            if (data.status == "s") {
                refreshNotAllowedResume();
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function showResume(user_id) {
    $.ajax({
        type: "get",
        url: "php/resume/resume-list.php",
        data: {
            user_id: user_id
        },
        dataType: "text",
        success: function (data, status, xhr) {
            $('#table-resume tbody').html(data);
            $("#show-resume-modal").modal("show");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function showResumeDetail(id) {
    $.ajax({
        type: "get",
        url: "php/resume/show-resume.php",
        data: {
            id: id
        },
        dataType: "json",
        success: function (data, status, xhr) {
            var typeArr = ["", "관심분야", "자격증 취득", "수상", "대회 공모전", "어학 인증", "해외 연수", "인턴", "특허", "프로젝트", "전공 동아리", "멘토링", "대외 참여", "봉사", "독서", "예술 체육", "취미 기타"];
            $('#resume-title').text(data.title);
            $('#resume-user').text(data.user + "의 레주메");
            $('#resume-type').text("종류 : " + typeArr[data.type]);
            $('#resume-startdate').text(data.startdate + " 부터");
            $('#resume-enddate').text(data.enddate + " 까지");
            $('#resume-allowed').text(data.allowed);
            $('#resume-desc').text(data.desc);
            $('#resume-delete').on("click", function () {
                deleteResume(id);
            });
            $("#show-resume-detail-modal").modal("show");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

// admin

function approveResume(id) {
    $.ajax({
        type: "get",
        url: "php/admin/approveResume.php",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data, status, xhr) {
            nowpage = "admin-refresh";
            movePage("admin");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function rejectResume(id) {
    $.ajax({
        type: "get",
        url: "php/admin/rejectResume.php",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data, status, xhr) {
            nowpage = "admin-refresh";
            movePage("admin");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}