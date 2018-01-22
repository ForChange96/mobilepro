<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title>{$page_title}</title>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="style/css/styles.css" title="stylesheet" type="text/css" />
    <script type="text/javascript" src="style/javascript/jquery-1.2.1.js"></script>
    <script type="text/javascript" src="style/javascript/validate_user.js"></script>
</head>
<body>
{if $smarty.session.user.user_username}
<div id="main-content">
    <div id="header">
        <div id="title">Administrator</div>
        <div id="menu">
            <ul>
                <a id="thanh_vien" href="?mod=user&act=view"  ><li {if $mod =='user'}style="background: #0170ae; color: #ffffff"{/if}>Danh sách thành viên</li></a>

                <a id="khach_hang" href="?mod=customer&act=view"><li {if $mod =='customer'}style="background: #0170ae; color: #ffffff"{/if}>Danh sách khách hàng</li></a>
            </ul>
			<span>
				Xin chào: <b style="color: red">{$smarty.session.user.user_username} !</b> <a href="?mod=user&act=logout">Log out</a>
				<div class="clear"></div>
			</span>
        </div><!--End #menu-->
        <div id="toolbar">
            <div id="tit_toolbar">{$page_title}</div>
            <div id="tools">
                {if $smarty.get.act=="view"}
                    <a class="atools" href="?mod={$mod}&act=add"><span class="tool_add"></span>Thêm</a>
                    {if $mod == 'user'}
                        <a id="user_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="user_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'customer'}
                        <a id="customer_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="customer_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'category'}
                        <a id="category_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="category_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'manufacture'}
                        <a id="manufacture_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="manufacture_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'features'}
                        <a id="features_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="features_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {elseif $mod== 'product'}
                        <a id="product_edit" class="atools" href="javascript:void(0)"><span class="tool_edit"></span>Sửa</a>
                        <a id="product_delete" class="atools" href="javascript:void(0)"><span class="tool_delete"></span>Xóa</a>
                    {/if}
                {/if}
            </div><!--End #tools-->
            <div class="clear"></div>
        </div><!--End #tools-->
    </div><!--End #header-->
{/if}