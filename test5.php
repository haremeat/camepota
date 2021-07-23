<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>로그인 부트스트랩 예제</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login5.scss" />

<style media="screen">
</style>
    </head>
    <body>
    <div class="login">
        <form class="form-horizontal" action="index.html" method="post">
            <div class="form-group">
                <label for="user_login" class="col-md-2 control-label">아이디</label>
                <div class="col-md-2">
                    <input type="text" name="" value="" class="form-control"placeholder="ID">
                </div>
            </div>

            <div class="form-group">
				<label for="user_pass" class="col-md-2 control-label">비밀번호</label>
				<div class="col-md-2 col-sx-8">
					<input type="password" name="pwd" id="user_pass" class="form-control" placeholder="Password">
				</div>
			</div>

            <div class="form-group">
                <label for="user_submit" class="col-md-2"></label>
                <div class="col-md-2">
                    <input type="submit" name="" class="btn btn-primary btn-block" value="로그인">
                </div>
            </div>
        </form>
    </div>
    </body>
</html>
