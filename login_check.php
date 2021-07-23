<?
//로그인 여부를 나타내는 변수
$isLogined = false;

if ( isLogined() ) {
	$isLogined = true;
}

if ( $isLogined === false) {
	?>
	<script>
	alert('로그인 해 주세요.');
	history.back();
	//location.replace('index.php');
	</script>
	<?
	exit;
}
?>
