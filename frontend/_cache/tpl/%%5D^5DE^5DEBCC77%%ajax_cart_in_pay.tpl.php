<?php /* Smarty version 2.6.13, created on 2018-02-19 15:21:54
         compiled from ajax_cart_in_pay.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_cart_in_pay.tpl', 27, false),)), $this); ?>
<?php $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_id'] => $this->_tpl_vars['product']):
?>
    <tr>
        <td class="qc-image text-center">
            <a  href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product_id']; ?>
=<?php echo $this->_tpl_vars['p_name_remove_unicode']; ?>
">
                <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" width="50"/>
            </a>
        </td>
        <td class="qc-name text-center">
            <a href="chi-tiet-san-pham-<?php echo $this->_tpl_vars['product_id']; ?>
=<?php echo $this->_tpl_vars['p_name_remove_unicode']; ?>
" >
                <?php echo $this->_tpl_vars['product']['p_name']; ?>

            </a>
        </td>
        <td class="qc-quantity text-center"  style="width: 20%">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-defaut" onclick="number_down(<?php echo $this->_tpl_vars['product_id']; ?>
)">
                        <i class="fa fa-minus"></i>
                    </button>
                </span>
                <input type="text" value="<?php echo $this->_tpl_vars['product']['number']; ?>
" id="cart_number_product<?php echo $this->_tpl_vars['product_id']; ?>
" onchange="number_in_pay(<?php echo $this->_tpl_vars['product_id']; ?>
)" class="form-control text-center"/>
                <span class="input-group-btn">
                    <button class="btn btn-defaut" onclick="number_up(<?php echo $this->_tpl_vars['product_id']; ?>
)">
                        <i class="fa fa-plus"></i>
                </span>
            </div>
        </td>
        <td class="qc-price text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price']*$this->_tpl_vars['product']['number'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
        <td class="qc-total text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price']*$this->_tpl_vars['product']['number']*110/100)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>