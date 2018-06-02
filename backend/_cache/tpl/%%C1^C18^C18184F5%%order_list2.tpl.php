<?php /* Smarty version 2.6.13, created on 2018-04-12 11:19:19
         compiled from order_list2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'order_list2.tpl', 88, false),array('modifier', 'number_format', 'order_list2.tpl', 103, false),)), $this); ?>
<div id="tool_search">
    <div class="btn_select_menu_order">
        <a class="btn btn btn-default btn_view" style="color: #444444; <?php if ($_GET['act'] == view): ?>background: #d6e3e2<?php endif; ?>" href="?mod=order&act=view">
            Chưa giao
        </a>&nbsp;
        <a class="btn btn btn-default btn_view" style="color: #444444;<?php if ($_GET['act'] == view2): ?>background: #d6e3e2<?php endif; ?>" href="?mod=order&act=view2">
            Đã giao
        </a>
    </div>
    <div style="float:right;"><?php echo $this->_tpl_vars['totalResult']; ?>
 Kết quả, Hiển thị <b style="color: red"><?php echo $this->_tpl_vars['numRowsDisplay']; ?>
</b></div>
    <div class="clear"></div>
        <div style="width: 100%; height: 35px; margin-top: 10px; background: #e4e4e4;border-radius: 5px;" id="tool_search_order">
                <div class="dropdown" style="float: left">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Tìm kiếm <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="javascript: void (0)" id="search_with_name_select">Tìm theo tên khách hàng</a></li>
                <li><a href="javascript: void (0)" id="search_with_date_select">Tìm theo ngày giao hàng</a></li>
            </ul>
        </div>
        
                <div style="float: left" id="div_search_with_name">
            <form action="?mod=order&act=<?php echo $_GET['act']; ?>
" method="post">
                <div style="float: left;">
                    <input type="text" class="form-control" style="height: 29px; margin-top: 3px;" placeholder="Nhập tên khách hàng..." name="txt_customer_name" value="<?php echo $_POST['txt_customer_name']; ?>
">
                </div>
                <div style="float: left;margin-left: 1px;">
                    <input type="submit" class="btn btn-default" style="height: 29px; margin-top: 3px;font-size: 12px !important;"name="btn_search_name" value="Tìm">
                </div>
                <div style="clear: both"></div>
            </form>
        </div>
        
                <div style="float: left; margin-left: 5px;" id="div_search_with_date">
            <form action="?mod=order&act=<?php echo $_GET['act']; ?>
" method="post">
                <div style="float: left;">
                    <div style="float: left; line-height: 35px;">Từ&nbsp;&nbsp;</div>
                    <div style="float: left;">
                        <input type="date" class="form-control" style="height: 29px; margin-top: 3px;" name="date_start" value="<?php echo $_POST['date_start']; ?>
">
                    </div>
                </div>
                <div style="float: left;margin-left: 5px;">
                    <div style="float: left; line-height: 35px;margin-left: 10px;">Đến&nbsp;&nbsp;</div>
                    <div style="float: left;">
                        <input type="date" class="form-control" style="height: 29px; margin-top: 3px;" name="date_stop" value="<?php echo $_POST['date_stop']; ?>
">
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div style="float: left;margin-left: 3px;">
                    <input type="submit" class="btn btn-default" style="height: 29px; margin-top: 3px;font-size: 12px !important;"name="btn_search_date" value="Tìm">
                </div>
                <div style="clear: both"></div>
            </form>
        </div>
        
                <div id="search_title">
            chọn phương thức tìm kiếm
        </div>
            </div>
    </div><!--End #tool_search-->
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
        <?php if ($this->_tpl_vars['totalResult'] == 0): ?>
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
                    <td class="fullname"><a href="?mod=customer&act=view&customer_id=<?php echo $this->_tpl_vars['order']['customer_id']; ?>
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
                                <li>
                                    <a onclick="javascript:deleteOrder(<?php echo $this->_tpl_vars['order']['order_id']; ?>
)" href="javascript: void (0);">
                                        <img src="style/images/icon-16-logout.png" title="Huỷ đơn hàng"/>
                                    </a>
                                </li>
                            <?php endif; ?>
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
<span id="show_tool_search" style="display: none"><?php echo $this->_tpl_vars['show_tool_search']; ?>
</span>