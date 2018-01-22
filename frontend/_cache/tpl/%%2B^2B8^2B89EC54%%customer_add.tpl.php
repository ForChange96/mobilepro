<?php /* Smarty version 2.6.13, created on 2018-01-02 03:10:34
         compiled from customer_add.tpl */ ?>
<div id="form">
        <div id="alertBox">
            <i id="errorAddCustomer">

            </i>
        </div>
    <form id="frmaddCustomer" method="POST" action="?mod=customer&act=add">
        <div class="clear">
            <div class="label"><span>Tài khoản: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['username']; ?>
" name="username" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Mật khẩu: </span></div>
            <div class="input"><input type="password" value="<?php echo $_POST['password']; ?>
" name="password" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Email: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['email']; ?>
" name="email" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Họ và tên: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['fullname']; ?>
" name="fullname" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Địa chỉ: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['address']; ?>
" name="address" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Số điện thoại: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['phone']; ?>
" name="phone" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" name="btnAdd" id="btnaddcustomer" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addcustomer()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
