<?php
include 'session_check.php';

$sql ="
UPDATE notes
SET hide = 'Y'
WHERE id = '{$_POST['id']}'
";
execute($sql);

$result = array(
  'resultCode' => 'S-1',
  'msg' => '쪽지가 삭제되었습니다.',
  'id' => $_POST['id']
);

echo json_encode($result);
?>
