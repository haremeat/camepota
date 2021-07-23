<?php
include 'session_check.php';

$sql ="
SELECT *
FROM articleReply
WHERE id = '{$_POST['id']}'
";

$body = str_replace("'", "''", $_POST['body']);

$sql = "
UPDATE articleReply
SET body = '$body'
WHERE id = '{$_POST['id']}'
";

execute($sql);

//$link = "detail.php"."?id=".$_GET['id'];
$result = array(
  'resultCode' => 'S-1',
  'id' => $_POST['id'],
  'body' => $_POST['body']
);

echo json_encode($result);
?>
