<?
include 'session_check.php';
include 'menu.php';
?>

<style media="screen">

.contain {
width: 400px;
margin: 10px auto 10px;
margin-top: 90px;
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

.avatar-flip {
  border-radius: 100px;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -30px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  box-shadow: 0 0 0 13px #f0f0f0;
  -webkit-box-shadow: 0 0 0 13px #f0f0f0;
  -moz-box-shadow: 0 0 0 13px #f0f0f0;
}
.avatar-flip img {
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  border-radius: 100px;
}

h2 {
  font-size: 32px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #333;
}
h4 {
  font-size: 20px;
  color: #00baff;
  letter-spacing: 1px;
  margin-bottom: 25px
}
p {
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 20px;
  color: #666;
}

@media screen and ( max-width: 55em ){
    .contain{
        width: auto;
        float: none;
    }
    .content{
        width: auto;
    }
}
</style>
<br><br>
<div class="contain">
  <div class="avatar-flip">
    <img src="http://postfiles9.naver.net/MjAxNjEyMDNfMjI1/MDAxNDgwNzUyNTA5ODc2.WZ5BBbsgY2GegL4wDxzGcPUZ-nj8MvQYBH_9hB-0J04g.tZfEd8mABnwVTo7WsqRVBPKPHj5kj6Bt9yYRA06OoHsg.JPEG.dmswjd9341/%EB%91%90%EB%8D%94%EC%A7%80.jpg?type=w2" height="150" width="150">
  </div>
  <div class="content">
  <h2>관리자</h2>
  <h4>PHP,html,Javascript,JAVA,<br>MYSQL,AJAX,JQuery</h4>
  <p>손톱은 왼손부터 깎습니다.</p>
  <p>개인 홈페이지 : http://ereted.dothome.co.kr/</p>
  </div>
</div>
