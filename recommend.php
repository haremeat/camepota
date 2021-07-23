<?
//추천
include 'session_check.php';
include 'login_check.php';

$sql = "
select *
from article
Where id = '{$_POST['id']}'
";
$row2 = getRow($sql);

$sql = "
SELECT *
FROM user
WHERE loginId = '{$_SESSION['loginId']}'
";
$row3 = getRow($sql);

$sql = "
SELECT COUNT(*) AS cnt
FROM recommend
WHERE userId = '$login_id'
AND articleId = '{$row2['id']}'
";
$row = getRow($sql);

$RecordCount = $row['cnt'];

if ( !isset ($_SESSION['loginId']) ) {
    $result = array(
    'resultCode' => 'F-2',
    'msg' => '로그인을 하셔야 추천할 수 있습니다',
    'id' => $_POST['id']
    );
    echo json_encode($result);
    exit;
}

if( $RecordCount > 0){
    $result = array(
      'resultCode' => 'F-1',
      'msg' => '이미 추천한 게시글입니다',
      'id' => $_POST['id']
    );

    echo json_encode($result);
    exit;
}

if ( $RecordCount == 0) {

    execute("UPDATE article SET recommend = recommend + 1 WHERE id = '{$_POST['id']}'");
    execute("INSERT INTO recommend SET regDate = NOW(), articleId = '{$row2['id']}', userId = '{$row3['loginId']}'");

     $result = array(
        'resultCode' => 'S-1',
        'msg' => '추천하였습니다.',
        'id' => $_POST['id']
      );

      echo json_encode($result);
      exit;
  }
?>
