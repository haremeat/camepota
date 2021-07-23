<?
//닉네임 중복 확인
include 'session_check.php';

$sql = "
SELECT COUNT(*) cnt
FROM user
WHERE userName = '{$_POST['id']}'
";
$row = getRow($sql);

$RecordCount = $row['cnt'];


if ( $_POST['id'] == null ){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '닉네임을 입력해주세요.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;
}

if( $RecordCount > 0){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '이미 사용중인 닉네임입니다.',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;

    }
if ( $RecordCount == 0) {
      $result = array(
        'resultCode' => 'S-1',
        'msg' => '사용 가능한 닉네임입니다.',
        'id' => $_POST['id']
      );

      echo json_encode($result);
      exit;
  }

?>
