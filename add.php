<?php
include 'session_check.php';
include 'login_check.php';
include 'menu.php';

$selectedBoard = null;

if ( isset($_GET['name']) ) {
  $selectedBoard = getRow("SELECT * FROM board WHERE typeCode = '{$_GET['name']}'");
}

$sql = "
SELECT *
FROM board
WHERE 1
";
//일반회원일 경우 공지사항을 작성할 수 없음!
if ( $row4['admin'] != 'Y' ) {
    $sql .= "
    AND typeCode != 'notice'
    ";
}
$boards = getRows($sql);

$sql = "SELECT * FROM user WHERE loginId = '$login_id'";
$row4 = getRow($sql);

if ( empty($selectedBoard) ) {
  $selectedBoard = $boards[1];
  $_GET['name'] = $selectedBoard['typeCode'];
}


$sql = "
select *
from user
WHERE loginId = '$login_id';
";
$row4 = getRow($sql);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>

<style media="screen">
    table {
        margin: 0 auto;
        text-align: center;
    }

    h1 {
        text-align: center;
       }

       .select {
           width: 100%;
       }

       .submit {
           clear:both;
           margin: 0 auto;
           width:125px;
           height:31px;
           text-align:center;
           line-height:31px;
           background-color:#47a3da;
           color:#FFFFFF;
           font-size:11px;
           font-weight:bold;
           font-family:tahoma;
           cursor: pointer;
           text-decoration: none;
           border: 0;
       }
</style>

<meta charset="utf-8">
<h1 style="color:black;">게시물 작성</h1>

<!--이미지 업로드
<center>
<form id="uploadForm" enctype="multipart/form-data" action="add.php?name=<?=$_GET['name']?>" accept-charset="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="524288">
<input type="file" name="upload">
<input type="submit" class="upload_form" name="upload_form" value="업로드" onclick="imgUpload();">
<input type="hidden" name="upload_check" value="true">
</form>
-->
<!--이미지 업로드 폼 끝-->

<center>
<form enctype="multipart/form-data" action="perform_add.php" method="POST">
<table>
<caption class="readHide" style="color:black;"><?=$selectedBoard['name']?> 글쓰기</caption>
<input type="file" name="img1" placeholder="이미지 1">
<br>
<input type="file" name="img2" placeholder="이미지 2">
<br>
<tr>
  <th style="color:black;">종류</th>
  <td>
      <!--관리자용-->
    <select name="name" class="select" onchange="location.href = 'add.php?name=' + this.value;">
      <? foreach ( $boards as $board ) { ?>
        <?
        $selected = '';

        if ( $board['typeCode'] == $selectedBoard['typeCode'] ) {
          $selected = 'selected';
        }
        ?>
        <option <?=$selected?> value="<?=$board['typeCode']?>"><?=$board['name']?></option>
      <? } ?>
    </select>
  </td>
</tr>
<tr>
  <th style="color:black;">제목</th>
  <td><input type="sybmit" style="width:100%;" name="title" placeholder="제목"></td>
</tr>
  <tr>
    <th style="color:black;">내용</th>
      <td>
        <textarea class="content" name="content" rows="20" cols="130" placeholder="내용"></textarea>
        <?
//이미지 업로드
if (isset($_POST['upload_check'])) {

    if (isset($_FILES['upload']) && !$_FILES['upload']['error']) {

        $imageKind = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');

        if (in_array($_FILES['upload']['type'], $imageKind)) {

            if (move_uploaded_file ($_FILES['upload']['tmp_name'], "./upload/{$_FILES['upload']['name']}")) {

                echo '<p><img src="./upload/'.$_FILES['upload']['name'].'" /></p>';
                //echo '<p>파일명: '.$_FILES['upload']['name'].'</p>';

            }
        } else {
            echo '<p>JPEG 또는 PNG 이미지만 업로드 가능합니다.</p>';
        }

    }

    if ($_FILES['upload']['error'] > 0) {
        echo '<p>파일 업로드 실패 이유: <strong>';

        switch ($_FILES['upload']['error']) {
            case 1:
                echo 'php.ini 파일의 upload_max_filesize 설정값을 초과함(업로드 최대용량 초과)';
                break;
            case 2:
                echo 'Form에서 설정된 MAX_FILE_SIZE 설정값을 초과함(업로드 최대용량 초과)';
                break;
            case 3:
                echo '파일 일부만 업로드 됨';
                break;
            case 4:
                echo '업로드된 파일이 없음';
                break;
            case 6:
                echo '사용가능한 임시폴더가 없음';
                break;
            case 7:
                echo '디스크에 저장할수 없음';
                break;
            case 8:
                echo '파일 업로드가 중지됨';
                break;
            default:
                echo '시스템 오류가 발생';
                break;
        }

        echo '</strong></p>';

    }

    if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
        unlink ($_FILES['upload']['tmp_name']);
    }
}
//이미지 업로드 끝
?>
      </td>
  </tr>
</table><br>
<center><input type="submit" class="submit" value="게시물 작성" onkeyup="fnChkByte(this);">
</form>

<div>
    <br>
    <center><a href="list.php">리스트 페이지로 이동하기</a>
</div>
