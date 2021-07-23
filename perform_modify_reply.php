<?php
include 'session_check.php';

$sql ="
SELECT *
FROM articleReply
WHERE id = '{$_POST['id']}'
";

//$link = "detail.php"."?id=".$_GET['id'];
$result = array(
  'resultCode' => 'S-1',
  'id' => $_POST['id']
);

echo json_encode($result);
?>
