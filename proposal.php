<?
include 'session_check.php';
include 'menu.php';
include 'login_check.php';

//건의사항 홈페이지
?>

<style media="screen">
body {
font-family: roboto;
}

@media screen and ( max-width: 767px ){
	div.ej-proposal{
		max-width: 100%;
	}

	table {
		max-width: 100%;
	}
}
</style>

<br><br>
<div class="ej-proposal">
<center>관리자에게 건의할 사항이나 오류 보고가 있으시면 언제든지 의견을 말해주시기 바랍니다.</center>
<br>
<table align="center" bgcolor="666666" width=400 border=0 cellspacing=1 cellpadding=2>
<script>
<!--
function checkForm() {
	var f = document.form;
	if(!f.receiver.value) {
		alert("받는이의 아이디를 입력해 주세요.");
		f.receiver.focus();
		return false;
	}
	if(!f.title.value) {
		alert("제목을 입력해 주세요.");
		f.title.focus();
		return false;
	}
	if(!f.note.value) {
		alert("내용을 입력해 주세요.");
		f.note.focus();
		return false;
	}
	return true;
}
//-->
</script>
<title>건의사항</title>
<form method=post name=form action="note_add_ok.php" onSubmit="return checkForm();">
<input type=hidden name=user value="<?=$login_username?>">
<tr>
	<td width=110 align=center bgcolor="eeeeee"><b>FROM</b></td>
	<td bgcolor="ffffff" style="padding-left:10;"><?=$login_username?></td>
</tr>
<tr>
	<td align=center bgcolor="eeeeee"><b>TO</b></td>
    <? $sql = "
    SELECT *
    FROM user
    WHERE admin = 'Y'
    ";
    $row = getRow($sql);
     ?>
	<td bgcolor="ffffff" style="padding-left:10;"><input type=text name=receiver style="border:0px; background-color:transparent;" value="<?=$row['userName']?>"></td>
</tr>
<tr>
	<td align=center bgcolor="eeeeee"><b>제목</b></td>
	<td bgcolor="ffffff" style="padding-left:10;"><input type=text name=title size=30></td>
</tr>
<tr>
	<td align=center colspan=2 bgcolor=ffffff><textarea name="note" rows="12" cols="70"></textarea></td>
</tr>
<tr>
<td align=center colspan=2 bgcolor=ffffff>
<input type=submit value=보내기> </td>
</tr>
</form>
</div>
</table>
