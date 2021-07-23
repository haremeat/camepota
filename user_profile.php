<? include 'session_check.php';
include 'menu.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$login_username?>님의 프로필</title>

<style media="screen">
@import url(http://fonts.googleapis.com/css?family=Roboto:900,300);
body {
font-family: roboto;
}
.pf-container {
width: 400px;
margin: 10px auto 30px;
background-color: #fff;
padding: 0 20px 20px;
border-radius: 6px;
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
box-shadow: 0 2px 5px rgba(0,0,0,0.075);
-webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
-moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
text-align: center;
}

.pf-h2 {
    position: relative;
    text-align: center;
    color: #47a3da;
    font-size: 25px;
    line-height: 25px;
    display: inline-block;
    padding: 10px;
    transition: all ease 0.250s;
    border-top: 1px solid #fff;
    border-bottom: 1px solid gray;
}
h3 {
font-size: 15px;
color: #666;
letter-spacing: 1px;
margin-bottom: 5px
}
p {
font-size: 16px;
line-height: 26px;
margin-bottom: 20px;
color: #666;
}

span {
    font-style: bold;
    font-size: 15px;
}

.pf-Btn {
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

h2 > a {
    color: #666;
}

h2 > a:hover {
    color : #47a3da
}

@media screen and (max-width: 767px){
    .pf-container {
        max-width: 100%;
    }
}
        </style>
    </head>
    <body>
        <div class="pf-container">
          <h2 class="pf-h2"><?=$login_username?>님의 프로필</h2>
          <h3>NickName</h3> <?=$login_username?>
          <h3>ID</h3>  <?=$login_id?>
          <h3>Email</h3> <?=$login_email?>
          <h3>Comment</h3>
          <p><?=nl2br($login_comment)?></p>
          <h2><a href="user_article.php">작성글 보러가기</a></h2><br>
          <a href="user_edit.php"><button type="button" class="pf-Btn" name="button" style="margin-right: 10px;">회원정보 수정</button></a>
          <a href="user_delete.php"><button type="button" class="pf-Btn" name="button" onclick="if ( !confirm('정말 탈퇴하시겠습니까?') ) return false;">회원탈퇴</button></a>
        </div>
    </body>
</html>
