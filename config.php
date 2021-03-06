<?php
//session_start();
$dbmsHost = '106.10.52.210'; // 또는 127.0.0.1
$dbmsId = 'camepota';
$dbmsPw = 'camepota6787';
$dbName = 'camepota';
$dbport = '3306';

// DB 연결
$link = mysqli_connect($dbmsHost,
$dbmsId, $dbmsPw, $dbName, $dbport ) or die();

// DB 연결을 UTF-8 모드로 설정
mysqli_query($link, "SET NAMES utf8;");

// 사용법 : $rows = getRows("SELECT * FROM article");
function getRows($sql) {
	// 외부에 있는 $link 변수를 함수안에서 사용하겠다는 의미
	global $link;

    // 빈 배열선언
	$rows = array();

	// SELECT * FROM article 쿼리 실행
	$result = mysqli_query($link, $sql);

	if ( $result === true ) {
		return null;
	}

	// 쿼리 결과를 맵으로 받아오기
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function getRow($sql) {
list($row) = getRows($sql);

	return $row;
}

// 사용법 : execute("DELETE FROM article");
function execute($sql) {
	getRows($sql);
}

function isLogined() {
		$isLogined = isset($_SESSION['loginId']);

		return $isLogined;
}

function getArticleRepliesCount($articleId) {
	$articleRepliesCount = 0;

	$sql = "
	SELECT COUNT(*) AS cnt
	FROM articleReply
	WHERE articleId = '{$articleId}'
	";

	$row = getRow($sql);

	$articleRepliesCount = $row['cnt'];

	return $articleRepliesCount;
}

function getRowValue($sql) {
	$row = getRow($sql);

	$value = null;

	foreach ( $row as $key => $val ) {
		$value = $val;

		break;
	}

	return $value;
}

function RemoveXSS($val) { 
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   // this prevents some character re-spacing such as <java\0script>
   // note that you have to handle splits with \n, \r, and \t later since they *are*
   // allowed in some inputs
   $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

   // straight replacements, the user should never need these since they're normal characters
   // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&
   // #X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
   // ;? matches the ;, which is optional
   // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

   // &#x0040 @ search for the hex values
      $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
      // with a ;

      // &#00064 @ 0{0,7} matches '0' zero to seven times
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

   // now the only remaining whitespace attacks are \t, \n, and \r
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style',
'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);

   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
               $pattern .= '|(&#0{0,8}([9][10][13]);?)?';
               $pattern .= ')?';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
}


define('NOW_DATETIME', date('Y-m-d H:i:s'));
define('NOW_TIMESTAMP', strtotime('NOW_DATE'));


//session 타임아웃 설정 ( 30분 )
