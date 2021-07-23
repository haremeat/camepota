<?php
include 'session_check.php';
include 'login_check.php';

$boardId = $_GET['name'];

$sql = "
SELECT *
FROM `user`
WHERE loginId = '{$_SESSION['loginId']}'
";
$row2 = getRow($sql);

$body = str_replace("'", "''", $_POST['body']);


$sql = "
INSERT INTO articleReply
SET regDate = NOW(),
articleID = '{$_POST['articleId']}',
userId = '{$row2['userName']}',
loginId = '{$row2['loginId']}',
body = '$body'
";
execute($sql);

?>
<script>
location.replace('detail.php?name=<?=$boardId?>&id=<?=$_POST['articleId']?>');
</script>
