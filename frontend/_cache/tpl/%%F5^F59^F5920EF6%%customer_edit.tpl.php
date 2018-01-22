<?php /* Smarty version 2.6.13, created on 2018-01-02 06:07:29
         compiled from customer_edit.tpl */ ?>
<div id="form">

        <div id="alertBox">
            <i id="errorEditCustomer">

            </i>
        </div>
    <form id="frmEditCustomer" method="POST" action="?mod=customer&act=edit&id=<?php echo $this->_tpl_vars['aryCustomer']['customer_id']; ?>
">
        <div class="clear">
            <div class="label"><span>Tên đăng nhập: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['aryCustomer']['username']; ?>
" name="username" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Mật khẩu: </span></div>
            <div class="input"><input type="password" value="<?php echo $this->_tpl_vars['aryCustomer']['password']; ?>
" name="password" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Email: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['aryCustomer']['email']; ?>
" name="email" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Họ và tên: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['aryCustomer']['fullname']; ?>
" name="fullname" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Địa chỉ: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['aryCustomer']['address']; ?>
" name="address" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Số điện thoại: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['aryCustomer']['phone_number']; ?>
" name="phone" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Sửa" name="Update" id="btneditcustomer" style="padding: 4px; margin-left: -50px;" class="btn btn-primary" onclick="editcustomer()" />
            <input type="hidden" value="<?php echo $this->_tpl_vars['aryCustomer']['customer_id']; ?>
" name="id"/>
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
