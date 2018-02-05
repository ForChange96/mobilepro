<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display"></div>
            <div style="line-height:16px;margin-bottom: 20px;">
                <span class="glyphicon glyphicon-info-sign" style="color: #5dbaff; font-size: 16px"></span>&nbsp;&nbsp;
                Nếu bạn đã có tài khoản, vui lòng đăng nhập <a href="javascript: void (0)"  data-toggle="modal" data-target="#login-modal">Tại Đây</a>.
            </div>
            <h3 style="text-align: center; color: grey">Đăng ký tài khoản</h3>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_signup">
                <fieldset id="account">
                    <legend>Thông tin cá nhân</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-fullname">Họ và tên:</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" value="" placeholder="Họ và tên:" id="input-fullname" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address">Địa chỉ:</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" value="" placeholder="Địa chỉ:" id="input-address" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-telephone">Điện Thoại:</label>
                        <div class="col-sm-10">
                            <input type="tel" name="telephone" value="" placeholder="Điện Thoại:" id="input-telephone" class="form-control" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>
                        Thông tin tài khoản&nbsp;&nbsp;&nbsp;
                        <i id="err_signup"></i>
                    </legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-username">Tên tài khoản</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="" placeholder="Tên tài khoản:" id="input-username" required class="form-control" onblur="check_username()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-email">Địa chỉ E-Mail:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="" placeholder="Địa chỉ E-Mail:" id="input-email" class="form-control" required onblur="check_email()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-password">Mật Khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" placeholder="Mật Khẩu:" id="input-password" class="form-control" required onblur="confirm_password2()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-confirm">Nhập lại Mật Khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm" placeholder="Nhập lại Mật Khẩu:" id="input-confirm" class="form-control" required onblur="confirm_password()"/>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="col-sm-12" style="text-align: center">
                        <input type="button" value="Đăng ký" class="btn btn-primary" onclick="sign_up()"/>
                    </div>
                </div>
            </form>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>
<div style="height: 20px;"></div>
