<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('refresh.html').fadeIn("slow");
}, 1000); // 새로고침 시간 1000은 1초를 의미합니다.
</script>
<body>
<div id="load_tweets"> fsfsfsfsfsf</div>
</body>
