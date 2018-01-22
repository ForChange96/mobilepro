<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>{$page_title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="style/css/styles.css" title="stylesheet" type="text/css" />
<link rel="stylesheet" href="style/css/bootstrap.min.css" title="stylesheet" type="text/css"/>
<script type="text/javascript" src="style/javascript/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="style/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="style/javascript/validate_user.js"></script>
<script type="text/javascript" src="style/javascript/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="style/javascript/tinymce/init-tinymce.js"></script>
</head>
<body>
{if $smarty.session.user.username}
<div id="main-content">
	<div id="header">
		<div id="title">Administrator</div>
		<div id="menu">
			<div id="menu-float-left">
				<ul class="nav nav-pills">
					<li {if $mod =='user'}class="active"{/if}><a href="?mod=user&act=view">Thành viên</a></li>
					<li {if $mod =='customer'}class="active"{/if}><a href="?mod=customer&act=view">Khách hàng</a></li>
					<li {if $mod =='category'}class="active"{/if}><a href="?mod=category&act=view">Danh mục SP</a></li>
					<li {if $mod =='product'}class="active"{/if}><a href="?mod=product&act=view">Sản phẩm</a></li>
					<li {if $mod =='manufacturer'}class="active"{/if}><a href="?mod=manufacturer&act=view">Hãng SX</a></li>
					<li {if $mod =='order'}class="active"{/if}><a href="?mod=order&act=view">Đơn đặt hàng</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Khác <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?mod=report&act=view">Phản hồi</a></li>
							<li><a href="?mod=contact&act=view">Liên hệ</a></li>
							<li><a href="?mod=support&act=view">Hỗ trợ</a></li>
							<li><a href="?mod=features&act=view">Tính năng nổi bật</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div  id="menu-float-right">
			<span>
				Xin chào: <b style="color: red">{$smarty.session.user.username} !</b> <a href="?mod=user&act=logout">Log out</a>
				<div class="clear"></div>
			</span>
			</div>
		</div><!--End #menu-->
		<div id="toolbar">
			<div id="tit_toolbar">{$page_title}</div>
			<div id="tools">
                {if ($smarty.get.act=="view"||$smarty.get.act=="view2") && $mod!="order"}
					{if $mod!="report"}
				    	<a class="atools" href="?mod={$mod}&act=add"><span class="tool_add"></span>Thêm</a>
					{/if}
                    {if $mod == 'user'}
				        <a id="user_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="user_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'customer'}
                        <a id="customer_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="customer_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'category'}
						<a id="category_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="category_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'manufacturer'}
						<a id="manufacture_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="manufacture_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'features'}
						<a id="features_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="features_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'product'}
						<a id="product_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="product_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'report'}
						<a id="report_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'contact'}
						<a id="contact_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="contact_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'support'}
						<a id="support_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
						<a id="support_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {/if}
                {/if}
                {if $smarty.get.act=="detail" || $smarty.get.act=="edit" || $smarty.get.act=="add"}
					<a href="#"><span style="margin-top: 10px" class="tool_back" onclick="goBack()" title="Quay lại"></span></a>
				{/if}
			</div><!--End #tools-->
			<div class="clear"></div>
		</div><!--End #tools-->
	</div><!--End #header-->
{/if}
	<div id="content">
    {$tmp_module}
    </div><!--End #content-->
{if $smarty.session.user.username}
    <div id="footer">

    </div><!--End #footer-->
	<div style="height: 20px;"></div>
</div><!--End #main_content-->
{/if}
</body>
</html>