<div class="breadcum_main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="trang-chu">TRANG CHỦ</a></li>
            {if $mod=="huongdan"}
                <li><a href="huong-dan">HƯỚNG DẪN</a></li>
            {elseif $mod=="lienhe"}
                <li><a href="lien-he">LIÊN HỆ</a></li>
            {elseif $mod=="gioithieu"}
                <li><a href="gioi-thieu">GIỚI THIỆU</a></li>
            {elseif $mod=="dangky" && $smarty.get.act=="view"}
                <li><a href="dang-ky">ĐĂNG KÝ</a></li>
            {elseif $mod=="dangky" && $smarty.get.act=="edit_customer"}
                <li><a href="tai-khoan-cua-toi">TÀI KHOẢN CỦA TÔI</a></li>
            {elseif $mod=="product"}
                {if $smarty.get.act=="search_product"}
                    <li><a href="">TÌM KIẾM</a></li>
                {elseif isset($smarty.get.id) && $smarty.get.id==1 && $smarty.get.act=="show_by_category"}
                    <li><a href="">PHỤ KIỆN</a></li>
                {elseif isset($smarty.get.id) && $smarty.get.id==2 && $smarty.get.act=="show_by_category"}
                    <li><a href="">ĐIỆN THOẠI</a></li>
                {elseif $smarty.get.act=="detail" && isset($smarty.get.id)}
                    <li><a href="">{$product_name}</a></li>
                {/if}
            {elseif $mod=="cart"}
                <li><a href="gio-hang">GIỎ HÀNG</a></li>
                {if $smarty.get.act=="pay"}
                    <li><a href="">THANH TOÁN</a></li>
                {/if}
            {/if}
        </ul>
    </div>
</div>