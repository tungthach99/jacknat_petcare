<script>
function dongform(id)
{
	document.getElementById(id).style.display="none";
	<?php 	$_SESSION["kiemtra"]=0; ?>
}
</script>
<div id="che-man-hinh">
<div class="mess" id="mess-sua">
	<h1>Thông báo</h1>
	<p>Bạn đã thêm feedback thành công</p>
	<a style="color: #fff; border-radius: 5px; float: right;" onClick="dongform('che-man-hinh');" class="linkXanh" cursor="pointer">Đã hiểu</a>
</div>
</div>