<?php
	include 'session_check.php';
	include 'menu.php';

  $sql = "
  WHERE 1
  ";

	if ( !isset($_GET['field']) ) {
		$_GET['field'] = '';
	}

	if ( empty($_GET['field']) ) {
		$_GET['field'] = 'title';
	}

	if ( !isset($_GET['keyword']) ) {
		$_GET['keyword'] = '';
	}

	$_GET['keyword'] = trim($_GET['keyword']);

	if ( $_GET['keyword'] ) {
		if ( $_GET['field'] == 'title' ) {
			$sql .= "
			AND title LIKE '%{$_GET['keyword']}%'
			";
		}

		if ( $_GET['field'] == 'userName' ) {
			$sql .= "
			AND userId LIKE '%{$_GET['keyword']}%'
			";
		}

		if ( $_GET['field'] == 'body' ) {
			$sql .="
			AND content LIKE '%{$_GET['keyword']}%'
			";
		}
	}

	$where_sql = $sql;

	$selectedBoard = null;

	if ( isset($_GET['name']) ) {
	  $selectedBoard = getRow("SELECT * FROM board WHERE typeCode = '{$_GET['name']}'");
	}


	$sql = "
	SELECT *
	FROM board
	";
	$boards = getRows($sql);

	if ( empty($selectedBoard) ) {
	  $selectedBoard = $boards[0];
	  $_GET['name'] = $selectedBoard['typeCode'];
	}

	$where_sql .= "
	AND boardId = '{$selectedBoard['typeCode']}'
	";

	$LIST_SIZE = 6;
	$MORE_PAGE = 3;

	$boardName = $_GET['name'];

	if ( isset($_GET['page']) == false ) {
		$_GET['page'] = 1;
	}

	$page = $_GET['page'] ? intval($_GET['page']) : 1;
	$sql = "SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM article {$where_sql}";
	$page_count = getRowValue($sql);

	$start_page = max($page - $MORE_PAGE, 1);
	$end_page = min($page + $MORE_PAGE, $page_count);
	$prev_page = max($start_page - $MORE_PAGE - 1, 1);
	$next_page = min($end_page + $MORE_PAGE + 1, $page_count);

	$offset = ( $page - 1 ) * $LIST_SIZE;
	$sql = "SELECT * FROM article " . $where_sql . " ORDER BY id DESC LIMIT $offset, $LIST_SIZE";
	$pagerows = getRows($sql);
?>

<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/normalize1.css" />
	<link rel="stylesheet" href="./css/board.css" />
	<link rel="stylesheet" href="./css/user.css" />
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript">
	</script>

	<style>
	body {
		color: #47a3da;
	}

	.ellipsis {
		white-space:nowrap;
	   text-overflow:ellipsis;     /* IE, Safari */
	   -o-text-overflow:ellipsis;      /* Opera under 10.7 */
	   overflow:hidden;            /* "overflow" value must be different from "visible" */
	   -moz-binding: url('ellipsis.xml#ellipsis');
	}

	.admin-nick{
		font-weight: bold;
	}
	</style>
</head>
<body>
	<div id="jb-container">
	<article class="boardArticle">
			<h3><?=$selectedBoard['name']?></h3>
		<div id="jb-content">
		<table style="table-layout:fixed;">
				<tr>
					<th scope="col" class="no">번호</th>
					<th scope="col" class="title">제목</th>
					<th scope="col" class="author">작성자</th>
					<th scope="col" class="date">작성일</th>
					<th scope="col" class="hit">조회수</th>
					<th scope="col" class="hit">댓글수</th>
					<th scope="col" class="hit">추천수</th>
				</tr>
		</div>
				<!--user 메뉴-->
				<div id="overlay"></div>
				<div id="context-menu">
				  <ul>
					<li class="note"><a href="#" data-user-id="" onclick=popup1($(this).data('user-id'));>쪽지보내기</a></li>
					<li class="note"><a href="#" data-user-id="" onclick=profile($(this).data('user-id'));>프로필보기</a></li>
				  </ul>
			  </div>

			  <div class="jb-content1">
			<?php foreach ( $pagerows as $row ) { ?>
				<tr>
					<td class="no"><?=$row['id']?></td>
					<td class="title"><a href="detail.php?name=<?=$_GET['name']?>&id=<?=$row['id']?>"><?=$row['title']?>&nbsp;[<?=getArticleRepliesCount($row['id'])?>]</a></td>
					<script>
					function popup1(id){
					window.open('note_add.php?id=' + id, 'popup', 'width=500, height=250, left=100, top=50, location=no, toolbar=no, resizable=no, scrollbars=yes');
					}

					function profile(id){
					window.open('user2_profile.php?id=' + id, 'popup', 'width=500, height=400, left=100, top=50, location=no, toolbar=no, resizable=no, scrollbars=yes');
									}
					</script>
					<td class="author"><span class="<?if ( $row['loginId'] == 'admin' ) echo 'admin-nick'; else echo 'user-nickname'; ?>" data-user-id="<?=$row['id']?>"><?=$row['userId']?></span></td>
					<!--<td class="dddd"><a onclick="dddd(<?=$row['id']?>)">-->
					<td class="date"><?=$row['regDate']?></td>
          			<td class="hit"><?=$row['viewCnt']?></td>
					<td class="hit"><?=getArticleRepliesCount($row['id'])?></td>
					<td class="hit"><?=$row['recommend']?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
		<center><div class="paging_area">
			<?php if ($start_page > 1 ): ?>
				<a class="move_btn" href="list.php?name=<?=$boardName?>&page=<?=$prev_page?>">« 이전</a>
				<a class='pagenum' href="list.php?name=<?=$boardName?>&page=1">1</a> ...
				<?php else: ?>
				<span class='move_btn disabled'>« 이전</span>
				<?php endif ?>

				<?php for( $p = $start_page; $p <= $end_page; $p++ ): ?>
	<a class='pagenum <?= ( $p == $page )?"current":"" ?>' href="list.php?name=<?=$boardName?>&page=<?=$p?>">
		<?= $p ?>
	</a>
	<?php endfor ?>

	<?php if( $end_page < $page_count ): ?>
	... <a class='pagenum' href="list.php?name=<?=$boardName?>&page=<?=$page_count?>"><?= $page_count ?></a>
	<a class='move_btn' href="list.php?name=<?=$boardName?>&page=<?=$next_page?>">다음 »</a>
	<?php else: ?>
	<span class='move_btn disabled'>다음 »</span>
	<?php endif ?>
		</div>
		<div class="jb-footer">
	<center><a href="add.php?name=<?=$_GET['name']?>"><input class="y-add" type="button" value="글쓰기"></a>
	</article>
	<br>
	<center><form name="search" method="get" action="<?=$_SERVER['PHP_SELF']?>">
		<input type="hidden" name="name" value="<?=$_GET['name']?>">
		<select name="field">
			<option value="title">제 목</option>
			<option value="body">내 용</option>
			<option value="userName">작성자</option>
		</select>
		<script>
		$('select[name=field]').val('<?=$_GET['field']?>');
		</script>
		<input type="text" name="keyword" size="20" value="<?=$_GET['keyword']?>">
		<input type="submit" value="검색">
		</form>
	</div>
</div>
	<script>
	var isContextMenuHidden = true;

	function showContextMenu(x, y, userId) {
	  isContextMenuHidden = true;

	  $('#overlay').show();

	  $('#context-menu')
	  .css('left', x)
	  .css('top', y)
	  .show();

	  $('#context-menu .note > a').data('user-id', userId);
	}

	function hideContextMenu() {
	  $('#context-menu')
	  .hide();

	  $('#overlay').hide();
	}

	$(function() {
	  $('.user-nickname').click(function(e) {
	    showContextMenu(e.pageX, e.pageY, $(this).data('user-id'));
	  });

	  $('#overlay').click(function() {
	    hideContextMenu();
	  })

	  $('.note').click(function() {
		hideContextMenu();
	  })

	  $(window).keydown(function(e) {
	    if ( e.keyCode == 27 ) {
	      hideContextMenu();
	    }
	  })
	});
	</script>
</body>
</html>
