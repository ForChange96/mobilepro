<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="position-display"></div>
            {literal}
                <style>
                    #quickcheckout {
                        margin: 0 auto;
                    }
                    .blocks{
                        display:block;
                    }
                    #step_1{
                        display:block;
                    }
                    [data-toggle="tooltip"]:after {
                        font-family: FontAwesome;
                        color: #1E91CF;
                        content: "\f059";
                        margin-left: 4px;
                    }
                </style>
            {/literal}
            <div id="quickcheckout">
                <div class="wait">
                    <span class="preloader"></span>
                </div>
                <div class="processing-payment">
                    <span class="preloader"></span>
                </div>
                <div class="wrap">
                    <div class="block-content">
                        <div class="aqc-column aqc-column-0">
                            <div id="step_1" class="blocks">
                                <!-- Quick Checkout v4.1.2 by Dreamvention.com quickcheckout/login.tpl -->
                                <div id="option_login_popup_trigger_wrap" class="form-inline clearfix ">
                                    <!-- #option_register_popup-->
                                    <div class="btn-group">
                                        <button class="btn btn-primary" onclick="sign_up()">&nbsp;Đăng ký&nbsp;</button>
                                        <button class="btn btn-default">Đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="qc_left" class="aqc-column aqc-column-1">
                            <div id="step_2" class="blocks">
                                <!-- Quick Checkout v4.0 by Dreamvention.com quickcheckout/register.tpl -->
                                <div id="payment_address_wrap">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <span class="wrap">
                                                <span class="glyphicon glyphicon-user"></span>&nbsp;
                                            </span>
                                            <span class="text">Thông tin tài khoản&nbsp;&nbsp;&nbsp;<i id="err_signup"></i></span>
                                        </div>
                                        <div class="panel-body">
                                            <div id="payment_address" class="form-horizontal ">
                                                <div class="text-input form-group  sort-item" data-sort="1">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="pay_fullname">
                                                            <span class="text"  title="">Họ và tên:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               name="fullname"
                                                               id="pay_fullname"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Họ và tên"/>
                                                    </div>
                                                </div>
                                                <div class="text-input form-group  sort-item" data-sort="13">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="pay_address">
                                                            <span class="text"  title="">Địa chỉ:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               name="address"
                                                               id="pay_address"
                                                               data-refresh="0"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Địa chỉ"/>
                                                    </div>
                                                </div>
                                                <div class="text-input form-group  sort-item" data-sort="4">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="pay_telephone">
                                                            <span class="text"  title="">Điện thoại:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="tel"
                                                               name="telephone"
                                                               id="pay_telephone"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Điện thoại"/>
                                                    </div>
                                                </div>
                                                <div class="text-input form-group  sort-item qc-hide" data-sort="5">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="input-username">
                                                            <span class="text" >Tên tài khoản:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               onblur="check_username()"
                                                               name="username"
                                                               id="input-username"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Tên tài khoản"/>
                                                    </div>
                                                </div>
                                                <div id="email_input"
                                                     class="text-input form-group  sort-item"
                                                     data-sort="3">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="input-email">
                                                            <span class="text"  title="">E-Mail:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               onblur="check_email()"
                                                               name="email"
                                                               id="input-email"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" E-Mail"/>
                                                    </div>
                                                </div>
                                                <div class="password-input form-group sort-item qc-hide  "
                                                     data-sort="6">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="input-password">
                                                            <span class="text"  title="">Mật khẩu:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="password"
                                                               onblur="confirm_password2()"
                                                               name="password"
                                                               id="input-password"
                                                               value=""
                                                               class="form-control"
                                                               placeholder=" Mật khẩu"/>
                                                    </div>
                                                </div>
                                                <div id="confirm_input"
                                                     class="password-input form-group  sort-item qc-hide  "
                                                     data-sort="7">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="input-confirm">
                                                            <span class="text"  title="">Nhập lại mật khẩu:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="password"
                                                               onblur="confirm_password()"
                                                               name="confirm"
                                                               id="input-confirm"
                                                               value=""
                                                               class="form-control"
                                                               placeholder=" Nhập lại mật khẩu"/>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <!-- #payment_address -->
                                        </div>
                                        <!-- .box-content -->
                                    </div>
                                    <!-- .box -->
                                </div>
                                <!-- #payment_address_wrap -->
                            </div>
                            <div id="step_3" class="blocks">
                                <!-- Ajax Quick Checkout v4.2 by Dreamvention.com quickcheckout/register.tpl -->
                                <div id="shipping_address_wrap" class="qc-hide">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <span class="wrap">
                                                <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                                            </span>
                                            <span class="text">Chi tiết giao hàng</span>
                                        </div>
                                        <div class="panel-body">
                                            <div id="shipping_address" class="form-horizontal ">
                                                <div id="firstname_input"
                                                     class="text-input form-group  sort-item"
                                                     data-sort="1">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="shipping_fullname">
                                                            <span class="text"  title="">Tên người nhận hàng:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               name="ship_fullname"
                                                               id="shipping_fullname"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Họ và tên người nhận hàng"/>
                                                    </div>
                                                </div>
                                                <div class="text-input form-group  sort-item"
                                                     data-sort="4">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="shipping_address">
                                                            <span class="text">Địa chỉ:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <textarea class="form-control"
                                                                  name="ship_address"
                                                                  id="shipping_address"
                                                                  placeholder=" Địa chỉ nhận"></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-input form-group  sort-item"
                                                     data-sort="4">
                                                    <div class="col-xs-5">
                                                        <label class="control-label" for="ship_telephone">
                                                            <span class="text">Điện thoại:</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <input type="text"
                                                               name="ship_telephone"
                                                               id="ship_telephone"
                                                               value=""
                                                               class="form-control"
                                                               autocomplite="on"
                                                               placeholder=" Số điện thoại người nhận"/>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- /.box-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="qc_right" style="width:60%; float:left">
                            <div class="aqc-column aqc-column-2">
                                <div id="step_4" class="blocks">
                                    <!-- Quick Checkout v4.0 by Dreamvention.com quickcheckout/shipping_method.tpl -->
                                    <div id="shipping_method_wrap" >
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <span class="wrap">
                                                    <span class="fa fa-truck"></span>&nbsp;
                                                </span>
                                                <span class="text">Phương thức vận chuyển</span>
                                            </div>
                                            <div class="panel-body">
                                                <p class="description">Hãy chọn phương thức Vận chuyển:</p>
                                                <div class="">
                                                    <div class="title">Phí cố định</div>
                                                    <div class="radio-input radio">
                                                        <label for="flat.flat">
                                                            <input type="radio" name="shipping_method" value="flat.flat" id="flat.flat" checked="checked"  data-refresh="5" class="styled"/>
                                                            <span class="text">Phí vận chuyển cố định</span><span class="price">5.000 VNĐ</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aqc-column aqc-column-3">
                                <div id="step_5" class="blocks">
                                    <!-- Quick Checkout v4.0 by Dreamvention.com quickcheckout/payment_method.tpl -->
                                    <div id="payment_method_wrap" >
                                        <div class="panel panel-default" id="step_5_panel">
                                            <div class="panel-heading ">
                                                <span class="wrap">
                                                    <b>&#36;</b>&nbsp;
                                                </span>
                                                <span class="text">Phương thức thanh toán</span>
                                            </div>
                                            <div class="panel-body">
                                                <p class="description">Hãy chọn phương thức Thanh toán:</p>
                                                <div class="payment-methods ">
                                                    <div class="radio-input radio">
                                                        <label for="cod">
                                                            <input type="radio" name="payment_method" value="cod" id="cod" checked="checked" class="styled"  data-refresh="6"/>
                                                            Thu tiền khi giao hàng<span class="price"></span></label>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                            <div class="aqc-column aqc-column-4">
                                <div id="step_6" class="blocks">
                                    <div id="cart_wrap">
                                        <div class="panel panel-default">
                                            <div class="panel-heading ">
                                                <span class="wrap">
                                                    <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;
                                                </span>
                                                <span class="text">Giỏ Hàng</span>
                                            </div>
                                            <div class="qc-checkout-product panel-body " >
                                                <div class="table-responsive">
                                                    <table class="table table-bordered qc-cart">
                                                        <thead>
                                                        <tr>
                                                            <td class="qc-image text-center">Hình ảnh:</td>
                                                            <td class="qc-name text-center">Tên sản phẩm:</td>
                                                            <td class="qc-quantity text-center">Số lượng:</td>
                                                            <td class="qc-price text-center">Đơn giá:</td>
                                                            <td class="qc-total text-center">Tổng Cộng:</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="list_product_in_cart">
                                                        {foreach from=$smarty.session.cart key=product_id item=product}
                                                        <tr>
                                                            <td class="qc-image text-center">
                                                                <a  href="?mod=product&act=detail&id={$product_id}">
                                                                    <img src="{$product.img_link_300}" width="50"/>
                                                                </a>
                                                            </td>
                                                            <td class="qc-name text-center">
                                                                <a href="?mod=product&act=detail&id={$product_id}" >
                                                                    {$product.p_name}
                                                                </a>
                                                            </td>
                                                            <td class="qc-quantity text-center"  style="width: 20%">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-defaut" onclick="number_down({$product_id})">
                                                                            <i class="fa fa-minus"></i>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" value="{$product.number}" id="cart_number_product{$product_id}" class="form-control text-center"/>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-defaut" onclick="number_up({$product_id})">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td class="qc-price text-center">{$product.p_price*$product.number|number_format} VNĐ</td>
                                                            <td class="qc-total text-center">{$product.p_price*$product.number*110/100|number_format} VNĐ</td>
                                                        </tr>
                                                        {/foreach}
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-horizontal qc-options">
                                                    <div class="row form-group qc-coupon ">
                                                        <label class="col-sm-6 control-label" >
                                                            Sử dụng Mã giảm Giá          </label>
                                                        <div class="col-sm-6 qc-total">
                                                            <div class="input-group">
                                                                <input type="text" value="" name="coupon" id="coupon" placeholder="Sử dụng Mã giảm Giá" class="form-control"/>
                                                                <span class="input-group-btn">
                                       <button class="btn btn-primary" id="confirm_coupon" type="button"><i class="fa fa-check"></i></button>
                                       </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group qc-voucher ">
                                                        <label class="col-sm-6 control-label" >
                                                            Sử dụng Phiếu Voucher          </label>
                                                        <div class="col-sm-6 qc-total">
                                                            <div class="input-group">
                                                                <input type="text" value="" name="voucher" id="voucher" placeholder="Sử dụng Phiếu Voucher" class="form-control"/>
                                                                <span class="input-group-btn">
                                       <button class="btn btn-primary" id="confirm_voucher" type="button"><i class="fa fa-check"></i></button>
                                       </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-horizontal qc-summary" id="amount">
                                                    <div class="row qc-totals">
                                                        <label class="col-xs-6 control-label" >Thành tiền</label>
                                                        <div class="col-xs-6 form-control-static">{$total|number_format} VNĐ</div>
                                                    </div>
                                                    <div class="row qc-totals">
                                                        <label class="col-xs-6 control-label" >Phí vận chuyển cố định</label>
                                                        <div class="col-xs-6 form-control-static">5,000 VNĐ</div>
                                                    </div>
                                                    <div class="row qc-totals">
                                                        <label class="col-xs-6 control-label" >Sản phẩm tính thuế</label>
                                                        <div class="col-xs-6 form-control-static">{$total/10|number_format} VNĐ</div>
                                                    </div>
                                                    <div class="row qc-totals">
                                                        <label class="col-xs-6 control-label" >Tổng cộng </label>
                                                        <div class="col-xs-6 form-control-static">{$total*11/10+5000|number_format} VNĐ</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step_8" class="blocks">
                                    <!-- Quick Checkout v4.0 by Dreamvention.com quickcheckout/cofirm.tpl -->
                                    <div id="confirm_wrap">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div id="confirm_inputs" class="form-horizontal">
                                                    <div id="comment_input"
                                                         class="textarea-input form-group sort-item qc-hide  "
                                                         data-sort="">
                                                        <div  class="col-xs-12">
                                                            <label class="control-label" for="order_note">
                                                                <p class="text">Thêm ghi chú cho đơn hàng:</p>
                                                            </label>
                                                            <textarea name="order_note"
                                                                      id="order_note"
                                                                      data-require=""
                                                                      data-refresh="0"
                                                                      class="form-control"
                                                                      placeholder="Ghi chú..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!-- #confirm_inputs -->
                                                <div>
                                                    <div class="buttons">
                                                        <div class="right">
                                                            <input type="button" id="qc_confirm_order" class="button btn btn-primary" value="Xác nhận đơn hàng" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-display"></div>
        </div>
    </div>
</div>