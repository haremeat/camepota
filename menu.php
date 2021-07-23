<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>낙타와 감자튀김</title>
		<meta name="description" content="Blueprint: Horizontal Slide Out Menu" />
		<meta name="keywords" content="horizontal, slide out, menu, navigation, responsive, javascript, images, grid" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>


		<script>
	function popup(){
		window.open('note_rece.php?kind=rece', 'popup', 'width=600, height=400, left=100, top=50, location=no, toolbar=no, resizable=no, scrollbars=yes');
 					}
	</script>

	<style media="screen">
	div.top {
		background-color:#47a3da;
		border-bottom: solid #47a3da;
		opacity: 0.7;
		position: relative;
		width: 100%;
		height:25px;
	}

	div.top a{
		cursor: pointer; color: #fff; margin-right:20px; float:right;
	}

	div.top a:hover{
		color: #47a3da;
		background-color: #fff;
	}
	</style>

	<link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.ico">
	</head>
	<body>
	<div class="top">
		<a href="regist.php" class="side">회원가입</a>&nbsp;&nbsp;
		<a class="side" onclick=popup2();>아이디/패스워드 찾기</a>
	</div>
		<div class="container">
			<header class="clearfix">
				<span style="color: #47a3da;">Welcome to the<span class="bp-icon bp-icon-about"
				data-content="낙타와 감자튀김은 끝까지 커뮤니티의 주제를 정하지 못한 제작자가 만든 근본없는 커뮤니티 사이트입니다.
				&nbsp;&nbsp;혹시 원하는 게시판의 주제가 있으시면 제작자에게 문의 바랍니다."></span></span>
				<a href="index.php"><h1>낙타와 감자튀김</h1></a>
				<nav>
		<? if ( $isLogined = isset($_SESSION['loginId']) ) { ?>
		<span style="color:#47a3da; font-size: 20px;"><?=$login_username?>(<?=$login_id?>)님</span>
		<br>
		<i class="fa fa-unlock" aria-hidden="true" style="color:#47a3da;"></i><a href="logout.php"><span>로그아웃</span></a>
		&nbsp; &nbsp;
		<i class="fa fa-envelope-o" aria-hidden="true" style="color:#47a3da;"></i><a href="#" onclick=popup();><span>쪽지함</span></a>
		&nbsp; &nbsp;
		<i class="fa fa-user" aria-hidden="true" style="color:#47a3da;"></i><a href="user_profile.php"><span>회원정보</span></a>

		<? } else { ?>
		<? include 'login.php';?>
		<? } ?>
				</nav>
			</header>
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="home.php">Home</a>
							</li>
							<li>
								<a href="#">게시판</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="list.php?name=notice"><span>공지사항</span></a></li>
									<li><a href="list.php?name=free"><span>자유</span></a></li>
									<li><a href="list.php?name=humor"><span>유머</span></a></li>
									<li><a href="list.php?name=game"><span>게임</span></a></li>
									<li><a href="list.php?name=art"><span>그림</span></a></li>
									<li><a href="list.php?name=QnA"><span>고민</span></a></li>
									<li><a href="list.php?name=star"><span>연예인</span></a></li>
									<li><a href="list.php?name=cartoon"><span>만화/애니</span></a></li>
									<li><a href="list.php?name=coding"><span>개발</span></a></li>
									<li><a href="list.php?name=cinema"><span>영화</span></a></li>
									<li><a href="list.php?name=music"><span>음악</span></a></li>
									<li><a href="list.php?name=animal"><span>동물</span></a></li>
								</ul>
							</li>

							<li>
							<a href="#">Food</a>
								<ul class="cbp-hssubmenu">
							<li><a href="list.php?name=one"><span>자취식</span></a></li>
							<li><a href="list.php?name=home"><span>집밥</span></a></li>
							<li><a href="list.php?name=con"><span>편의점</span></a></li>
							<li><a href="list.php?name=yamy"><span>맛집</span></a></li>
							<li><a href="list.php?name=cafe"><span>카페</span></a></li>
							<li><a href="list.php?name=dessert"><span>간식</span></a></li>
								</ul>
							</li>

							<li>
								<a href="#">About</a>
								<ul class="cbp-hssubmenu">
									<li><a href="proposal.php"><span>건의사항</span></a></li>
									<li><a href="admin_profile.php"><span>제작자 소개</span></a></li>
								</ul>
							</li>

							<li><a href="#">Links</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
		</script>
	</body>
</html>
