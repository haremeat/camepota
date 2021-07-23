<?
//보낸 쪽지함
include 'note.php';

/*$sql = "
SELECT *
FROM notes
";
$rows = getRows($sql);
*/
//보낸 사람이 현재 로그인한 사람이면서 종류가 sent일때
$sql = "
SELECT *
FROM notes
WHERE sent_id = '$login_username' AND kind2 = '{$_GET['kind']}'
AND hide = 'N'
";
$rows = getRows($sql);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
	.subject {
		text-align: center;
	}
</style>

<table align="center" border=0 cellspacing=0 cellpadding=0>
<tr>
	<td align=center style="font-size:12pt;"><b><?=$login_username?>(<?=$login_id?>)님의 보낸 쪽지 목록</b></td>
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
		<td width=80><b>받는 이</b></td>
		<td width=80><b>보낸 날짜</b></td>
		<td width=50><b>삭제</b></td>
	</tr>

<? //쪽지 출력 ?>
<?php foreach ($rows as $row ): ?>
<tr class="note-<?=$row['id']?>" bgcolor=FFFFFF>
		<td align=center><?=$row['id']?></td>
		<td class="subject"><a href="note_detail.php?id=<?=$row['id']?>"><?=$row['title']?></a></td>
		<td align=center><?=$row['rece_id']?></td>
		<td align=center><?=$row['regDate']?></td>
		<td align=center><a href="" onClick="if(!confirm('정말 삭제 하시겠습니까?')) return false; deleteNote(<?=$row['id']?>);">삭제</a></td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<table align="center" width=550 border=0 cellspacing=0 cellpadding=0>
	<tr>
		<td align=center></td>
	</tr>
</table>
