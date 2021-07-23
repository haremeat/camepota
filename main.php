<?php
include 'session_check.php';
include 'login_check.php';

//$_SESSION['userName'] = $_REQUEST['userName'];
//배열에서 하나만 나오게 하기 위해서 다시 넣어준다.

$lastDay = date('Y-m-d H:i:s', time() - 60 * 60 * 24);

// 역대 가장 많은 댓글을 받은 게시물 TOP 5
$sql = "
SELECT article.*,
COUNT(articleReply.id) AS repliesCnt
FROM article
LEFT JOIN articleReply
ON article.id = articleReply.articleId
AND articleReply.regDate
GROUP BY article.id
ORDER BY repliesCnt DESC
LIMIT 5
";
$topRepliesArticles = getRows($sql);

// 역대 가장 조회수가 많은 게시물 TOP 5
$sql = "
SELECT *
FROM article
ORDER BY viewCnt DESC
LIMIT 5
";
$topViewArticles = getRows($sql);

//자유게시판 최신글
$sql = "
SELECT *
FROM article
WHERE boardId = 'free'
ORDER BY regDate
LIMIT 5
";
$recentFree = getRows($sql);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>낙타와 감자튀김</title>
		<meta name="description" content="Circular Navigation Styles - Building a Circular Navigation with CSS Transforms | Codrops " />
		<meta name="keywords" content="css transforms, circular navigation, round navigation, circular menu, tutorial" />
		<meta name="author" content="Sara Soueidan for Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.ico">
		<script src="js/modernizr-2.6.2.min.js"></script>

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-7243260-2']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				<center>
				<span class="right"><a class="codrops-icon codrops-icon-drop" href="home.php"><span>리스트 페이지로 이동</span></a></span>
			</div>
			<header>
				<? if( isset($_SESSION['loginId'] ) ) { ?>
				<h1>환영합니다!<span><?=$login_username?>(<?=$login_id?>)님</span></h1>
				<? } ?>
				<nav class="codrops-demos">
					<a class="current-demo" href="logout.php">로그아웃</a>
				</nav>
			</header>
			<div class="component">
				<h2>낙타와 감자튀김</h2>
				<!-- Start Nav Structure -->
				<button class="cn-button" id="cn-button">Menu</button>
				<div class="cn-wrapper" id="cn-wrapper">
					<ul>
						<li><a href="list.php?name=notice"><span>공지사항</span></a></li>
						<li><a href="list.php?name=free"><span>자유게시판</span></a></li>
						<li><a href="list.php?name=humor"><span>유머게시판</span></a></li>
            			<li><a href="list.php?name=game"><span>게임게시판</span></a></li>
            			<li><a href="list.php?name=art"><span>그림게시판</span></a></li>
            			<li><a href="list.php?name=QnA"><span>고민게시판</span></a></li>
            			<li><a href="#"><span>제작자</span></a></li>
					 </ul>
				</div>
				<!-- End of Nav Structure -->
			</div>
			<section>
				<center>↑   위의 메뉴버튼을 눌러 주세요! <br>
					낙타와 감자튀김에 방문해 주셔서 감사합니다.
					<br><br>
					<div id="fullpage">
					 <center><div class="section sec1">
						 <center><table align="center">
							 <h2>댓글수 TOP5</h2>
						 <tr>
							 <th>랭킹</th>
							 <th>id</th>
							 <th>제목</th>
							 <th>댓글수</th>
						 </tr>
						 <? foreach ( $topRepliesArticles as $index => $article ) { ?>
						 <tr>
							 <td><?=$index + 1?>등</td>
							 <td><?=$article['id']?></td>
							 <td><?=$article['title']?></td>
							 <td><?=$article['repliesCnt']?></td>
						 </tr>
						 <? } ?>
						 </table>
					 </div>
					 <br>
					 <div class="section sec2">
						 <center><table align="center">
							 <h2>조회수 TOP5</h2>
						 <tr>
							 <th>랭킹</th>
							 <th>id</th>
							 <th>제목</th>
							 <th>조회수</th>
						 </tr>
						 <? foreach ( $topViewArticles as $index => $article ) { ?>
						 <tr>
							 <td><?=$index + 1?>등</td>
							 <td><?=$article['id']?></td>
							 <td><?=$article['title']?></td>
							 <td><?=$article['viewCnt']?></td>
						 </tr>
						 <? } ?>
						 </table>
					 </div>
		</div><!-- /container -->
		<script src="js/polyfills.js"></script>
		<script src="js/demo2.js"></script>
		<!-- For the demo ad only -->
<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
	</body>
</html>
