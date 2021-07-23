<?php
include 'session_check.php';

$sql ="
INSERT INTO file
type = '{$_POST['upload']}'
WHERE id = '{$_POST['id']}'
";
$row = getRow($sql);

$result = array(
  'resultCode' => 'S-1',
  'id' => $_POST['id'],
  'msg' => '성공'
);

echo json_encode($result);
?>
