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
            {elseif $mod=="dangky"}
                <li><a href="?mod={$mod}&act=view">ĐĂNG KÝ</a></li>
            {elseif $mod==""}
                <li><a href="?mod={$mod}&act=view"></a></li>
            {elseif $mod==""}
                <li><a href="?mod={$mod}&act=view"></a></li>
            {elseif $mod==""}
                <li><a href="?mod={$mod}&act=view"></a></li>
            {/if}
        </ul>
    </div>
</div>