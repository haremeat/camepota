<?php
include 'session_check.php';
include 'menu.php';

$articleId = $_GET['id'];
$row = getRow("SELECT * FROM article WHERE id = '{$articleId}'");

$selectedBoard = null;
if ( isset($_GET['name']) ) {
  $selectedBoard = getRow("SELECT * FROM board WHERE typeCode = '{$_GET['name']}'");
}

$sql = "
SELECT *
FROM board
";
$boards = getRows($sql);

?>
<meta charset="utf-8">

<style>
    .content {
        width: 780px;
        height: 300px;
    }

    .d-title {
        width: 500px;
    }
</style>

<center><h1>게시물 수정</h1>

    <!--이미지 업로드 폼 시작
    <center>
    <form enctype="multipart/form-data" action="modify.php?name=<?=$_GET['name']?>&id=<?=$row['id']?>" accept-charset="" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="524288">
    <input type="file" name="upload">
    <input type="submit" class="upload_form" name="upload_form" value="업로드">
    <input type="hidden" name="upload_check" value="true">
    </form>
    -->
    <!--이미지 업로드 폼 끝-->

<center>
<form enctype="multipart/form-data" action="perform_modify.php" method="POST">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="name" value="<?=$row['boardId']?>">
<input type="file" name="img1" placeholder="이미지 1">
<br>
<input type="file" name="img2" placeholder="이미지 2">
<br>
<table class="detail_page">

<table width="780" align="center"><tr><td>
    <!-- 제목, 글쓴이, 날짜, 조회, 추천 -->
<table width="100%">
<tr><td height=30>
<table width=100% >
<tr>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
    <td style='word-break:break-all; height:28px; font:bold 17px 굴림; padding:7px 0 0 5px; '><font color=#35a251></font></a>
    <input type="text" width="780" class="d-title" name="title" placeholder="제목" value="<?=$row['title']?>"><br>
    </span></td>
</tr>
</table></td></tr>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr align="right">
    <td height=30>
        작성자&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row['userId']?>
    <div style="font:15px dotum; color:#747474; word-spacing:2px; margin-top:7px; ">

    id : <?=$row['id']?>		l
    등록일 : <?=$row['regDate']?>		l
    조회수 : <?=$row['viewCnt']?>		l
    추천수 : <?=$row['recommend']?>
    </div>

        <!--내용-->
        <tr class="content">
        <td colspan="2" height="150" style='word-break:break-all; padding:10px;'>
        <textarea class="content" name="content"><?=$row['content']?></textarea>
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
        <tr>
            <td colspan="2" style="border-bottom:1px solid gray;">
                <center><input type="submit" value="게시물 수정">&nbsp;&nbsp;
                    <input type=button value=취소 onClick="history.back();">
                    <br><br>
            </td>
        </tr>
</table>
</form>

<br>
<div>
    <center><a href="list.php">리스트 페이지로 이동하기</a>
</div>
