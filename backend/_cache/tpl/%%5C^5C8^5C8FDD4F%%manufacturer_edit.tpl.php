<?php /* Smarty version 2.6.13, created on 2018-01-04 11:29:18
         compiled from manufacturer_edit.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorEditManufacturer">

        </i>
    </div>
    <form id="frmEditManufacturer" method="POST">
        <div class="clear">
            <div class="label"><span>Tên hãng sản xuất: </span></div>
            <div class="input"><input type="text" value="<?php echo $this->_tpl_vars['listManufacturer']['m_name']; ?>
" name="manufacturer" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Sửa" style="padding: 4px; margin-left: -52px;" class="btn btn-primary" onclick="editManufacturer()" />
            <input type="hidden" value="<?php echo $this->_tpl_vars['listManufacturer']['manufacturer_id']; ?>
" name="id">
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>