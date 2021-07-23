<?php
include 'session_check.php';
include 'login_check.php';

$comment = str_replace("'", "''", $_POST['comment']);

$password = $_POST['Pass'];  // 회원 가입시 입력받은 회원 비밀번호
$hash = password_hash($password, PASSWORD_BCRYPT);  // 비밀번호 암호화

$sql = "
UPDATE user
SET userName = '{$_POST['userName']}',
comment = '$comment',
loginPw = '$hash',
email = '{$_POST['email']}'
WHERE id = '$id'
";
execute($sql);

?>
<script>
location.replace('user_profile.php');
</script>
