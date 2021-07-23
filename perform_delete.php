<?php
include 'session_check.php';

$boardId = $_GET['name'];

$sql = "
DELETE FROM article
WHERE id = '{$_GET['id']}'
";
execute($sql);

$link = "list.php?name=$boardId";
?>
<script>
alert('게시글이 삭제되었습니다.');
location.replace('<?=$link?>');
</script>
