<?
//아이디 찾기
include 'session_check.php';

$sql = "
SELECT *
FROM user
WHERE email = '{$_POST['email']}'
";
$row = getRow($sql);

?>

<? if ( !isset($row['loginId']) ) { ?>
<script>
alert('이메일이 정확하지 않거나 찾으시는 아이디가 존재하지 않습니다.');
history.back();
</script>
<? } ?>

<? if ( isset($row['loginId']) ) { ?>
<script>
alert('찾으시는 아이디는 <?=$row['loginId']?>입니다.');
history.back();
</script>
<? } ?>
