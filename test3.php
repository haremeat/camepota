<script>
//사진이미지 미리 보여주기
function img_view(img_name)
{
if(event.srcElement.value.match(/(.jpg|.gif|.JPG|.GIF)/))
{ 
eval("document.all." + img_name + "_t" + ".style.display = 'none';")
document.images[img_name].src = event.srcElement.value;
document.images[img_name].style.display = 'block';
}
else
{
document.images[img_view_name].style.display = 'none';
}
}
</script>

<div id=img_show1_t Style="display:block">이미지</div>
<img src='' id='img_show1' style='display:none;' border="0">
<input type="file" name="u_file[]" onchange='img_view("img_show1");'>
