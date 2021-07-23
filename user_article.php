<?
include 'session_check.php';
include 'menu.php';
include 'login_check.php';

//본인이 작성한 글
$sql = "
SELECT *
FROM article
WHERE loginId = '$login_id'
";
$article = getRows($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
    div.article-list {
    }
    div.article-list > div {
      position: relative;
      border-bottom: 1px solid gray;
      padding: 0 10px;
    }
    div.article-list > div:last-child {
      border-bottom-width: 0px;
    }
    div.article-list > div > .title {
      margin-right: 50px;
    }
    div.article-list > div > div.sub-info > .article-id {
      position: absolute;
      top: 0;
      right: 10px;
    }
    div.article-list > div > div.sub-info > time {
      float: right;
      /* 이것은 레이아웃을 망치지 않습니다. */
      /* 왜냐하면 부모가 이 녀석을 인식하지 않기 때문입니다. */
    }

    @media screen and (max-width: 1000px) {
      div.article-list {
      }
    }

    button.ej-btn{
        margin-top: 20px;
        width: 20%;
        font-size: 15px;
        border: 0;
        padding: 5px;
        border-radius: 5px;
    }

        </style>
    </head>
    <body>
<center><button type="button" class="ej-btn"><a href="user_profile.php">뒤로 가기</a></button></center>
<div class="article-list">
    <div>
        <h4 class="title"></h4>
        <div class="sub-info">
            <span class="article-id"></span>
            <span class="replies-count"></span>
            <span class="writer"></span>
            <span class="view-count"></span>
            <time></time>
        </div>
    </div>
</div>


        <div class="article-list">
    <div>
        <?php foreach ($article as $index => $login_article): ?>
        <h4 class="title">
      <a href="detail.php?name=<?=$login_article['boardId']?>&id=<?=$login_article['id']?>"><?=$login_article['title']?></a>
    </h4>
        <div class="sub-info">
            <span class="article-id"><?=$login_article['id']?></span>
            <span class="replies-count"><?=getArticleRepliesCount($login_article['id'])?></span>
            <span class="writer"><?=$login_article['userId']?></span>
            <span class="view-count"><?=$login_article['viewCnt']?></span>
            <time><?=$login_article['regDate']?></time>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    </body>
</html>
