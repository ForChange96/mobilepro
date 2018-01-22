<div id="form">
    <div id="alertBox">
        <i id="errorEditUser">

        </i>
    </div>
    <form id="frmaddUser" method="POST" action="?mod=user&act=edit&id={$aryUser.userId}">
        <div class="clear">
            <div class="label"><span>Tên đăng nhập: <span></div>
            <div class="input">
                <input type="text" style="padding-left: 5px;" class="form-control" value="{$aryUser.username}" name="username" />
            </div>
        </div>

        <div class="clear">
            <div class="label"><span>Mật khẩu: </span></div>
            <div class="input">
                <input type="password" style="padding-left: 5px;" class="form-control" value="{$aryUser.password}" name="password" />
            </div>
        </div>
        <div class="clear">
            <div class="label"><span>Họ tên: </span></div>
            <div class="input">
                <input type="text" style="padding-left: 5px;" class="form-control" value="{$aryUser.fullname}" name="fullname" />
            </div>
        </div>

        <div class="clear center" style="margin-left: -42px;">
            <input type="button" value="&nbsp;Sửa&nbsp;" class="btn btn-primary" name="Update" id="btnEdituser" style="padding: 4px;" onclick="edituser()"/>
            <input type="hidden" value="{$aryUser.user_id}" name="id"  />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px;" name="btnAdd" />
        </div>
    </form>
</div>
