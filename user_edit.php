<?
include 'session_check.php';

$row = getRow("SELECT * FROM user WHERE id = '{$id}'");
?>

<style media="screen">
@import url(http://fonts.googleapis.com/css?family=Roboto:900,300);
body {
font-family: roboto;
}
.container {
width: 400px;
margin: 10px auto 10px;
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

h2 {
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

textarea {
    width: 170px;
    height: 100px;
}

span {
    font-style: bold;
    font-size: 15px;
}

.btn {
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
    </head>
    <body>
        <form class="user_modify" action="user_modify.php" method="post">
        <div class="container">
          <h2><?=$login_username?>님의 프로필</h2>
          <h3>NickName</h3> <?=$row['userName']?>
          <h3>ID</h3>  <?=$login_id?>
          <h3>Password</h3> <input type="password" name="Pass" value="">
          <h3>Password 확인</h3> <input type="password" name="Pass" value="">
          <h3>Email</h3> <input type="text" name="email" value="<?=$login_email?>">
          <h3>Comment</h3>
          <p><textarea name="comment" row="10" col="9"><?=$row['comment']?></textarea></p>
          <input type="submit" class="btn" style="margin-right: 10px;" value="게시물 수정">
          <input type=button  class="btn" value=취소 onClick="history.back();">
        </div>
        </form>
    </body>
</html>
