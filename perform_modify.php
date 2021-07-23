<?php
include 'session_check.php';
include 'login_check.php';

/*function getFileExt($type) {
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
*/

$boardId = $_POST['name'];

$content = str_replace("'", "''", $_POST['content']);
$title = str_replace("'", "''", $_POST['title']);
$content = RemoveXSS($content);

$sql = "
UPDATE article
SET title = '$title',
content = '$content'
WHERE id = '{$_POST['id']}'
";
execute($sql);

/*이미지
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
*/
?>
<script>
location.replace('detail.php?name=<?=$boardId?>&id=<?=$_POST['id']?>');
</script>
