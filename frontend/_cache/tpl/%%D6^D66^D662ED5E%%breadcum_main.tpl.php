<?php /* Smarty version 2.6.13, created on 2018-01-25 09:01:26
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
            <?php elseif ($this->_tpl_vars['mod'] == ""): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view"></a></li>
            <?php elseif ($this->_tpl_vars['mod'] == ""): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view"></a></li>
            <?php elseif ($this->_tpl_vars['mod'] == ""): ?>
                <li><a href="?mod=<?php echo $this->_tpl_vars['mod']; ?>
&act=view"></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>