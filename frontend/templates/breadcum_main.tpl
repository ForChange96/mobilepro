<div class="breadcum_main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="?mod=home&act=view">TRANG CHỦ</a></li>
            {if $mod=="huongdan"}
                <li><a href="?mod={$mod}&act=view">HƯỚNG DẪN</a></li>
            {elseif $mod=="lienhe"}
                <li><a href="?mod={$mod}&act=view">LIÊN HỆ</a></li>
            {elseif $mod=="gioithieu"}
                <li><a href="?mod={$mod}&act=view">GIỚI THIỆU</a></li>
            {elseif $mod=="dangky" && $smarty.get.act=="view"}
                <li><a href="?mod={$mod}&act=view">ĐĂNG KÝ</a></li>
            {elseif $mod=="dangky" && $smarty.get.act=="edit_customer"}
                <li><a href="?mod={$mod}&act=view">TÀI KHOẢN CỦA TÔI</a></li>
            {elseif $mod=="product"}
                <li><a href="?mod={$mod}&act=show_by_category&id=2">SẢN PHẨM</a></li>
                {if $smarty.get.act=="search_product"}
                    <li><a href="?mod={$mod}&act=search_product">TÌM KIẾM</a></li>
                {elseif isset($smarty.get.id) && $smarty.get.id==1 && $smarty.get.act=="show_by_category"}
                    <li><a href="?mod={$mod}&act=show_by_category&id=1">PHỤ KIỆN</a></li>
                {elseif isset($smarty.get.id) && $smarty.get.id==2 && $smarty.get.act=="show_by_category"}
                    <li><a href="?mod={$mod}&act=show_by_category&id=2">ĐIỆN THOẠI</a></li>
                {elseif $smarty.get.act=="detail" && isset($smarty.get.id)}
                    <li><a href="?mod={$mod}&act=detail&id={$smarty.get.id}">{$product_name}</a></li>
                {/if}
            {elseif $mod=="cart"}
                <li><a href="?mod={$mod}&act=view">GIỎ HÀNG</a></li>
                {if $smarty.get.act=="pay"}
                    <li><a href="?mod={$mod}&act=pay">THANH TOÁN</a></li>
                {/if}
            {elseif $mod==""}
                <li><a href="?mod={$mod}&act=view"></a></li>
            {/if}
        </ul>
    </div>
</div>