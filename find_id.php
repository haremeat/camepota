<?php
include 'session_check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>아이디 비밀번호 찾기</title>

        <script>
                function email_check(find_id){
                	if(find_id.email.value == ''){
                		find_id.email.focus();
                		alert('이메일을 입력해 주세요');
                		return false;
                	}
                	form.submit();
                }
        </script>

                <script>
                function pw_check(find_pw){
                    if(find_pw.ID.value == ''){
                        find_pw.ID.focus();
                        alert('아이디를 입력해 주세요');
                        return false;
                    }
                    if(find_pw.email.value == ''){
                        find_pw.email.focus();
                        alert('이메일을 입력해 주세요');
                        return false;
                    }
                    form.submit();
                }
                </script>

        <style>
        section{
        	position: relative;
        	width: 600px;
        	margin: 20px auto;
        	display: -webkit-box;
        	display: -moz-box;
        	box-orient:horizental;
        	-moz-box-pack:center;
        }

        section, x:-moz-any-link, x:default{
        		position:relative;
        		margin-left: auto;
        		width:500px;
        		display: block;
        		height:30px;
        }

        	#select1 {
        		width: 100px;
        		display: none;
        	}

            #select2 {
                width: 100px;
                display: none;
            }

        	input.menu1:checked ~ label.btn1,
        	input.menu2:checked ~ label.btn2{
        		width:100px;
        		height:0;
        		line-height:32px;
        		border-right:30px solid transparent;
        		border-bottom:30px solid #47a3da;
        		text-align:center;
        		color:#fff;
        		font-size:15px;
        		font-weight:bold;
        		border-radius: 50px 0 0 0;
        		font-family: Arial, Helvetica, snas-serif;
                text-shadow: rgba(255, 255, 255, 0.8) 0px 1px 1px;
        		padding-left: 5px;
        	}

        	label{
        		position: relative;
        		float: left;
        		display: block;
        		width: 100px;
        		height: 0; line-height: 32px;
        		border-right:30px solid transparent;
        		border-bottom: 30px solid #c9cacc;
        		text-align:center; color:#fff;
        		font-size:15px; font-weight:bold;
        		text-shadow: rgba(10, 10, 10, 0.5) 0px 0px 1px;
        		border-radius: 5px 0 0 0px;
        		text-decoration:none;
        		padding-left:5px;
        		font-family: Arial, Helvetica, snas-serif;
        		cursor:pointer;
        		z-index:2;
        	}

        	ul{
        	position:relative;
        	margin:30px auto;
        	width:500px;
        	height:300px;
        	padding:30px;
        	-webkit-box-sizing:border-box;
        	-moz-box-sizing:border-box;
        	}

        	ul.layout_mask{
        		position:absolute;
        		width:500px; left:0;
        		height:300px;
        		overflow:hidden;
        	}

        	ul.layout_mask li{
        		position:absolute;
        		top:0px;
        		left:600px;
        		padding:20px 30px 30px 30px;
        		list-style:none;
        	}

        	p.title{
        		position:relative;
        		display:block;
        		font-size:22px;
        		height:30px;
        		font-weight:bold;
        		color:#47a3da;
        		font-family:Arial, Helvetica, snas-serif;
        		margin-bottom:10px;
        		text-shadow: rgba(255, 255, 255, 0.9) 1px 1px 1px;
        		border-bottom: 1px dashed #7adcb8;
        	}

        	p{
        		font-size:12px;
        		line-height:20px;
        		color:#666;
        		width:450px;
        	}

        	input.menu1:checked ~ .layout_mask li:nth-child(1),
        	input.menu2:checked ~ .layout_mask li:nth-child(2){
        		-webkit-animation:none;
        		-moz-animation:none;
        		-webkit-transition: left 0.5s ease-in-out;
        		-moz-transition: left 0.5s ease-in-out;
        		left:0px;
        		z-index:10;
        	}

        	input:checked ~ ,layout_mask li{
        		-webkit-animation: slideOut 0.5s ease-in-out none;
        		-moz-animation: slideOut 0.5s ease-in-out none;
        	}

        		@-webkit-keyframes slideOut{
        			0%{left: 0px;}
        			100%{left:-600px;}
        		}

        		.effect{
        		position:relative;
        		width:600px;
        		height:300px;
        		margin:-20px auto;
        		-webkit-box-sizing: border-box;
        		background: #fff;
        		border-radius:0 10px 10px 10px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.075);
                -webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
                -moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
        		}

                button {
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
                    border: 0;
                    margin-top: 20px;
                    margin-right: 10px;
                }

                span {
                    font-weight:bold;
                    width:140px;
                    font-family:tahoma;
                    display: block;
                }

                input {
                    display: inline;
                }

        </style>


    </head>
    <body>
        <div class="fi-container">
        <section>
            <div class="fi-content">
    <input id="select1" name="tabmenu" type="radio" class="menu1" checked />
    <label for="select1" class="btn1">아이디 찾기</label>
    <input id="select2" name="tabmenu" type="radio" class="menu2">
    <label for="select2" class="btn2">비밀번호 찾기</label>
    <ul class="layout_mask">
        <li>
<form name="find_id" action="perform_find_id.php" method="POST" onsubmit="email_check(this); return false;">
    아이디는 회원가입시 등록한 이메일을 입력하시면 정보를 확인하실 수 있습니다.
    </p>
    <h2>아이디 찾기</h2>
    <span>Email</span>
    <input type="text" name="email" id="email" />
    <br>
    <button type="submit">아이디찾기</button>
    <button type="submit" onclick="window.close();">취소</button>
    <div class="spacer"></div>
</form>
        </li>
            </div>

<div class="fi-content2">
        <li>
<form name="find_pw" action="perform_find_pw.php" method="post" onsubmit="pw_check(this); return false;">
비밀번호는 암호화되어 있으므로 아이디와 이메일 인증 후 새로운 비밀번호로 재등록하셔야 합니다.
            </p>
    <h2>비밀번호 찾기</h2>
    <span>ID</span>
    <input type="text" name="ID" id="ID" />
    <br>
    <span >Email</span>
    <input type="text" name="email" id="email" />
    <br>
    <button type="submit">비밀번호 찾기</button>
    <button onclick="window.close();">취소</button>
    <div class="spacer"></div>
 </form>
</li>
</div>
    </ul>
</section>
</div>
<div class="effect"></div>
    </body>
</html>
