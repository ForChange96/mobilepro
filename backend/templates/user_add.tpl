<div id="form">

    <div id="alertBox">
        <i id="errorAddUser">

        </i>
    </div>
    <form id="frmaddUser" method="POST" action="?mod=user&act=add">
        <div class="clear">
            <div class="label"><span>Tài khoản: </span></div>
            <div class="input"><input type="text" value="{$smarty.post.username}" name="username" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Mật khẩu: </span></div>
            <div class="input"><input type="password" value="{$smarty.post.password}" name="password" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Họ và tên: </span></div>
            <div class="input"><input type="text" value="{$smarty.post.fullname}" name="fullname" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" name="btnAdd" id="btnadduser" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="adduser()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
