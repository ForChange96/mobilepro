<?php /* Smarty version 2.6.13, created on 2018-02-21 02:50:26
         compiled from ajax_cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_cart.tpl', 31, false),)), $this); ?>
<table class="table table-bordered">
    <tr>
        <td class="text-center">Hình ảnh</td>
        <td class="text-center">Tên sản phẩm</td>
        <td class="text-center">Hãng sản xuất</td>
        <td class="text-center">Số lượng</td>
        <td class="text-center">Đơn Giá</td>
        <td class="text-center">Tổng cộng</td>
    </tr>
    <tbody id="list_product_from_cart">
    <?php $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_id'] => $this->_tpl_vars['product']):
?>
        <tr>
            <td class="text-center">
                <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product_id']; ?>
=<?php echo $this->_tpl_vars['p_name_remove_unicode']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="70px;" />
                </a>
            </td>
            <td class="text-center" style="line-height: 70px;">
                <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product_id']; ?>
=<?php echo $this->_tpl_vars['p_name_remove_unicode']; ?>
"><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
            </td>
            <td class="text-center" style="line-height: 70px;"><?php echo $this->_tpl_vars['product']['manufacturer']; ?>
</td>
            <td class="text-center" style="padding-top: 30px">
                <div class="input-group btn-block" style="max-width: 200px;">
                    <input type="text" name="" value="<?php echo $this->_tpl_vars['product']['number']; ?>
" size="1" id="input_number<?php echo $this->_tpl_vars['product_id']; ?>
" class="form-control input_number" />
                    <span class="input-group-btn">
                        <button type="button" data-toggle="tooltip" title="Cập nhật" class="btn btn-primary" onclick="update_number(<?php echo $this->_tpl_vars['product_id']; ?>
)"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="Loại bỏ" class="btn btn-danger" onclick="remove_from_cart2(<?php echo $this->_tpl_vars['product_id']; ?>
)"><i class="fa fa-times-circle"></i></button>
                    </span>
                </div>
            </td>
            <td class="text-center" style="line-height: 70px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price']*$this->_tpl_vars['product']['number'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
            <td class="text-center" style="line-height: 70px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price']*$this->_tpl_vars['product']['number']*110/100)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>