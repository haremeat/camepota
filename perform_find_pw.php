<?
//비밀번호 찾기
include 'session_check.php';
include 'password.php';

$sql = "
SELECT *
FROM user
WHERE email = '{$_POST['email']}' AND loginId = '{$_POST['ID']}'
";
$row = getRow($sql);
print_r($row);
exit;
?>

<? if ( null == ( $row['email'] && $row['loginId'] )) { ?>
    <script>
    alert('찾으시는 계정이 존재하지 않습니다. 아이디와 이메일을 다시 입력해 주세요');
    history.back();
    </script>
<? } ?>

<? if ( isset( $row['email'] && $row['loginId'] )) {
    $newPassOrigin = rand(1000,9000);
    $newPass = password_hash($newPassOrigin);
    $sql = "
    UPDATE user
    SET loginPw = '{$newPass}'
    WHERE loginId = '{$_POST['ID']}' AND ='{$_POST['email']}'
    ";
    execute($sql);
    ?>
    <script>
        alert('새로 지급받으신 비밀번호는 <?=$newPassOrigin?>입니다.');
        history.back();
    </script>
<? } ?>
