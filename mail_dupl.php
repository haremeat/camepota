<?
//이메일 중복 확인
include 'session_check.php';

$sql = "
SELECT COUNT(*) cnt
FROM user
WHERE email = '{$_POST['id']}'
";
$row = getRow($sql);

$RecordCount = $row['cnt'];


if ( $_POST['id'] == null ){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '이메일을 입력해주세요.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;
}

if( $RecordCount > 0){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '이미 사용중인 이메일입니다.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;

    }
if ( $RecordCount == 0) {
      $result = array(
        'resultCode' => 'S-1',
        'msg' => '사용 가능한 이메일입니다.',
        'id' => $_POST['id']
      );

      echo json_encode($result);
      exit;
  }

?>
