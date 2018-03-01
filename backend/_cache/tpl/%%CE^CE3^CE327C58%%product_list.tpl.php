<?php /* Smarty version 2.6.13, created on 2018-02-23 08:12:23
         compiled from product_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'product_list.tpl', 5, false),array('modifier', 'number_format', 'product_list.tpl', 41, false),)), $this); ?>
<div id="tool_search">
    <form action="?mod=product&act=<?php echo $_GET['act']; ?>
" method="post">
        <div class="btn_search1"></div>
        <div class="btn_search2">
            <input type="text" name="search" class="input_search" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['txt_search'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
        </div>
        <input class="btn_search3" type="submit" name="btnsearch" value=""/>
        <div class="btn_select_menu">
            <a class="btn btn btn-default btn_view" style="color: #444444; <?php if ($_GET['act'] == view): ?>background: #d6e3e2<?php endif; ?>" href="?mod=product&act=view">
                Còn kinh doanh
            </a>&nbsp;
            <a class="btn btn btn-default btn_view" style="color: #444444;<?php if ($_GET['act'] == view2): ?>background: #d6e3e2<?php endif; ?>" href="?mod=product&act=view2">
                Ngừng kinh doanh
            </a>
        </div>
                <div style="float:right;"><?php echo $this->_tpl_vars['totalResult']; ?>
 Kết quả, Hiển thị <b style="color: red"><?php echo $this->_tpl_vars['numRowsDisplay']; ?>
</b></div>
            </form>
    <div class="clear"></div>
</div><!--End #tool_search-->
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;" >
        <tr class="list_title">
            <td class="check"><input type="checkbox" value="checkall" name="checkall" class="checkall" /></td>
            <td class="key">STT</td>
            <td class="productname">Tên sản phẩm</td>
            <td class="manufacturer">Hãng sản xuất</td>
            <td class="price">Giá</td>
            <td class="hotProduct">SP nổi bật</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        <?php $_from = $this->_tpl_vars['listProduct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['product']):
?>
            <tr class="list_data">
                <td class="check">
                    <input type="checkbox" value="<?php echo $this->_tpl_vars['product']['product_id']; ?>
" name="checkone" />
                </td>
                <td class="key"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                <td class="productname"><a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a></td>
                <td class="manufacturer"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['manufacturer'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
                <td class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                <td class="hotProduct">
                    <?php if ($this->_tpl_vars['product']['is_hot_product'] == 1): ?>
                    <img src="style\images\icon-hot.png">
                    <?php endif; ?>
                </td>
                <td class="list_cn">
                    <ul>
                        <li>
                            <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product']['product_id']; ?>
">
                                <img src="style/images/icon-16-detail.png" title="Xem chi tiết"/>
                            </a>
                        </li>
                        <?php if ($_GET['act'] == view2): ?>
                        <li>
                            <a onclick="javascript:restore_product(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)" href="javascript: void (0);">
                                <img src="style/images/icon_restore.png" title="Chuyển sang 'còn kinh doanh'"/>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a onclick="javascript:deleteproduct(<?php echo $this->_tpl_vars['product']['product_id']; ?>
)" href="javascript: void (0);">
                                <img src="style/images/icon-16-logout.png" title="Xóa"/>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td class="pagging" colspan="7"><?php echo $this->_tpl_vars['pagels']; ?>
</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="clear"></div>
