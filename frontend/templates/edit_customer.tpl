<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 other_page">
            <div class="position-display"></div>
            <div style="line-height:16px;margin-bottom: 20px;">
                <span class="glyphicon glyphicon-info-sign" style="color: #5dbaff; font-size: 16px"></span>&nbsp;&nbsp;
                Nếu bạn muốn thay đổi tên đăng nhập hoặc địa chỉ email, hãy tạo một tài khoản mới <a href="?mod=dangky&act=view">Tại Đây</a>.
            </div>
            <h3 style="text-align: center; color: grey">Sửa thông tin tài khoản</h3>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="frm_edit_customer">
                <fieldset id="account">
                    <legend>Thông tin cá nhân</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-fullname">Họ và tên:</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" value="{$customer.fullname}" placeholder="Họ và tên:" id="input-fullname" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address">Địa chỉ:</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" value="{$customer.address}" placeholder="Địa chỉ:" id="input-address" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-telephone">Điện Thoại:</label>
                        <div class="col-sm-10">
                            <input type="tel" name="telephone" value="{$customer.phone_number}" placeholder="Điện Thoại:" id="input-telephone" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="margin-left: 210px">
                            <input type="checkbox" id="cb_change_password" name="cb_change_password"> Đổi mật khẩu
                        </div>
                    </div>
                </fieldset>
                <fieldset style="display: none" id="frm_change_password">
                    <legend>
                        Đổi mật khẩu&nbsp;&nbsp;&nbsp;
                        <i id="err_signup"></i>
                    </legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-old-password">Mật Khẩu cũ:</label>
                        <div class="col-sm-10">
                            <input type="password" name="old_password" placeholder="Mật Khẩu:" id="input-old-password" class="form-control" onchange="check_pass_for_change({$smarty.session.customer})"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-password">Mật Khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" placeholder="Mật Khẩu:" id="input-password" class="form-control" onblur="confirm_password2()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-confirm">Nhập lại Mật Khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm" placeholder="Nhập lại Mật Khẩu:" id="input-confirm" class="form-control" onblur="confirm_password()"/>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="col-sm-12" style="text-align: center">
                        <input type="button" value="Xác nhận" class="btn btn-primary" onclick="edit_customer()"/>
                    </div>
                </div>
            </form>
            <div class="position-display">
            </div>
        </div>
    </div>
</div>
<div style="height: 20px;"></div>

