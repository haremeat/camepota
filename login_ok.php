<?php
include 'session_check.php';
include 'password.php';

$password = $_REQUEST['loginPw'];

$sql = "
SELECT *
FROM user
WHERE loginId = '{$_REQUEST['loginId']}'
LIMIT 1
";
$row1 = getRow($sql);
$hash_password = $row1['loginPw'];

$sql = "
SELECT COUNT(*) AS cnt, loginPw
FROM `user`
WHERE loginId = '{$_REQUEST['loginId']}'
";
$row = getRow($sql);

$resultCode = '';

if ( empty($resultCode) ) {
	if ( $row['cnt'] == 0 ) {
		$resultCode = 'F-1';
		$msg = '존재하지 않는 회원입니다.';
	}
}

if ( empty($resultCode) ) {
	if (password_verify($password, $hash_password)) {
		$_SESSION['loginId'] = $_REQUEST['loginId'];
		$resultCode = 'S-1';
		$msg = '환영합니다.';
	  header("location: home.php");
} else {
	$resultCode = 'F-2';
	$msg = '아이디나 비밀번호가 일치하지 않습니다.';
	}
}

?>
<script>
alert('<?=$msg?>');
history.back();
/*location.replace('index.php');*/
</script>
?>
