<?php
include 'session_check.php';
include 'login_check.php';

function getFileExt($type) {
	list(, $type) = explode('/', $type);

	if ( $type == 'jpeg' ) {
		$type = 'jpg';
	}

	return $type;
}

function getFileInfo($raw) {
	$info = [];
	$info['originName'] = $raw['name'];
	$info['ext'] = getFileExt($raw['type']);

	return $info;
}

$boardId = $_POST['name'];

$sql = "
SELECT *
FROM `user`
WHERE loginId = '{$_SESSION['loginId']}'
";
$row2 = getRow($sql);

$body = str_replace("'", "''", $_POST['content']);
$title = str_replace("'", "''", $_POST['title']);

$body = RemoveXSS($body);

$sql = "
INSERT INTO article
SET regDate = '" . NOW_DATETIME . "',
title = '$title',
content = '$body',
userId = '{$row2['userName']}',
loginId = '{$row2['loginId']}',
boardId = '{$boardId}',
comment = '{$row2['comment']}'
";
execute($sql);

$sql = "SELECT LAST_INSERT_ID() AS newId";
$row = getRow($sql);

$linkUrl = "detail.php?name=" . $boardId . "&id=" . $row['newId'];

$articleId = $row['newId'];

$fileInfos = [];

foreach ( $_FILES as $key => $file ) {
	$fileInfo = getFileInfo($file);

	if ( empty($fileInfo['originName']) ) {
		continue;
	}

	$sql = "
	INSERT INTO articleFile
	SET regDate = NOW(),
	articleId = '{$articleId}',
	originName = '{$fileInfo['originName']}',
	ext = '{$fileInfo['ext']}',
	`name` = ''
	";
	execute($sql);

	$sql = "SELECT LAST_INSERT_ID() AS newId";
	$row = getRow($sql);

	$newFileId = $row['newId'];
	$newFileName = $newFileId . '.' . $fileInfo['ext'];

	$sql = "
	UPDATE articleFile
	SET `name` = '{$newFileName}'
	WHERE id = '{$newFileId}'
	";
	execute($sql);

	$newFilePath = $_SERVER['DOCUMENT_ROOT'] . '/file/article/' . $newFileName;

	move_uploaded_file($file['tmp_name'], $newFilePath);
}

?>
<script>
//location.replace('detail.php?name=<?=$boardId?>&id=<?=$row['newId']?>');
location.replace('<?=$linkUrl?>');
</script>
