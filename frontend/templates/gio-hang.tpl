<div class="page_image_title">
    <h1>
        Giỏ Hàng
    </h1>
</div>
<div class="breadcum_main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Giỏ Hàng</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display">
            </div>
            <form action="http://mobileprovn.chiliweb.org/index.php?route=checkout/cart/edit" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Hình ảnh</td>
                            <td class="text-left">Tên sản phẩm</td>
                            <td class="text-left">Dòng sản phẩm</td>
                            <td class="text-left">Số lượng</td>
                            <td class="text-right">Đơn Giá</td>
                            <td class="text-right">Tổng cộng</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">
                                <a href="#"><img src="http://mobileprovn.chiliweb.org/image/cache/catalog/0510/baoda_4-47x47.jpg" alt="Ốp lưng Nokia Lumia 630" title="Ốp lưng Nokia Lumia 630" class="img-thumbnail" /></a>
                            </td>
                            <td class="text-left">
                                <a href="#">Ốp lưng Nokia Lumia 630</a>
                            </td>
                            <td class="text-left">M020</td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="quantity[YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjIwO30=]" value="1" size="1" class="form-control input_number" />
                                    <span class="input-group-btn">
                              <button type="submit" data-toggle="tooltip" title="Cập nhật" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                              <button type="button" data-toggle="tooltip" title="Loại bỏ" class="btn btn-danger" onclick="cart.remove('YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjIwO30=');"><i class="fa fa-times-circle"></i></button></span>
                                </div>
                            </td>
                            <td class="text-right">65.000 VNĐ</td>
                            <td class="text-right">65.000 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="#"><img src="http://mobileprovn.chiliweb.org/image/cache/catalog/0510/baoda_1-47x47.jpg" alt="Ốp lưng OPPO Find 5 Mini R827" title="Ốp lưng OPPO Find 5 Mini R827" class="img-thumbnail" /></a>
                            </td>
                            <td class="text-left"><a href="#">Ốp lưng OPPO Find 5 Mini R827</a>
                            </td>
                            <td class="text-left">M017</td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="quantity[YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjE3O30=]" value="2" size="1" class="form-control input_number" />
                                    <span class="input-group-btn">
                              <button type="submit" data-toggle="tooltip" title="Cập nhật" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                              <button type="button" data-toggle="tooltip" title="Loại bỏ" class="btn btn-danger" onclick="cart.remove('YToxOntzOjEwOiJwcm9kdWN0X2lkIjtpOjE3O30=');"><i class="fa fa-times-circle"></i></button></span>
                                </div>
                            </td>
                            <td class="text-right">16.000 VNĐ</td>
                            <td class="text-right">32.000 VNĐ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <h2>Bạn muốn làm gì tiếp theo?</h2>
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
                            <script type="text/javascript"><!--
                                $('#button-coupon').on('click', function() {
                                    $.ajax({
                                        url: 'index.php?route=checkout/coupon/coupon',
                                        type: 'post',
                                        data: 'coupon=' + encodeURIComponent($('input[name=\'coupon\']').val()),
                                        dataType: 'json',
                                        beforeSend: function() {
                                            $('#button-coupon').button('loading');
                                        },
                                        complete: function() {
                                            $('#button-coupon').button('reset');
                                        },
                                        success: function(json) {
                                            $('.alert').remove();

                                            if (json['error']) {
                                                $('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                            }

                                            if (json['redirect']) {
                                                location = json['redirect'];
                                            }
                                        }
                                    });
                                });
                                //-->
                            </script>
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
                            <script type="text/javascript"><!--
                                $('#button-voucher').on('click', function() {
                                    $.ajax({
                                        url: 'index.php?route=checkout/voucher/voucher',
                                        type: 'post',
                                        data: 'voucher=' + encodeURIComponent($('input[name=\'voucher\']').val()),
                                        dataType: 'json',
                                        beforeSend: function() {
                                            $('#button-voucher').button('loading');
                                        },
                                        complete: function() {
                                            $('#button-voucher').button('reset');
                                        },
                                        success: function(json) {
                                            $('.alert').remove();

                                            if (json['error']) {
                                                $('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                            }
                                            if (json['redirect']) {
                                                location = json['redirect'];
                                            }
                                        }
                                    });
                                });
                                //-->
                            </script>
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
                                <input type="button" value="Lấy trích dẫn" id="button-quote" data-loading-text="Đang Xử lý..." class="btn btn-primary" />
                            </form>
                            <script type="text/javascript"><!--
                                $('#button-quote').on('click', function() {
                                    $.ajax({
                                        url: 'index.php?route=checkout/shipping/quote',
                                        type: 'post',
                                        data: 'country_id=' + $('select[name=\'country_id\']').val() + '&zone_id=' + $('select[name=\'zone_id\']').val() + '&postcode=' + encodeURIComponent($('input[name=\'postcode\']').val()),
                                        dataType: 'json',
                                        beforeSend: function() {
                                            $('#button-quote').button('loading');
                                        },
                                        complete: function() {
                                            $('#button-quote').button('reset');
                                        },
                                        success: function(json) {
                                            $('.alert, .text-danger').remove();

                                            if (json['error']) {
                                                if (json['error']['warning']) {
                                                    $('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                                                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                                                }

                                                if (json['error']['country']) {
                                                    $('select[name=\'country_id\']').after('<div class="text-danger">' + json['error']['country'] + '</div>');
                                                }

                                                if (json['error']['zone']) {
                                                    $('select[name=\'zone_id\']').after('<div class="text-danger">' + json['error']['zone'] + '</div>');
                                                }

                                                if (json['error']['postcode']) {
                                                    $('input[name=\'postcode\']').after('<div class="text-danger">' + json['error']['postcode'] + '</div>');
                                                }
                                            }

                                            if (json['shipping_method']) {
                                                $('#modal-shipping').remove();

                                                html  = '<div id="modal-shipping" class="modal">';
                                                html += '  <div class="modal-dialog">';
                                                html += '    <div class="modal-content">';
                                                html += '      <div class="modal-header">';
                                                html += '        <h4 class="modal-title">Vui lòng chọn phương thức vận chuyển phù hợp cho Đơn hàng</h4>';
                                                html += '      </div>';
                                                html += '      <div class="modal-body">';

                                                for (i in json['shipping_method']) {
                                                    html += '<p><strong>' + json['shipping_method'][i]['title'] + '</strong></p>';

                                                    if (!json['shipping_method'][i]['error']) {
                                                        for (j in json['shipping_method'][i]['quote']) {
                                                            html += '<div class="radio">';
                                                            html += '  <label>';

                                                            if (json['shipping_method'][i]['quote'][j]['code'] == '') {
                                                                html += '<input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" checked="checked" />';
                                                            } else {
                                                                html += '<input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" />';
                                                            }
                                                            html += json['shipping_method'][i]['quote'][j]['title'] + ' - ' + json['shipping_method'][i]['quote'][j]['text'] + '</label></div>';
                                                        }
                                                    } else {
                                                        html += '<div class="alert alert-danger">' + json['shipping_method'][i]['error'] + '</div>';
                                                    }
                                                }

                                                html += '      </div>';
                                                html += '      <div class="modal-footer">';
                                                html += '        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>';

                                                html += '        <input type="button" value="Áp dụng vận chuyển" id="button-shipping" data-loading-text="Đang Xử lý..." class="btn btn-primary" disabled="disabled" />';

                                                html += '      </div>';
                                                html += '    </div>';
                                                html += '  </div>';
                                                html += '</div> ';

                                                $('body').append(html);

                                                $('#modal-shipping').modal('show');

                                                $('input[name=\'shipping_method\']').on('change', function() {
                                                    $('#button-shipping').prop('disabled', false);
                                                });
                                            }
                                        }
                                    });
                                });

                                $(document).delegate('#button-shipping', 'click', function() {
                                    $.ajax({
                                        url: 'index.php?route=checkout/shipping/shipping',
                                        type: 'post',
                                        data: 'shipping_method=' + encodeURIComponent($('input[name=\'shipping_method\']:checked').val()),
                                        dataType: 'json',
                                        beforeSend: function() {
                                            $('#button-shipping').button('loading');
                                        },
                                        complete: function() {
                                            $('#button-shipping').button('reset');
                                        },
                                        success: function(json) {
                                            $('.alert').remove();
                                            if (json['error']) {
                                                $('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                            }
                                            if (json['redirect']) {
                                                location = json['redirect'];
                                            }
                                        }
                                    });
                                });
                                //-->
                            </script>
                            <script type="text/javascript"><!--
                                $('select[name=\'country_id\']').on('change', function() {
                                    $.ajax({
                                        url: 'index.php?route=checkout/shipping/country&country_id=' + this.value,
                                        dataType: 'json',
                                        beforeSend: function() {
                                            $('select[name=\'country_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
                                        },
                                        complete: function() {
                                            $('.fa-spin').remove();
                                        },
                                        success: function(json) {
                                            if (json['postcode_required'] == '1') {
                                                $('input[name=\'postcode\']').parent().parent().addClass('required');
                                            } else {
                                                $('input[name=\'postcode\']').parent().parent().removeClass('required');
                                            }

                                            html = '<option value=""> --- Chọn --- </option>';

                                            if (json['zone'] && json['zone'] != '') {
                                                for (i = 0; i < json['zone'].length; i++) {
                                                    html += '<option value="' + json['zone'][i]['zone_id'] + '"';

                                                    if (json['zone'][i]['zone_id'] == '') {
                                                        html += ' selected="selected"';
                                                    }

                                                    html += '>' + json['zone'][i]['name'] + '</option>';
                                                }
                                            } else {
                                                html += '<option value="0" selected="selected"> --- Không --- </option>';
                                            }

                                            $('select[name=\'zone_id\']').html(html);
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                });
                                $('select[name=\'country_id\']').trigger('change');
                                //-->
                            </script>
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
                            <td class="text-right">97.000 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Sản phẩm tính thuế:</strong></td>
                            <td class="text-right">4.000 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tổng cộng :</strong></td>
                            <td class="text-right">101.000 VNĐ</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left">
                    <a href="#" class="btn btn-default">Tiếp tục mua hàng</a>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-primary">Thanh toán</a>
                </div>
            </div>
            <div class="position-display"></div>
        </div>
    </div>
</div>