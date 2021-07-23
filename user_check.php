<?php
include 'session_check.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>회원정보 수정</title>

        <style media="screen">
        span {
            font-weight:bold;
            font-family:tahoma;
            display: inline-block;
        }

        input {
            width:140px;
            display: inline-block;
        }
        </style>
    </head>
    <body>
        <form name="form" method="POST" action="login_ok.php" onclick="submitForm(this); return false;">
        <p>본인 확인을 위해 비밀번호를 다시 한번 입력해 주시기 바랍니다.</p><br>
        <span>비밀번호</span>
        <input type="password" name="password" id="password" />
        </form>
    </body>
</html>
