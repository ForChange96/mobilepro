<?php /* Smarty version 2.6.13, created on 2018-01-03 09:27:43
         compiled from user_edit.tpl */ ?>
<div id="form">
    <div id="alertBox">
        <i id="errorEditUser">

        </i>
    </div>
    <form id="frmaddUser" method="POST" action="?mod=user&act=edit&id=<?php echo $this->_tpl_vars['aryUser']['userId']; ?>
">
        <div class="clear">
            <div class="label"><span>Tên đăng nhập: <span></div>
            <div class="input">
                <input type="text" style="padding-left: 5px;" class="form-control" value="<?php echo $this->_tpl_vars['aryUser']['username']; ?>
" name="username" />
            </div>
        </div>

        <div class="clear">
            <div class="label"><span>Mật khẩu: </span></div>
            <div class="input">
                <input type="password" style="padding-left: 5px;" class="form-control" value="<?php echo $this->_tpl_vars['aryUser']['password']; ?>
" name="password" />
            </div>
        </div>
        <div class="clear">
            <div class="label"><span>Họ tên: </span></div>
            <div class="input">
                <input type="text" style="padding-left: 5px;" class="form-control" value="<?php echo $this->_tpl_vars['aryUser']['fullname']; ?>
" name="fullname" />
            </div>
        </div>

        <div class="clear center" style="margin-left: -42px;">
            <input type="button" value="&nbsp;Sửa&nbsp;" class="btn btn-primary" name="Update" id="btnEdituser" style="padding: 4px;" onclick="edituser()"/>
            <input type="hidden" value="<?php echo $this->_tpl_vars['aryUser']['user_id']; ?>
" name="id"  />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px;" name="btnAdd" />
        </div>
    </form>
</div>