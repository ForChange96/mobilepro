<?php /* Smarty version 2.6.13, created on 2018-02-06 04:28:09
         compiled from order_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'order_detail.tpl', 18, false),)), $this); ?>
<div style="margin: 20px 0px">
    <h4 style="text-align: center; font-weight: bold">Chi tiết hoá đơn</h4>
    <h5 style="margin-left: 100px"><b>Tên khách hàng: </b><i><?php echo $this->_tpl_vars['customer_name']; ?>
</i></h5>
    <div class="table-responsive">
        <table class="table" style="width:80%;margin: auto; text-align: center">
            <tr>
                <td style="width: 100px"><b>STT</b></td>
                <td class="productname"><b>Tên hàng</b></td>
                <td class="diachi"><b>Số lượng</b></td>
                <td class="price"><b>Đơn giá</b></td>
                <td class="price"><b>Thành tiền</b></td>
            </tr>
            <?php $_from = $this->_tpl_vars['list_product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['row']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td class="productname"><?php echo $this->_tpl_vars['row']['product_name']; ?>
</td>
                    <td class="diachi"><?php echo $this->_tpl_vars['row']['number']; ?>
</td>
                    <td class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                    <td class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['total_row'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
            <tr>
                <td colspan="5" style="color: #ff4a52">Tổng cộng: <?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
            </tr>
            <tr>
                <td colspan="5">
                    <?php if ($this->_tpl_vars['status'] == 0): ?>
                        <span class="btn btn-default" id="btn_order_confirm">Xác nhận đã giao hàng</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="modal_order_confirm" role="dialog">
            <div class="modal-dialog" style="width: 450px;">
                <!-- Modal content-->
                <form action="?mod=order&act=confirm" method="post">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4>Nhập tên người giao hàng</h4>
                            <input type="text" name="shipper" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="order_id" value="<?php echo $this->_tpl_vars['order_id']; ?>
">
                            <input type="submit" class="btn btn-success" value="Xác nhận">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                <!--End Modal content-->
            </div>
        </div>
        <!-- End Modal -->
    </div>
</div>