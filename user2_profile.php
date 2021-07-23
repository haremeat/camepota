<?
include 'session_check.php';

$sql = "
SELECT *
FROM article
WHERE id = '{$_GET['id']}'
";
$row = getROW($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$row['userId']?>님의 프로필</title>
        <style media="screen">
            body {
                padding: 20px;
                box-sizing: border-box;
            }

            .profile{
                border: 1px solid #666;
                border-radius: 50%;
                margin: 0 auto;
                height: 250px;
                width: 250px;
                z-index: 5;
            }

            header {
                text-align: center;
                }

            header h1 {
                position: relative;
                text-align: center;
                color: #47a3da;
                text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
                font-size: 25px;
                line-height: 25px;
                display: inline-block;
                padding: 10px;
                transition: all ease 0.250s;
                border-top: 1px solid #fff;
                border-bottom: 1px solid gray;
                }

                .comment {
                margin-top: 20px;
                padding: 1px 20px 10px 20px;
                font-size: 14px;
                color: #666;
                z-index: 1;
                text-align: center;
                    }
            </style>
    </head>
    <body>
        <div class="profile">
            <header>
                <h1><?=$row['userId']?></h1>
            </header>

            <div class="comment">
                <p>
                    <?=nl2br($row['comment'])?>
                </p>
            </div>
        </div>
    </body>
</html>
