<?php
include 'session_check.php';
include 'menu.php';

$articleId = $_GET['id'];

execute("UPDATE article SET viewCnt = viewCnt + 1 WHERE id = '{$articleId}'");
$row = getRow("SELECT * FROM article WHERE id = '{$articleId}'");

$selectedBoard = null;

if ( isset($_GET['name']) ) {
  $selectedBoard = getRow("SELECT * FROM board WHERE typeCode = '{$_GET['name']}'");
}

$sql = "
SELECT *
FROM articleFile
WHERE articleId = '{$row['id']}'
";
$imgs = getRows($sql);
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript">
</script>

<script>
function submitForm(form){
	if(form.replbody.value == ''){
		form.replbody.focus();
		alert('내용을 입력해주세요');
		return false;
	}
    form.submit();
}
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="./css/user.css" />

            <style>
            h1 {
                text-align: center;
                font-size: 200%;
            }

            .admin-nick{
                font-weight: bold;
            }

            .imgdiv img{
                width: 100%;
            }

            #ej-Btn {
                background-color: #c9cacc;
                border: 0;
                cursor: pointer;
                border-radius: 3px;
                margin-bottom: 3px;
            }

            .detail_page {
                margin: 0 auto;
                width: 100%;
                border: 0;
                spacing: 5em;
                padding: -1em;
                text-align: center;
            }

            .content {
                background-color: ffffff;
                margin: 0 auto;
                padding: 1%;
                width:100%;
                height:250%;
                column-span:2;
                color: black;
                border-radius: 5px;
                margin-top: 20px;
            }

            .replcss {
                clear: both;
                overflow: auto;
                width:86%;
                height: 70%;
                padding: 1em;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                box-shadow: 0 1px 2px rgba(0,0,0,.2);
                border-radius: 5px;
                margin-top: 20px;
            }

            .replbtn {
                width: 100px;
                height: 50px;
                background-color: #47a3da;
                border-radius: 5px;
                color: #fff;
                cursor: pointer;
                border-style: none;
            }

            .replies1 {
                display: block;
            }

            .replies1 > span {
                    color: black;
            }

            .aa {
                color: black;
            }
            .aa:hover {
                color: #47a3da;
            }

            .replies {
                width: 300px;
                height: 100%;
                margin: 0 auto;
                text-align: center;
            }

            .recoBtn {
                width: 100px;
                height: 30px;
                background-color: #47a3da;
                border-radius: 5px;
                color: #fff;
                cursor: pointer;
                border-style: none;
            }

            .foot {
                margin: 0 auto;
                text-align: center;
            }

            .ej-ta1 {
                width: 55%;
                margin: 0 auto;
            }

            .ej-ta2 {
                width: 100%;
            }

            .ej-td1 {
                height: 30%
            }

            .ej-ta3 {
                width: 100%;
            }

            .ej-td2 {
                height: 1;
                background-color: #E7E7E7;
            }

            .ej-td3 {
                word-break:break-all;
                height:28%;
                font:bold 17%;
                padding:7px 0 0 5px;
            }

            .ej-td4 {
                height:1;
                background-color: #E7E7E7;
            }

            .ej-tr1{
                text-align: right;
            }

            .ej-td5 {
                height: 30%
            }

            .ej-div1 {
                font:90% dotum;
                color:#747474;
                word-spacing:2px;
                margin-top:7px;
            }

            .ej-td6{
                word-break:break-all;
                padding:3%;
                height: 50%;
            }

            .ej-ta4 {
                width: 100%;
            }

            .ej-repl2 {
                width: 100%;
            }

            @media screen and (max-width: 55em) {
            	.detail_container {
                    width: 100%;
            	}

                .ej-page {
                    float: none;
                    width: 100%;
                }

                #ej-repl {
                    float: none;
                    width: 100%;
                }

                .ej-repl2 {
                    float: none;
                    width: 100%;
                }

            	.detail_container h1 {
            		text-align: center;
            	}

                .detail_page{
                    float: none;
                    width: 100%;
                }

                .detail_content{
                    float: none;
                    width: 100%;
                }

                .content {
                    float: none;
                    max-width: 100%;
                }

                .content > span {
                    float: none;
                    width: 100%;
                }

                .foot > a {
                    float: none;
                    width: 100%;
                    text-align: center;
                }

                table{
                    float: none;
                    width: 100%;
                }

                tr {
                    float: none;
                    width: 100%;
                }
            }

            .content img {
                width:100%;
            }

            </style>
    </head>
    <!--쪽지 보내기 팝업-->
    <script>
    function popup1(id){
    window.open('note_add.php?id=' + id, 'popup', 'width=500, height=250, left=100, top=50, location=no, toolbar=no, resizable=no, scrollbars=yes');
    }
    </script>

    <!--덧글 삭제-->
    <script>
    function deleteReply(replyId) {
      $.post(
        'perform_delete_reply.php',
        {
          id : replyId
        },
          function(data) {
            $('.reply-' + data.id).remove();

            alert(data.msg);
          },
          'json'
      );
    }
    </script>

    <!--덧글 수정-->
    <script>
    function modifyReply(replyId) {
      $.post(
        'perform_modify_reply.php',
        {
          id : replyId
        },
          function(data) {
            $('.reply-' + data.id).hide();
            $('.modiC' + data.id).show();
            $('.cancel' +data.id).show();
            $('.modiD' + data.id).show();
          },
          'json'
      );
    }

    function modifyReply2(replyId) {
      $.post(
        'perform_modify_reply.php',
        {
          id : replyId
        },
          function(data) {
              $('.reply-' + data.id).show();
              $('.modiC' + data.id).hide();
              $('.cancel' +data.id).hide();
              $('.modiD' + data.id).hide();
          },
          'json'
      );
    }

    function modifyReply3(replyId) {
        var text = $('.modiC'+replyId).val();
      $.post(
        'perform_modify_reply2.php',
        {
          id : replyId,
          body : text
        },
          function(data) {
              $('.reply-' + data.id).show();
              $('.modiC' + data.id).hide();
              $('.cancel' +data.id).hide();
              $('.modiD' + data.id).hide();
              $('.modiE' + data.id).empty(text);
              $('.modiE'+ data.id).append(text);

          },
          'json'
      );
    }
    </script>

    <!--게시글 추천-->
    <script>
        function recommend(recoId) {
            $.post(
                'recommend.php',
                {
                    id : recoId
                },
                function(data){
                    alert(data.msg);
                    $('.ej-div').load('detail.php?name=<?=$_GET['name']?>&id=<?=$_GET['id']?> .recoBtn .ej-div' + data.id);
                },
                'json'
            );
        }
    </script>

    <div class="detail_container">
        <div class="ej-page">
    <table class="detail_page">
        <h1 style="color: #47a3da;"><?=$selectedBoard['name']?></h1>
    <table class="ej-ta1" align="center"><tr><td>
        <!-- 제목, 글쓴이, 날짜, 조회, 추천 -->
    <table class="ej-ta2">
    <tr><td class="ej-td1">
    <table class="ej-ta3">
    <tr>
	<tr><td class="ej-td2"></td></tr>
		<td class="ej-td3"><font color=#35a251></font></a><?=$row['title']?></td>
    </tr>
    </table></td></tr>
    <tr><td class="ej-td4"></td></tr>
	<tr class="ej-tr1">
		<td class="ej-td5">
            작성자&nbsp;&nbsp;:&nbsp;&nbsp;
    <span class="user-nickname" data-user-id="<?=$row['id']?>">
    <?=$row['userId']?></span>
		<div class="ej-div1">

		id : <?=$row['id']?>		|
		등록일 : <?=$row['regDate']?>		|
		조회수 : <?=$row['viewCnt']?>		|
        추천수 : <?=$row['recommend']?>
		</div>

            <!--내용-->
            <tr class="content">
            <td class="ej-td6" colspan="2">
            <span>
            <?=nl2br($row['content'])?>
            </span>
            <? foreach ($imgs as $img) { ?>
                    <?
                    $imgUrl = '/file/article/' . $img['name'];
                    ?>
                    <div style="imgdiv">
                        <img src="<?=$imgUrl?>">
                    </div>
                <? } ?>
            </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom:1px solid gray;">
                    <center><button type="button" class="recoBtn" onclick="recommend(<?=$row['id']?>);"><i class="fa fa-thumbs-o-up" aria-hidden="true">&nbsp;추천</i></button>
                        <br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
        <center><span>
            <?
            // 게시물 댓글들 얻어오기
            $sql = "
            SELECT * FROM articleReply
            WHERE articleId = '{$_GET['id']}'
            ORDER BY id ASC
            ";
            $replies = getRows($sql);
            ?>
        </span>
    </div>

<!--user 메뉴-->
<div id="overlay"></div>
<div id="context-menu">
  <ul>
    <li class="note"><a href="#" data-user-id="" onclick=popup1($(this).data('user-id'));>쪽지보내기</a></li>
    <li><a href="#">프로필보기</a></li>
  </ul>
</div>

<!--덧글-->
<div class="detail_content">
<? foreach ( $replies as $reply ) { ?>

<div class="reply-<?=$reply['id']?>" id="ej-repl" style="border-bottom: 1px solid gray;">
    <table class="ej-ta4">
        <tr>
            <td>
                <span class="user-nickname" data-user-id="<?=$row['id']?>" style="font-weight: bold; float: left;"><?=$reply['userId']?></span>
                <span style="float: right; margin-bottom: 10px;"><?=$reply['regDate']?></span>
            </td>
        </tr>
        <tr>
            <td>
                <div class="modiE<?=$reply['id']?>" style="margin-bottom:5px;"><?=nl2br($reply['body'])?></div>
            </td>
        </tr>
    </table>

<!--본인과 관리자만 수정버튼과 삭제버튼을 볼 수 있게한다.-->
<? if ( isset($_SESSION['loginId'] ))  { ?>
    <?
    $sql = "SELECT * FROM user WHERE loginId = '$login_id'";
    $row4 = getRow($sql);
    ?>
<? if ($row4['loginId'] == $reply['loginId'] || $row4['adminNo'] == '0' ) {?>
<input type="button" id="ej-Btn" align="right" class="deleA<?=$reply['id']?>" onclick="if ( !confirm('정말 삭제하시겠습니까?') ) return false; deleteReply(<?=$reply['id']?>);" value="댓글삭제"></button>
<input type="button" id="ej-Btn" align="right" class="modiB<?=$reply['id']?>" onclick="modifyReply(<?=$reply['id']?>);" value="댓글수정"></button>
<? } ?>
<? } ?>
</div>
</div>
</div>

<!--<button onclick="deleteReply(<?=$reply['id']?>);">댓글삭제</button>
<button class="modiB<?=$reply['id']?>" onclick="modifyReply(<?=$reply['id']?>);">댓글수정</button>
-->

<!--↓평소에는 보이지 않지만 수정할시 나타나는 것들-->
<textarea class="modiC<?=$reply['id']?>" name="body" style="display:none; width:86%; height: 70%;"><?=$reply['body']?></textarea>
<input type="button" id="ej-Btn" class="cancel<?=$reply['id']?>" onclick="modifyReply2(<?=$reply['id']?>)" value="수정취소" style="display:none;"></button>
<input type="button" id="ej-Btn" class="modiD<?=$reply['id']?>" onclick="modifyReply3(<?=$reply['id']?>)" value="수정" style="display:none;"></button>

<? } ?>

<!--덧글 입력 창-->
<div class="ej-repl2">
<form name="form" method="POST" action="perform_add_reply.php?name=<?=$_GET['name']?>" onsubmit="submitForm(this); return false;">
<input type="hidden" name="articleId" value="<?=$row['id']?>">
<textarea class="replcss" name="body"></textarea>
<input type="hidden" name="userId" value="<?=$replies['userId']?>">
<input type="hidden" name="loginId" value="<?=$replies['loginId']?>">
<input class="replbtn" type="submit" value="덧글입력" onkeyup="fnChkByte(this);">
</form>
</div>
</td>
</tr>
</tr>
</table>

<br>
<div class="foot">
  <a href="list.php?name=<?=$_GET['name']?>" class="aa">리스트 페이지로 이동하기</a>&nbsp; &nbsp;
	<a href="add.php?name=<?=$_GET['name']?>" class="aa">생성</a>&nbsp; &nbsp;
    <? if ( isset($_SESSION['loginId']) ) { ?>
        <?
        $sql = "SELECT * FROM user WHERE loginId = '$login_id'";
        $row4 = getRow($sql);
        //글 쓴 사람과 같아야 한다.
        ?>
    <? if ( $row4['loginId'] == $row['loginId'] || $row4['adminNo'] == '0' ) {?>
	<a href="modify.php?name=<?=$_GET['name']?>&id=<?=$row['id']?>" class="aa">수정</a>&nbsp; &nbsp;
	<a href="perform_delete.php?id=<?=$row['id']?>" onclick="if(!confirm ('정말 삭제하시겠습니까?')) return false;" class="aa">삭제</a>
        <? } ?>
    <? } ?>
</div>

<script>
var isContextMenuHidden = true;

function showContextMenu(x, y, userId) {
  isContextMenuHidden = true;

  $('#overlay').show();

  $('#context-menu')
  .css('left', x)
  .css('top', y)
  .show();

  $('#context-menu .note > a').data('user-id', userId);
}

function hideContextMenu() {
  $('#context-menu')
  .hide();

  $('#overlay').hide();
}

$(function() {
  $('.user-nickname').click(function(e) {
    showContextMenu(e.pageX, e.pageY, $(this).data('user-id'));
  });


  $('#overlay').click(function() {
    hideContextMenu();
  })

  $('.note').click(function() {
    hideContextMenu();
  })

  $(window).keydown(function(e) {
    if ( e.keyCode == 27 ) {
      hideContextMenu();
    }
  })
});
</script>

</html>
