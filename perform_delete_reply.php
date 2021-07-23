<?php
include 'session_check.php';

$sql = "
DELETE FROM articleReply
WHERE id = '{$_POST['id']}'
";
execute($sql);

//$link = "detail.php"."?id=".$_GET['id'];
$result = array(
  'resultCode' => 'S-1',
  'msg' => '댓글이 삭제되었습니다.',
  'id' => $_POST['id']
);

echo json_encode($result);
?>
