<?php /* Smarty version 2.6.13, created on 2018-02-01 17:06:01
         compiled from gio-hang.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'gio-hang.tpl', 42, false),)), $this); ?>
<div class="container" style="margin-bottom: 30px">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display"></div>
            <h3 style="text-align: center; color: #777777; font-weight: bold">Giỏ hàng</h3>
            <div class="alert alert-success" id="alert_change_cart">
                <div id="alert_change_cart2">
                    <strong>Thành công!</strong> Cập nhật giỏ hàng thành công.
                </div>
            </div>
            <div class="table-responsive" style="margin-bottom: 20px;" id="list_product_from_cart">
                <table class="table table-bordered">
                    <tr>
                        <td class="text-center">Hình ảnh</td>
                        <td class="text-center">Tên sản phẩm</td>
                        <td class="text-center">Hãng sản xuất</td>
                        <td class="text-center">Số lượng</td>
                        <td class="text-center">Đơn Giá</td>
                        <td class="text-center">Tổng cộng</td>
                    </tr>
                    <tbody>
                    <?php $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_id'] => $this->_tpl_vars['product']):
?>
                        <tr>
                            <td class="text-center">
                                <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product_id']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['product']['img_link_300']; ?>
" alt="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" title="<?php echo $this->_tpl_vars['product']['p_name']; ?>
" width="70px;" />
                                </a>
                            </td>
                            <td class="text-center" style="line-height: 70px;">
                                <a href="?mod=product&act=detail&id=<?php echo $this->_tpl_vars['product_id']; ?>
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
                                        <button type="button" data-toggle="tooltip" title="Loại bỏ" id="btn_remove_from_cart" class="btn btn-danger" onclick="remove_from_cart2(<?php echo $this->_tpl_vars['product_id']; ?>
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
            </div>
            <h3>Bạn muốn làm gì tiếp theo?</h3>
            <p>Chọn nếu bạn muốn sử dụng Điểm thưởng, mã Giảm giá (Coupon code), Phiếu quà tặng (Voucher) hoặc Ước tính phí vận chuyển:</p>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Sử dụng Mã giảm Giá <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapse-coupon" class="panel-collapse collapse">
                        <div class="panel-body">
                            <label class="col-sm-2 control-label" for="input-coupon">Nhập Mã Coupon</label>
                            <div class="input-group">
                                <input type="text" name="coupon" value="" placeholder="Nhập Mã Coupon" id="input-coupon" class="form-control" />
                                <span class="input-group-btn">
                        <input type="button" value="Xác nhận" id="button-coupon" data-loading-text="Đang Xử lý..."  class="btn btn-primary" />
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Sử dụng Phiếu Voucher <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapse-voucher" class="panel-collapse collapse">
                        <div class="panel-body">
                            <label class="col-sm-2 control-label" for="input-voucher">Nhập mã Phiếu Voucher</label>
                            <div class="input-group">
                                <input type="text" name="voucher" value="" placeholder="Nhập mã Phiếu Voucher" id="input-voucher" class="form-control" />
                                <span class="input-group-btn">
                        <input type="submit" value="Xác nhận" id="button-voucher" data-loading-text="Đang Xử lý..."  class="btn btn-primary" />
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-shipping" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Ước lượng Cước vận chuyển &amp; Thuế <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapse-shipping" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Xác định địa chỉ nhận hàng để tính cước vận chuyển.</p>
                            <form class="form-horizontal">
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-zone">Tỉnh / Thành phố</label>
                                    <div class="col-sm-10">
                                        <select name="zone_id" id="input-zone" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-postcode">Mã Bưu điện</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="postcode" value="" placeholder="Mã Bưu điện" id="input-postcode" class="form-control" />
                                    </div>
                                </div>
                                <input type="button" value="Ước lượng" id="button-quote" data-loading-text="Đang Xử lý..." class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-right"><strong>Thành tiền:</strong></td>
                            <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Sản phẩm tính thuế:</strong></td>
                            <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tổng cộng :</strong></td>
                            <td class="text-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']*11/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left">
                    <a href="javascript: window.history.back();" class="btn btn-default">Tiếp tục mua hàng</a>
                </div>
                <div class="pull-right">
                    <a href="?mod=cart&act=pay" class="btn btn-primary">Thanh toán</a>
                </div>
            </div>
            <div class="position-display"></div>
        </div>
    </div>
</div>