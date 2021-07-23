<!-- tab_comment -->
<style media="screen">
.tabs>.labels>label {
width:150px;
background-color: #ddd;
border-radius: 0 1em 0 0;
color: #999;
font-weight:bold;
text-shadow:#aaa -1px -1px;
cursor: pointer;
float: left;
overflow: hidden;
padding: .7em 1.2em;
position: relative;
margin-top: 1em;
border-bottom: .2em solid #45a6e7;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.tabs>.labels>label:hover {
background-color: #ddd;
color: #333;
}
input#tab1:checked ~ .labels>label[for="tab1"],
input#tab2:checked ~ .labels>label[for="tab2"],
input#tab3:checked ~ .labels>label[for="tab3"] {
background-color: #45a6e7;
color: #fff;
}
.tabs>.labels>label a {
color: inherit;
}
.tab_container {
clear: both;
overflow: auto;
width: 100%;
padding: 1em;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.tabs>input[type="radio"], .tabs .tab_content {
display: none;
}
.notAvailable {
border:#f00 solid 1px;
background:#fdd;
padding:1em;
}
input[name="tabs"]:checked ~ .tab_container>.notAvailable {display:none;}
input#tab1:checked ~ .tab_container>#tab1C,
input#tab2:checked ~ .tab_container>#tab2C,
input#tab3:checked ~ .tab_container>#tab3C {
display:block;
}
@media screen and (max-width:480px) {
.tabs>.labels>label {
width: 100%;
margin: 0;
border-radius: 0;
}
.tabs>.labels>label:first-of-type {
margin-top: 1em;
};
}
</style>

<div class="tabs">
  <input type="radio" id="tab1" name="tabs" checked/>
  <input type="radio" id="tab2" name="tabs"/>
  <input type="radio" id="tab3" name="tabs"/>
  <div class="labels">
    <label id="tab1L" for="tab1">티스토리 댓글</label>
    <label id="tab2L" for="tab2" >Disqus</label>
    <label id="tab3L" for="tab3">트랙백</label>
  </div>
  <div class="tab_container">
    <div id="tab1C" class="tab_content">
      댓글
    </div>
    <div id="tab2C" class="tab_content">
      디스커스
    </div>
    <div id="tab3C" class="tab_content">
      트랙백
    </div>
    <div class="notAvailable">현재 브라우저에서는 댓글을 표시할 수 없습니다.<br/> IE9 이상으로 브라우저를 업그레이드하거나, 크롬, 파이어폭스 등 최신 브라우저를 이용해주세요.</div>
  </div>
</div>
