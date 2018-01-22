<?php /* Smarty version 2.6.13, created on 2018-01-16 11:10:57
         compiled from contact_add.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorAddContact">

        </i>
    </div>
    <form id="frmaddContact" method="POST" action="?mod=contact&act=add">
        <div class="clear">
            <div class="label"><span>Hotline: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['hotline']; ?>
" name="hotline" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Địa chỉ: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['address']; ?>
" name="address" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addcontact()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>