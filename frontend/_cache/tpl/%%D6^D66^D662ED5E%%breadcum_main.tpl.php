<?php /* Smarty version 2.6.13, created on 2018-02-27 11:14:31
         compiled from breadcum_main.tpl */ ?>
<div class="breadcum_main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="trang-chu">TRANG CHỦ</a></li>
            <?php if ($this->_tpl_vars['mod'] == 'huongdan'): ?>
                <li><a href="huong-dan">HƯỚNG DẪN</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'lienhe'): ?>
                <li><a href="lien-he">LIÊN HỆ</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'gioithieu'): ?>
                <li><a href="gioi-thieu">GIỚI THIỆU</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'dangky' && $_GET['act'] == 'view'): ?>
                <li><a href="dang-ky">ĐĂNG KÝ</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'dangky' && $_GET['act'] == 'edit_customer'): ?>
                <li><a href="tai-khoan-cua-toi">TÀI KHOẢN CỦA TÔI</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'product'): ?>
                <?php if ($_GET['act'] == 'search_product'): ?>
                    <li><a href="">TÌM KIẾM</a></li>
                <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 1 && $_GET['act'] == 'show_by_category'): ?>
                    <li><a href="">PHỤ KIỆN</a></li>
                <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 2 && $_GET['act'] == 'show_by_category'): ?>
                    <li><a href="">ĐIỆN THOẠI</a></li>
                <?php elseif ($_GET['act'] == 'detail' && isset ( $_GET['id'] )): ?>
                    <li><a href=""><?php echo $this->_tpl_vars['product_name']; ?>
</a></li>
                <?php endif; ?>
            <?php elseif ($this->_tpl_vars['mod'] == 'cart'): ?>
                <li><a href="gio-hang">GIỎ HÀNG</a></li>
                <?php if ($_GET['act'] == 'pay'): ?>
                    <li><a href="">THANH TOÁN</a></li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>