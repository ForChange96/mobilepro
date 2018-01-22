<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display">
                <!--
                  -
                  - Google Maps Markers
                  -
                  - @author		Nick Baris (AkisC)
                  - @version		1.2.0
                  - @copyright		2012-2015 comvos.net
                  - @license		Free
                  - @link		Download at http://www.opencart.com/index.php?route=extension/extension/info&extension_id=5561
                  -
                  - Apply to OpenCart versions: [2.0.1.0], [2.0.1.1], [2.0.2.0]
                  -
                -->
                <style type="text/css">
                    #google_map_div_0 {
                        width: 100%;
                        height: 400px;
                        border: 6px solid #f4f4f4;
                        padding: 0;
                        margin: 0 0 10px;
                    }
                </style>
                <div id="google_map_div_0"></div>
                <script type="text/javascript">

                    var imageMarker = new google.maps.MarkerImage(
                        'image/google_maps/marker_global.png',
                        new google.maps.Size(129, 42),
                        new google.maps.Point(0, 0),
                        new google.maps.Point(18, 42)
                    );

                    $(document).ready(function() {
                        var latlng0 = new google.maps.LatLng(10.771918,106.69834700000001);
                        var options0 = {
                            zoom: 16,
                            center: latlng0,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        var map0 = new google.maps.Map(document.getElementById('google_map_div_0'), options0);
                        var marker01 = new google.maps.Marker({
                            position: new google.maps.LatLng(10.771918,106.69834700000001),
                            map: map0,
                            icon: imageMarker
                        });

                        google.maps.event.addListener(marker01, 'click', function() {
                            infowindow01.open(map0, marker01);
                        });

                        google.maps.event.addListener(map0, 'click', function() {
                            infowindow01.close();
                        });

                        var infowindow01 = new google.maps.InfoWindow({
                            content:  '<div style="width:200px"></div>'
                        });});
                </script>	  </div>      <h3>Thông tin của chúng tôi:</h3>
            <div class="panel panel-default contact_info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3"><img src="http://mobileprovn.chiliweb.org/image/cache/catalog/0510/logo-phukienfooter-300x200.png" alt="Phụ kiện điện thoại" title="Phụ kiện điện thoại" class="img-thumbnail" /></div>
                        <div class="col-sm-3"><strong>Phụ kiện điện thoại</strong><br />
                            <address>
                                Số 123, Đường ABC, Quận ABC, Thành Phố Hồ Chí Minh              </address>
                        </div>
                        <div class="col-sm-3"><strong>Điện thoại:</strong><br>
                            +84 123 456 789<br />
                            <br />
                            <strong>Fax:</strong><br>
                            +84 123 456 789                          </div>
                        <div class="col-sm-3">
                            <strong>Giờ Làm việc</strong><br />
                            7h - 21h từ thứ 2 - 6<br />
                            8h - 22h từ thứ 7 - chủ nhật<br />
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <h3>Chi Nhánh Của Chúng Tôi</h3>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default contact_accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-location1" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Tên cửa hàng của bạn <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-location1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3"><img src="http://mobileprovn.chiliweb.org/image/cache/catalog/0510/logo-phukienfooter-300x200.png" alt="Tên cửa hàng của bạn" title="Tên cửa hàng của bạn" class="img-thumbnail" /></div>
                                <div class="col-sm-3"><strong>Tên cửa hàng của bạn</strong><br />
                                    <address>
                                        Số 123, Đường ABC, Quận ABC, Thành ABC.                  </address>
                                </div>
                                <div class="col-sm-3"> <strong>Điện thoại:</strong><br>
                                    +84 123 456 789<br />
                                    <br />
                                    <strong>Fax:</strong><br>
                                    +84 123 456 789                                  </div>
                                <div class="col-sm-3">
                                    <strong>Giờ Làm việc</strong><br />
                                    7h - 21h từ thứ 2 - 6<br />
                                    8h - 22h từ thứ 7 - chủ nhật<br />
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="http://mobileprovn.chiliweb.org/index.php?route=information/contact" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <h3>Thông tin của Bạn:</h3>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name">Họ & Tên:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="" id="input-name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">Địa chỉ E-Mail :</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="" id="input-email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-enquiry">Nội dung:</label>
                        <div class="col-sm-10">
                            <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input class="btn btn-primary" type="submit" value="Gửi" />
                    </div>
                </div>
            </form>
            <div class="position-display">
            </div></div>
    </div>
</div>