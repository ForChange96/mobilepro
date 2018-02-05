<?php /* Smarty version 2.6.13, created on 2018-02-01 03:01:12
         compiled from ajax_cart_in_home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_cart_in_home.tpl', 16, false),)), $this); ?>
    <?php if (isset ( $_SESSION['cart'] ) && ! empty ( $_SESSION['cart'] )): ?>
        <li class="table-responsive">
            <table class="table" style="width: 400px">
                <tbody>
                <?php $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_id'] => $this->_tpl_vars['product']):
?>
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="100">
                            </a>
                        </td>
                        <td class="text-left" style="padding-top: 30px;">
                            <a href=""><?php echo $this->_tpl_vars['product']['p_name']; ?>
</a>
                        </td>
                        <td class="text-right" style="padding-top: 30px;">x <?php echo $this->_tpl_vars['product']['number']; ?>
</td>
                        <td class="text-right" style="padding-top: 30px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['p_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                        <td class="text-center" style="padding-top: 30px;">
                            <button type="button" onclick="remove_from_cart(<?php echo $this->_tpl_vars['product_id']; ?>
)" title="Loại bỏ" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </li>
        <li>
            <div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Thành tiền</strong></td>
                        <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Sản phẩm tính thuế</strong></td>
                        <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Tổng cộng </strong></td>
                        <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']+$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-right">
                    <a href=""><strong><i class="fa fa-shopping-cart"></i> Xem Giỏ Hàng</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><strong><i class="fa fa-share"></i> Thanh Toán</strong></a>
                </p>
            </div>
        </li>
    <?php else: ?>
        <li class="text-center">Giỏ hàng trống</li>
    <?php endif; ?>