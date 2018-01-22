<?php /* Smarty version 2.6.13, created on 2018-01-17 03:59:22
         compiled from support_add.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorAddSupport">

        </i>
    </div>
    <form id="frmaddSupport" method="POST" action="?mod=support&act=add">
        <div class="clear">
            <div class="label"><span>Họ tên: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['s_name']; ?>
" name="s_name" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Email: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['s_email']; ?>
" name="s_email" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Số điện thoại: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['s_phone_number']; ?>
" name="s_phone_number" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addsupport()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>