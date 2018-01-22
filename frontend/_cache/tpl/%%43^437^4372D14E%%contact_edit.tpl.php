<?php /* Smarty version 2.6.13, created on 2018-01-16 11:16:23
         compiled from contact_edit.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorEditcontact">

        </i>
    </div>
    <form id="frmEditContact" method="POST" action="">
        <div class="clear">
            <div class="label"><span>Hotline: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['contactEdit']['hotline']; ?>
" name="hotline" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Địa chỉ: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['contactEdit']['address']; ?>
" name="address" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="editcontact()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>