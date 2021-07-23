<?
//아이디 중복 확인
include 'session_check.php';

$sql = "
SELECT COUNT(*) cnt
FROM user
WHERE loginId = '{$_POST['id']}'
";
$row = getRow($sql);

$RecordCount1 = $row['cnt'];


if ( $_POST['id'] == null ){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '아이디를 입력해주세요.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;
}

if( $RecordCount1 > 0){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '이미 사용중인 아이디입니다.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;

    }
if ( $RecordCount1 == 0) {
      $result = array(
        'resultCode' => 'S-1',
        'msg' => '사용 가능한 아이디입니다.',
        'id' => $_POST['id']
      );

      echo json_encode($result);
      exit;
  }

?>
