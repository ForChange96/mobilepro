<?php /* Smarty version 2.6.13, created on 2018-02-02 03:56:01
         compiled from page_image_title.tpl */ ?>
<div class="page_image_title">
    <h3>
        <?php if ($this->_tpl_vars['mod'] == 'huongdan'): ?>
            HƯỚNG DẪN MUA HÀNG
        <?php elseif ($this->_tpl_vars['mod'] == 'lienhe'): ?>
            LIÊN HỆ VỚI CHÚNG TÔI
        <?php elseif ($this->_tpl_vars['mod'] == 'gioithieu'): ?>
            GIỚI THIỆU
        <?php elseif ($this->_tpl_vars['mod'] == 'dangky'): ?>
            ĐĂNG KÝ
        <?php elseif ($this->_tpl_vars['mod'] == 'product'): ?>
            <?php if ($_GET['act'] == 'search_product'): ?>
                TÌM KIẾM
            <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 1 && $_GET['act'] == 'show_by_category'): ?>
                PHỤ KIỆN
            <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 2 && $_GET['act'] == 'show_by_category'): ?>
                ĐIỆN THOẠI
            <?php elseif ($_GET['act'] == 'detail' && isset ( $_GET['id'] )): ?>
                <?php echo $this->_tpl_vars['product_name']; ?>

            <?php endif; ?>
        <?php elseif ($this->_tpl_vars['mod'] == 'cart'): ?>
            <?php if ($_GET['act'] == 'pay'): ?>
                THANH TOÁN
            <?php elseif ($_GET['act'] == 'view'): ?>
                XEM GIỎ HÀNG
            <?php endif; ?>
        <?php elseif ($this->_tpl_vars['mod'] == ""): ?>

        <?php endif; ?>
    </h3>
</div>