<?
include 'session_check.php';
include 'note_login_check.php';
?>

<html>
<head>
	<title>쪽지함</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<style type="text/css">

body {border:0;};
body, table, tr, td {font-size:10tp;};

a:link, a:visited, a:active {font-size:10pt;color:#47a3da;text-decoration:none;};
a:hover {font-size:10pt;color:#999999;text-decoration:none;};

a.subject:link, a.subject:visited, a.subject:active {font-size:10pt;color:#555555;text-decoration:none;};
a.subject:hover {font-size:10pt;color:#444444;text-decoration:underline;};

a.menu:link, a.menu:visited, a.menu:active {font-size:10pt;color:#FFFFFF;text-decoration:none;};
a.menu:hover {font-size:10pt;color:#47a3da;text-decoration:none;};
</style>
<title><?=$title?></title>
</head>
<body leftmargin=0 rightmargin=0 topmargin=0 bottommargin=0>
<table align="center" width=100% height=100% border=0 cellspacing=0 cellpadding=0>
	<tr>
		<td height=30>
			<table align="center" width=100% height=30 border=0 cellspacing=0 cellpadding=0>
				<tr bgcolor="#47a3da">
					<td style="padding-left:10;color:#FFFFFF;"><b>쪽지함</b></td>
					<td align=right style="padding-right:10;color:#FFFFFF;">
						<a href="note_rece.php?kind=rece" class="menu">받은쪽지함</a> |
						<a href="note_sent.php?kind=sent" class="menu">보낸쪽지함</a> |
						<a href="note_add.php" class="menu">쪽지쓰기</a>
					</td>
				</tr>
			</table>
			<br><br>
		</td>
	</tr>
	<tr>
		<td valign=top>
