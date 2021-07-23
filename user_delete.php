<?
include 'session_check.php';

$sql = "
DELETE FROM user
WHERE id = '$id'
";
execute($sql);

$link = 'index.php';
?>

<script>
alert('회원탈퇴가 정상적으로 이루어졌습니다.');
window.close();
location.replace('<?=$link?>');
</script>
