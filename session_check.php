<?
include 'config.php';

session_start();

if( isset($_SESSION['loginId'] ) ) {
$user_check = $_SESSION['loginId'];
//아이디
$sql = "SELECT * FROM user WHERE loginId = '$user_check'";
$row = getRow($sql);
$login_id = $row['loginId'];

$sql = "SELECT * FROM user WHERE loginId = '$user_check'";
$row2 = getRow($sql);
$login_username = $row2['userName'];

$sql = "SELECT * FROM user WHERE loginId = '$user_check'";
$row3 = getRow($sql);
$login_email = $row3['email'];

$sql = "SELECT * FROM user WHERE loginId = '$user_check'";
$row4 = getRow($sql);
$login_comment = $row4['comment'];

$sql = "SELECT * FROM user WHERE loginId = '$user_check'";
$row5 = getRow($sql);
$id = $row5['id'];
}
?>
