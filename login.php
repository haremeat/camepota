<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>

div.login_container {
    background:#fff;
	margin: 0px auto ;
	padding:15px;
	border:1px solid #e5e5e5;
    display: inline-block;
    position: relative;
	-moz-box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;
	-webkit-box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;
	box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px
}

input.log-btn {
    margin-top: 5px;
    width: 130px;
    height:30px;
    background-color: #47a3da;
    border-radius: 2px;
    color: #fff;
    border-style: none;
    cursor: pointer;
    position: relative;
}


form > div.login::after {
    content:"";
    display:block;
    clear:both;
}

form > div.login > * {
    float:left;
    position: relative;
}

form > div.login > label {
    width:100px;
}



</style>

<script>
function submitForm(form){
    if ( form.loginId.value == '' ){
        form.loginId.focus();
        alert('아이디를 입력해 주세요');
        return false;
    }
    if ( form.loginPw.value == '' ){
        form.loginPw.focus();
        alert('비밀번호를 입력해 주세요');
        return false;
    }
    form.submit();
}
</script>

<form name="form" method="POST" action="login_ok.php" onsubmit="submitForm(this); return false;">
<div class="login_container">
<div class="login">
        <label>아이디</label>
        <div>
            <input type="text" name="loginId">
        </div>
</div>
<div class="login">
        <label>비밀번호</label>
        <div>
            <input type="password" name="loginPw">
        </div>
</div>
        <input type="submit" class="log-btn" value="로그인">
</div>
</form>
