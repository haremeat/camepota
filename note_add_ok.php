<?
include 'session_check.php';
include 'note_login_check.php';
/*
if (isset($_GET['id'])) {
$sql = "
SELECT *
FROM article
WHERE id = '{$_GET['id']}'
";
$row2 = getRow($sql);
}
*/

$note = str_replace("'", "''", $_POST['note']);
$title = str_replace("'", "''", $_POST['title']);

//쪽지 보내기
$sql = "
INSERT INTO notes
SET regDate = NOW(),
sent_id = '$login_username',
rece_id = '{$_POST['receiver']}',
title = '$title',
note = '$note',
rece_del = 'N',
sent_del = 'N',
kind1 = 'rece',
kind2 = 'sent',
hide = 'N'
";
execute($sql);

$sql = " SELECT LAST_INSERT_ID() AS newId ";
$row = getRow($sql);
?>

<script>
alert('성공적으로 전송 되었습니다!');
history.back();
//location.replace('note_sent.php?kind=sent');
</script>
