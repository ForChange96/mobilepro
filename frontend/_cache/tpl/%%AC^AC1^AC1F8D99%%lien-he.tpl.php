<?php /* Smarty version 2.6.13, created on 2018-02-22 04:50:56
         compiled from lien-he.tpl */ ?>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display">
                <?php echo '
                    <style type="text/css">
                        #google_map_div_0 {
                            width: 100%;
                            height: 412px;
                            border: 6px solid #e2e2e2;
                            padding: 0;
                            margin-bottom: 30px;
                        }
                    </style>
                '; ?>

                <div id="google_map_div_0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21062.213288707124!2d105.7281835223695!3d21.060338847210218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454f7803fbcdd%3A0x60b55783c99f864c!2zMjHCsDAzJzEwLjEiTiAxMDXCsDQ0JzE2LjciRQ!5e0!3m2!1svi!2s!4v1516769486729" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <h3>Thông tin của chúng tôi:</h3>
            <div class="panel panel-default contact_info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="catalog/view/images/logo-mobilepro2.png" alt="mobilepro" title="mobilepro" class="img-thumbnail" />
                        </div>
                        <div class="col-sm-3"><strong>MobilePro</strong><br />
                            <address>
                                <?php echo $this->_tpl_vars['contact']['address']; ?>

                            </address>
                        </div>
                        <div class="col-sm-3"><strong>Điện thoại:</strong><br>
                            <?php echo $this->_tpl_vars['contact']['hotline']; ?>
<br />
                            <br />
                            <strong>Fax:</strong><br>
                            <?php echo $this->_tpl_vars['contact']['hotline2']; ?>
                         </div>
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
                        <h4 class="panel-title">
                            <a href="#collapse-location1" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                MobilePro <i class="fa fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-location1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="catalog/view/images/logo-mobilepro2.png" alt="mobilepro" title="mobilepro" class="img-thumbnail" />
                                </div>
                                <div class="col-sm-3"><strong>MobliePro - Hà Nội</strong><br />
                                    <address>
                                        <?php echo $this->_tpl_vars['contact']['address']; ?>

                                    </address>
                                </div>
                                <div class="col-sm-3"> <strong>Điện thoại:</strong><br>
                                    <?php echo $this->_tpl_vars['contact']['hotline']; ?>
<br />
                                    <br />
                                    <strong>Fax:</strong><br>
                                    <?php echo $this->_tpl_vars['contact']['hotline2']; ?>
                                 </div>
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
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <h3 style="color: #90000f">Để lại thông tin, chúng tôi sẽ liên hệ với bạn:</h3>
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