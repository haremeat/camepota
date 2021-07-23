<?
include 'note.php';

$noteId = $_GET['id'];

$sql = "
SELECT *
FROM notes
WHERE id = '{$noteId}'
";
$row = getRow($sql);
?>

<style media="screen">
    .backBtn{
        width: 100px;
        height: 30px;
        background-color: #eeeeee;
        clear:both;
        margin: 0 auto;
        text-align:center;
        line-height:31px;
        font-size:11px;
        font-weight:bold;
        font-family:tahoma;
        cursor: pointer;
        text-decoration: none;
        border: 0;
    }
</style>

<title>쪽지 내용</title>
<table style="margin:15px; margin-top:0; padding:0;">
<tr>
	<td width=110 align=center bgcolor="eeeeee"><b>FROM</b></td>
	<td bgcolor="ffffff" style="padding-left:10; font-weight: bold;"><?=$row['sent_id']?></td>
</tr>
<tr>
	<td align=center bgcolor="eeeeee"><b>TO</b></td>
	<td bgcolor="ffffff" style="padding-left:10; font-weight: bold;"><?=$row['rece_id']?></td>
</tr>
<tr>
	<td align=center bgcolor="eeeeee"><b>제목</b></td>
	<td bgcolor="ffffff" style="padding-left:10; font-weight: bold;"><?=$row['title']?></td>
</tr>
<tr>
	<td align=center bgcolor="eeeeee" style="height:200px; width: 200px;"><b>내용</b></td>
	<td bgcolor="ffffff" style="padding-left:10;"><?=$row['note']?></td>
</tr>
</table>
<center><input type="button" class="backBtn" name="back" value="뒤로가기" onclick="history.back();">
<!--
<div class="content">
    <b>내용</b>
    <center><?=$row['note']?>
</div>-->
