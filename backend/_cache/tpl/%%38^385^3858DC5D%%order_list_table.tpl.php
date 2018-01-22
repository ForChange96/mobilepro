<?php /* Smarty version 2.6.13, created on 2018-01-16 05:44:13
         compiled from order_list_table.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'order_list_table.tpl', 19, false),array('modifier', 'number_format', 'order_list_table.tpl', 34, false),)), $this); ?>
<div id="list">
    <table cellpadding="0" cellspacing="0" style="margin: auto;" >
        <tr class="list_title">
            <td class="key">STT</td>
            <td class="fullname">Tên Khách hàng</td>
            <td class="order_date">Ngày giao hàng</td>
            <td class="fullname">Người giao</td>
            <td class="price">Thành tiền</td>
            <td class="list_cn">Chức năng</td>
        </tr>
        <?php if ($this->_tpl_vars['countrows'] == 0): ?>
            <tr>
                <td colspan="6" style="text-align: center; font-style: italic; color: #999999">Không có dữ liệu để hiển thị</td>
            </tr>
        <?php else: ?>
            <?php $_from = $this->_tpl_vars['listOrder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['order']):
?>
                <tr class="list_data">
                    <td class="key"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td class="fullname"><a href="?mod=order&act=detail&id=<?php echo $this->_tpl_vars['order']['order_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['order']['fullname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a></td>
                    <td class="order_date">
                        <?php if ($_GET['act'] == view2): ?>
                            <?php echo $this->_tpl_vars['order']['o_date']; ?>

                        <?php else: ?>
                            <i style="color: #999999">Chưa giao hàng</i>
                        <?php endif; ?>
                    </td>
                    <td class="order_date">
                        <?php if ($_GET['act'] == view2): ?>
                            <?php echo $this->_tpl_vars['order']['o_shipper']; ?>

                        <?php else: ?>
                            <i style="color: #999999">Chưa giao hàng</i>
                        <?php endif; ?>
                    </td>
                    <td class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['order']['o_total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                    <td class="list_cn">
                        <ul>
                            <li>
                                <a href="?mod=order&act=detail&id=<?php echo $this->_tpl_vars['order']['order_id']; ?>
">
                                    <img src="style/images/icon-16-detail.png" title="Xem chi tiết"/>
                                </a>
                            </li>
                            <?php if ($_GET['act'] == view): ?>
                                <li>
                                    <a onclick="javascript:confirmOrder(<?php echo $this->_tpl_vars['order']['order_id']; ?>
)" href="javascript: void (0);">
                                        <img src="style/images/icon_confirm.png" title="Xác nhận đã giao"/>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a onclick="javascript:deleteOrder(<?php echo $this->_tpl_vars['order']['order_id']; ?>
)" href="javascript: void (0);">
                                    <img src="style/images/icon-16-logout.png" title="Huỷ đơn hàng"/>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        <tr>
            <td class="pagging" colspan="6"><?php echo $this->_tpl_vars['pagels']; ?>
</td>
        </tr>
    </table>
</div><!--End #list-->
<div class="modal fade" id="modal_order_confirm2" role="dialog">
    <div class="modal-dialog" style="width: 450px;">
        <!-- Modal content-->
        <form action="?mod=order&act=confirm" method="post">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Nhập tên người giao hàng</h4>
                    <input type="text" name="shipper" class="form-control">
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="order_id" id="order_id" value="">
                    <input type="submit" class="btn btn-success" value="Xác nhận">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
        <!--End Modal content-->
    </div>
</div>
<div class="clear"></div>