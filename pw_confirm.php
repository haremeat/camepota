<?
include 'session_check.php';

//패스워드와 패스워드 확인 일치 여부
$sql = "
SELECT COUNT(*) cnt
FROM user
WHERE loginPw = pw_confirm
";
$row = getRow($sql);

$RecordCount = $row['cnt'];

if( $RecordCount == 0){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '비밀번호와 비밀번호 확인이 일치하지 않습니다!',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;
    }

if ( $RecordCount > 0) {
         $result = array(
         'resultCode' => 'S-1',
         'id' => $_POST['id']
          );

     echo json_encode($result);
     exit;
      }
?>
