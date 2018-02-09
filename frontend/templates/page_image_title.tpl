<div class="page_image_title">
    <h3>
        {if $mod=="huongdan"}
            HƯỚNG DẪN MUA HÀNG
        {elseif $mod=="lienhe"}
            LIÊN HỆ VỚI CHÚNG TÔI
        {elseif $mod=="gioithieu"}
            GIỚI THIỆU
        {elseif $mod=="dangky" && $smarty.get.act=="view"}
            ĐĂNG KÝ
        {elseif $mod=="dangky" && $smarty.get.act=="edit_customer"}
            SỬA THÔNG TIN TÀI KHOẢN
        {elseif $mod=="product"}
            {if $smarty.get.act=="search_product"}
                TÌM KIẾM
            {elseif isset($smarty.get.id) && $smarty.get.id==1 && $smarty.get.act=="show_by_category"}
                PHỤ KIỆN
            {elseif isset($smarty.get.id) && $smarty.get.id==2 && $smarty.get.act=="show_by_category"}
                ĐIỆN THOẠI
            {elseif $smarty.get.act=="detail" && isset($smarty.get.id)}
                {$product_name}
            {/if}
        {elseif $mod=="cart"}
            {if $smarty.get.act=="pay"}
                THANH TOÁN
            {elseif $smarty.get.act=="view"}
                XEM GIỎ HÀNG
            {/if}
        {elseif $mod==""}

        {/if}
    </h3>
</div>