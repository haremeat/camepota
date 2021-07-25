<?php
include 'config.php';

$selectedBoard = null;

if ( isset($_GET['boardId']) ) {
  $selectedBoard = getRow("SELECT * FROM board WHERE id = '{$_GET['boardId']}'");
}

$sql = "
SELECT *
FROM board
";
$boards = getRows($sql);

if ( empty($selectedBoard) ) {
  $selectedBoard = $boards[0];
  $_GET['boardId'] = $selectedBoard['id'];
}

?>
<select name="boardId" style="width:100%;" onchange="location.href = 'add.php?boardId=' + this.value;">
  <? foreach ( $boards as $board ) { ?>
    <?
    $selected = '';

    if ( $board['id'] == $selectedBoard['id'] ) {
      $selected = 'selected';
    }
    ?>
  <option <?=$selected?> value="<?=$board['id']?>"><?=$board['name']?></option>
  <? } ?>
</select>

?>
