<?php
include 'session_check.php';
//print_r($_SESSION);
//exit;
if ( $isLogined = isset($_SESSION['loginId']) ) {
	?>
	<script>
	//alert('이미 로그인되어 있습니다.');
	location.replace('main.php');
	</script>
	<?
	exit;
}
?>
