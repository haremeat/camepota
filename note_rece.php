<?
//받은 쪽지함
include 'note.php';

$sql = "
SELECT *
FROM notes
WHERE rece_id = '$login_username' AND kind1 = '{$_GET['kind']}'
AND hide = 'N'
";
$rows = getRows($sql);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<table align="center" border=0 cellspacing=0 cellpadding=0>
<tr>
	<td align=center style="font-size:12pt;"><b><?=$login_username?>(<?=$login_id?>)님의 받은 쪽지 목록</b></td>
</tr>
</table>
<br>

<script>
function deleteNote(noteId) {
  $.post(
    'perform_note.php',
    {
      id : noteId
    },
      function(data) {
        $('.note-' + data.id).hide();
        alert(data.msg);
      },
      'json'
  );
}
</script>

<table align="center" bgcolor="666666" width=550 border=1 cellspacing=1 cellpadding=4>
	<tr bgcolor=eeeeee align=center>
		<td width=50><b>번호</b></td>
		<td><b>제목</b></td>
		<td width=80><b>보낸 이</b></td>
		<td width=80><b>받은 날짜</b></td>
		<td width=50><b>삭제</b></td>
	</tr>

<? //쪽지 출력 ?>
<?php foreach ($rows as $row): ?>
<tr class="note-<?=$row['id']?>" bgcolor=FFFFFF>
		<td align=center><?=$row['id']?></td>
		<td class="subject" style="text-align:center;"><a href="note_detail.php?id=<?=$row['id']?>"><?=$row['title']?></a></td>
		<td align=center><?=$row['sent_id']?></td>
		<td align=center><?=$row['regDate']?></td>
		<td align=center><a href="#" onClick="if(!confirm('정말 삭제 하시겠습니까?')) return false; deleteNote(<?=$row['id']?>);">삭제</a></td>
</tr>
<?php endforeach; ?>
</table>
<br>
<table align="center" width=550 border=0 cellspacing=0 cellpadding=0>
	<tr>
		<td align=center></td>
	</tr>
</table>
