<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="/css/style.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/56461ea292.js" crossorigin="anonymous"></script>
    <title>love</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="google-site-verification" content="pOYZ-pLe8pPBsq1osm5knkJBXph-sdDHJJGI5O_s5q8" />

</head>
<body style="text-align: center">
{{View::make('header')}}
<div class="container">
    <img id="logo" src="public/image/LovePlace.png" style="width: 15%">
    <div class="login-container" style="text-align: left">
        @if ()
        <a class="login" th:if="${not #strings.isEmpty(member)}"  href="/logout" role="button"
           th:text="|${member}님 환영합니다!|" style="text-align: left; text-decoration: none";>
        </a>
        <a th:if="${#strings.isEmpty(member)}" href="/oauth2/authorization/google" class="btn btn-success active" role="button" style="text-decoration: none"
        >구글아이디로 로그인하기</a>
    </div>

</div> <!-- /container -->
<div  style="text-align: justify" >
    <a th:if="${not #strings.isEmpty(member)}" href="/member/profile"  class="btn active" role="button" style="color: darksalmon; text-decoration: none;  font-size: x-large" >럽플 시작하기</a>
</div>

<div style="text-align: right">
    <a th:if="${not #strings.isEmpty(member)}" href="/member/delete" class="delete" role="button"
       onclick="alert('회원탈퇴가 완료되었습니다')"
       style="color: grey; text-decoration: none; font-size: large">회원탈퇴</a>
</div>
<img src="public/image/background.png" style="width: 100%" height="620">
</body>

</html>
<style>
    a.login:hover:after {
        content: '로그아웃';
        animation: linear;
    }
</style>
