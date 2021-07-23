<?php
include 'session_check.php';
include "./password.php";

$sql = "
SELECT COUNT(*) cnt
FROM user
WHERE loginId = '{$_POST['loginId']}' OR
userName = '{$_POST['userName']}' OR
email = '{$_POST['email']}'
";
$row = getRow($sql);

$RecordCount = $row['cnt'];

$password = $_POST['loginPw'];  // 회원 가입시 입력받은 회원 비밀번호
$hash = password_hash($password, PASSWORD_BCRYPT);  // 비밀번호 암호화

if ( $RecordCount > 0 ) {
    echo"<script>alert('아이디 또는 닉네임, 이메일이 중복됩니다. 중복체크를 확인해주세요');</script>";
    echo"<script>history.back();</script>";
}

if ( $RecordCount == 0 ){
    $sql = "
    INSERT INTO user
    SET userName='{$_POST['userName']}',
    loginId='{$_POST['loginId']}',
    loginPw= '$hash',
    email = '{$_POST['email']}',
    comment ='{$_POST['comment']}';
    ";
    execute($sql);

    echo"<script>alert('가입을 축하드립니다!');
    window.close();
    location.replace('./home.php');
    </script>";
    exit;
}

?>

<!--
<script>
alert('가입을 축하드립니다!');
window.close();
</script>
-->

<? //exit; ?>
