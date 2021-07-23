<?
//include 'session_check.php';
//아이디를 누르면 자동으로 나오는 메뉴
?>

<div id="overlay"></div>
<div id="context-menu">
  <ul>
    <li><a href="#">쪽지보내기</a></li>
    <li><a href="#">프로필보기</a></li>
  </ul>
</div>

<span class="user-nickname" data-user-id="1">닉네임</span>

<style>
body, div, ul, li {
  padding:0;
  margin:0;
  box-sizing:border-box;
  list-style:none;
}

#context-menu {
  width:200px;
  position:absolute;
  display:none;
  z-index:3px;
}

#context-menu a {
  color:black;
  text-decoration:none;
  display:block;
  padding:10px;
}

#context-menu li {
  border:2px solid gold;
  background-color:gray;
}

#overlay {
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:black;
  opacity:0.3;
  z-index:2px;
  display:none;
}
</style>

<script>
var isContextMenuHidden = true;

function showContextMenu(x, y, userId) {
  isContextMenuHidden = true;

  $('#overlay').show();

  $('#context-menu')
  .css('left', x)
  .css('top', y)
  .show();
}

function hideContextMenu() {
  $('#context-menu')
  .hide();

  $('#overlay').hide();
}

$(function() {
  $('.user-nickname').click(function(e) {
    showContextMenu(e.pageX, e.pageY, $(this).data('id'));
  });

  $('#overlay').click(function() {
    hideContextMenu();
  })

  $(window).keydown(function(e) {
    if ( e.keyCode == 27 ) {
      hideContextMenu();
    }
  })
});
</script>
