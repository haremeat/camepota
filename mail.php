<?php
    phpinfo();
    //기본적으로 php.ini 파일의 'SMTP' 부분을 외부 IP로 설정해주어야 한다.
    //우리는 localhost로 설정되어 있는 그것.
?>

<html>
    <head>
<?php
// 메일발송 시작
    $nameFrom  = "dmswjd9341";
    $mailFrom = "naver.com";
    $nameTo  = "jenny9341";
    $mailTo = "daum.net";
    $cc = "참조";
    $bcc = "숨은참조";
    $subject = "제목";
    $content = "메일내용";

    $charset = "UTF-8";

    $nameFrom   = "=?$charset?B?".base64_encode($nameFrom)."?=";
    $nameTo   = "=?$charset?B?".base64_encode($nameTo)."?=";
    $subject = "=?$charset?B?".base64_encode($subject)."?=";

    $header  = "Content-Type: text/html; charset=utf-8\r\n";
    $header .= "MIME-Version: 1.0\r\n";

    $header .= "Return-Path: <". $mailFrom .">\r\n";
    $header .= "From: ". $nameFrom ." <". $mailFrom .">\r\n";
    $header .= "Reply-To: <". $mailFrom .">\r\n";
    if ($cc)  $header .= "Cc: ". $cc ."\r\n";
    if ($bcc) $header .= "Bcc: ". $bcc ."\r\n";

    $result = mail($mailTo, $subject, $content, $header, $mailFrom);

    if(!$result) {
 ?>

        <script>
                alert('메일전송실패!!! \n 다시 작성하세요');
        </script>

 <?
    } else {
 ?>

        <script>
                alert('메일전송성공!!!');
        </script>

 <?
    }
 ?>

    </head>
    <body></body>
    </html>
