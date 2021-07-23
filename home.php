<?
include 'session_check.php';
include 'menu.php';

$sql = "
SELECT userName
FROM `user`
";
execute($sql);

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

//최신글
$sql = "
SELECT *
FROM article
LEFT JOIN board
ON article.boardId = board.typeCode
GROUP BY article.id
ORDER BY article.id DESC
LIMIT 10
";
$recentFree = getRows($sql);

$sql = "
SELECT *
FROM article
WHERE boardId = 'notice'
ORDER BY id DESC
LIMIT 4
";
$notice = getRows($sql);

?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>낙타와 감자튀김</title>
    <!--<link rel="stylesheet" href="./css/board.css" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet prefetch' href='http://cdn.bootcss.com/fullPage.js/2.6.5/jquery.fullPage.css'>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>

    <script>
        function popup2() {
            window.open('find_id.php', 'popup', 'width=300, height=500, left=400, top=400, location=no, toolbar=no, resizable=no, scrollbars=yes');
        }
    </script>

    <style>
        .section {
            display: inline-block;
        }

        table {
            text-align: center;
        }

        tr {
            background-color: #47a3da;
            color: #fff;
        }

        td {
            background-color: #fff;
            color: gray;
        }

        h2 {
            color: gray;
        }

        div.notice_top {
            margin-top: 30px;
            display: inline-block;
            width: 1024px;
            height: 200px;
            position: relative;
            z-index: 0;
        }

        div.notice_top div.notice_line {
            width: 1024px;
            height: 35px;
            background-color: black;
            position: absolute;
            color: #fff;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            letter-spacing: 1em;

        }

        div.notice_top ul {
            position: absolute;
            top: 10%;
            width: 1024px;
        }

        div.notice_top ul li {
            list-style: none;
            width: 1024px;
            height: 72px;
            background-color: #e5e5e5;
            line-height: 450%;
            border-top: solid 0.1px #323232;
            border-left: solid 0.1px #323232;
            border-right: solid 0.1px #323232;
            text-align: left;
            font-size: 15px;
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        div.notice_top ul li:nth-child(2) {
            top: 72px;
        }

        div.notice_top ul li:last-child {
            border-bottom: solid 2px #323232;
        }

        div.notice_top ul li::before {
            content: "dd";
            font-size: 15px;
            color: #e5e5e5;
        }

        div.notice_top ul li a {
            background-color: #8ca74b;
            color: white;
            width: 200px;
            height: 40px;
            position: absolute;
            top: 20%;
            left: 75%;
            line-height: 250%;
            text-align: center;
            border: solid #323232 0.1px;
            text-decoration: none;
        }

    </style>
</head>
<body>
<!--공지사항 알림
    <center><div class="notice_top">
          <div class="notice_line">공지사항</div>
          <? foreach ($notice as $index => $no) { ?>
              <ul>
                  <li><?= $no['title'] ?><a href="detail.php?name=<?= $no['title'] ?>&id=<?= $no['articleId'] ?>">공지사항 자세히보기></a></li>
              </ul>
          <? } ?>
      </div>
    </center>
    -->
<div id="fullpage">
    <center>
        <div class="section sec1">
            <center>
                <table align="center">
                    <h2>댓글수 TOP5</h2>
                    <tr>
                        <th>랭킹</th>
                        <th>제목</th>
                        <th>날짜</th>
                        <th>댓글수</th>
                    </tr>
                    <? foreach ($topRepliesArticles as $index => $article) { ?>
                        <tr>
                            <td><?= $index + 1 ?>등</td>
                            <td>
                                <a href="detail.php?name=<?= $article['boardId'] ?>&id=<?= $article['id'] ?>"><?= $article['title'] ?>
                            </td>
                            <td><?= $article['regDate'] ?></td>
                            <td><?= $article['repliesCnt'] ?></td>
                        </tr>
                    <? } ?>
                </table>
        </div>

        <div class="section sec2">
            <center>
                <table align="center">
                    <h2>조회수 TOP5</h2>
                    <tr>
                        <th>랭킹</th>
                        <th>제목</th>
                        <th>날짜</th>
                        <th>조회수</th>
                    </tr>
                    <? foreach ($topViewArticles as $index => $article) { ?>
                        <tr>
                            <td><?= $index + 1 ?>등</td>
                            <td>
                                <a href="detail.php?name=<?= $article['boardId'] ?>&id=<?= $article['id'] ?>"><?= $article['title'] ?>
                            </td>
                            <td><?= $article['regDate'] ?></td>
                            <td><?= $article['viewCnt'] ?></td>
                        </tr>
                    <? } ?>
                </table>
        </div>
        <br>
        <div class="section sec3">
            <center>
                <table align="center">
                    <h2>최신글 TOP10</h2>
                    <tr>
                        <th>게시판</th>
                        <th>제목</th>
                        <th>날짜</th>
                    </tr>
                    <? foreach ($recentFree as $index => $article) { ?>
                        <tr>
                            <td><?= $article['name'] ?></td>
                            <td>
                                <a href="detail.php?name=<?= $article['boardId'] ?>&id=<?= $article['id'] ?>"><?= $article['title'] ?>
                            </td>
                            <td><?= $article['regDate'] ?></td>
                        </tr>
                    <? } ?>
                </table>
        </div>

        <div class="section sec4"></div>
        <div class="section sec5"></div>
</div>

</body>
</html>
