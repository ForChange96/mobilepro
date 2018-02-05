<?php /* Smarty version 2.6.13, created on 2018-02-01 16:36:01
         compiled from breadcum_main.tpl */ ?>
<div class="breadcum_main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="?mod=home&act=view">TRANG CHỦ</a></li>
            <?php if ($this->_tpl_vars['mod'] == 'huongdan'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view">HƯỚNG DẪN</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'lienhe'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view">LIÊN HỆ</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'gioithieu'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view">GIỚI THIỆU</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'dangky'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view">ĐĂNG KÝ</a></li>
            <?php elseif ($this->_tpl_vars['mod'] == 'product'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=show_by_category&id=2">SẢN PHẨM</a></li>
                <?php if ($_GET['act'] == 'search_product'): ?>
                    <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=search_product">TÌM KIẾM</a></li>
                <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 1 && $_GET['act'] == 'show_by_category'): ?>
                    <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=show_by_category&id=1">PHỤ KIỆN</a></li>
                <?php elseif (isset ( $_GET['id'] ) && $_GET['id'] == 2 && $_GET['act'] == 'show_by_category'): ?>
                    <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=show_by_category&id=2">ĐIỆN THOẠI</a></li>
                <?php elseif ($_GET['act'] == 'detail' && isset ( $_GET['id'] )): ?>
                    <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=detail&id=<?php echo $_GET['id']; ?>
"><?php echo $this->_tpl_vars['product_name']; ?>
</a></li>
                <?php endif; ?>
            <?php elseif ($this->_tpl_vars['mod'] == 'cart'): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view">GIỎ HÀNG</a></li>
                <?php if ($_GET['act'] == 'pay'): ?>
                    <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=pay">THANH TOÁN</a></li>
                <?php endif; ?>
            <?php elseif ($this->_tpl_vars['mod'] == ""): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view"></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>