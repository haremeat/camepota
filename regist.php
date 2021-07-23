<?php
include 'session_check.php';
include 'menu.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
p, h1, form, button{border:0; margin:0; padding:0;}

.spacer{clear:both; height:1px;}

.myform{
	margin:10px;
	width:400px;
	height:700px;
	padding:14px;
}

#stylized{
	margin-top: 30px;
	background-color: #fff;
	border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	box-shadow: 0 2px 5px rgba(0,0,0,0.075);
	-webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
	-moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
}
#stylized h1 {
	font-size:16px;
	font-weight:bold;
	margin-bottom:8px;
}
#stylized p{
	font-size:11px;
	color:#666666;
	margin-bottom:20px;
	border-bottom:solid 1px #b7ddf2;
	padding-bottom:10px;
	font-family:dotum;
}
#stylized label{
	display:block;
	color: #666;
	font-weight:bold;
	text-align:right;
	width:140px;
	float:left;
	font-family:tahoma;
}
#stylized .small{
	color:#666666;
	display:block;
	font-size:11px;
	font-weight:normal;
	text-align:right;
	width:140px;
	font-family:dotum;
	letter-spacing:-1px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #666;
width:200px;
margin:2px 0 20px 10px;
}


#stylized .regi_btn{
clear:both;
margin-left:150px;
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
}

#stylized .ID_dupl_btn {
	margin-left:150px;
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
	margin-bottom: 20px;
}

.comment{
	float:left;
	font-size:12px;
	padding:4px 2px;
	border:solid 1px #666;
	width:200px;
	margin:2px 0 20px 10px;
}
</style>

<!--아이디 중복확인-->
<script>
function ID_check(loginId) {
$.post(
'ID_dupl.php',
{
  id : loginId
},
  function(data) {
      alert(data.msg);
  },
  'json'
);
}
</script>

<!--닉네임 중복확인-->
<script>
function Nick_check(Nickname) {
$.post(
'Nick_dupl.php',
{
  id : Nickname
},
  function(data) {
      alert(data.msg);
  },
  'json'
);
}
</script>

<!--이메일 중복확인-->
<script>
function mail_check(Email) {
$.post(
'mail_dupl.php',
{
  id : Email
},
  function(data) {
      alert(data.msg);
  },
  'json'
);
}
</script>

<script>
function submitForm(form){
	if(form.loginId.value == ''){
		form.loginId.focus();
		alert('아이디를 입력해주세요');
		return false;
	}

	if ((new RegExp(/[^a-z|^0-9]/gi)).test(form.loginId.value)) {
	    alert("ID는 영숫자 조합만 사용하세요");
	    form.loginId.focus();
		return false;
	}

	if((new RegExp(/[^a-z|^0-9+.@^a-z]/)).test(form.email.value)){
		form.email.focus();
		alert('이메일 형식이 올바르지 않습니다');
		return false;
	}

	if(form.userName.value == ''){
		form.userName.focus();
		alert('닉네임을 입력해주세요');
		return false;
	}
	if(form.email.value == ''){
		form.email.focus();
		alert('이메일을 입력해주세요');
		return false;
	}
	if(form.loginPw.value == ''){
		form.loginPw.focus();
		alert('비밀번호를 입력해주세요');
		return false;
	}
	if(form.pw_confirm.value == ''){
		form.pw_confirm.focus();
		alert('비밀번호 확인을 입력해주세요!');
		return false;
	}
	if(form.loginPw.value != form.pw_confirm.value ){
		form.loginPw.focus();
		alert('비밀번호와 비밀번호 확인이 일치하지 않습니다!');
		return false;
	}
	form.submit();
}
</script>


<!-- 제목 글자수 제한 -->
<script>
function fnChkByte(obj) {
    var maxByte = 30; //최대 입력 바이트 수
    var str = obj.value;
    var str_len = str.length;
    var rbyte = 0;
    var rlen = 0;
    var one_char = "";
    var str2 = "";
    for (var i = 0; i < str_len; i++) {
        one_char = str.charAt(i);
        if (escape(one_char).length > 4) {
            rbyte += 2; //한글2Byte
        } else {
            rbyte++; //영문 등 나머지 1Byte
        }
        if (rbyte <= maxByte) {
            rlen = i + 1; //return할 문자열 갯수
        }
    }
    if (rbyte > maxByte) {
        alert("한글 " + (maxByte / 2) + "자 / 영문 " + maxByte + "자를 초과 입력할 수 없습니다.");
        str2 = str.substr(0, rlen); //문자열 자르기
        obj.value = str2;
        fnChkByte(obj, maxByte);
    } else {
        document.getElementById('byteInfo').innerText = rbyte;
    }
}
</script>

<meta charset="utf-8">
<center>
<div id="stylized" class="myform">
<form name="form" class="regist" action="perform_regist.php" method="POST" onsubmit="submitForm(this); return false;">
<h1>회원가입</h1>
<p>어서 회원가입 해주세요</p>

<label>ID
<span class="small">아이디 입력</span>
</label>
<input type="text" name="loginId" id="loginId" onkeyup="fnChkByte(this);">

<!--<input type="button" name="ID_dupl_btn" class="ID_dupl_btn" value="ID 중복확인" onclick="code_check($('#loginId').val());">
-->
<button type="button" name="ID_dupl_btn" class="ID_dupl_btn" onclick="ID_check($('#loginId').val());">ID 중복체크</button>

<br>
<label>Nickname
<span class="small">닉네임 입력</span>
</label>
<input type="text" name="userName" id="name" onkeyup="fnChkByte(this);">
<button type="button" name="Nick_dupl_btn" class="ID_dupl_btn" onclick="Nick_check($('#name').val());">닉네임 중복체크</button>
<label>Email
<span class="small">이메일주소</span>
</label>
<input type="text" name="email" id="email" />
<button type="button" name="mail_dupl_btn" class="ID_dupl_btn" onclick="mail_check($('#email').val());">이메일 중복체크</button>
<label>Password
<span class="small">비밀번호</span>
</label>
<input type="password" name="loginPw" id="password" onkeyup="fnChkByte(this);">

<label>PW_confirm
<span class="small">비밀번호 확인</span>
</label>
<input type="password" name="pw_confirm" id="pw_confirm" onkeyup="fnChkByte(this);">

<label>Comment
<span class="small">적고 싶은 말</span>
</label>
<textarea class="comment" name="comment" rows="8" cols="40"></textarea>
<br>
<button type="submit" class="regi_btn" style="cursor: pointer;">회원가입</button>
<div class="spacer"></div>
</form>
</div>
