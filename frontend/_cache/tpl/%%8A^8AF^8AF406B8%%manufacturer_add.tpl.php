<?php /* Smarty version 2.6.13, created on 2018-01-04 11:32:25
         compiled from manufacturer_add.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorAddManufacturer">

        </i>
    </div>
    <form id="frmaddManufacturer" method="POST">
        <div class="clear">
            <div class="label"><span>Tên hãng sản xuất: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['manufacturer']; ?>
" name="manufacturer" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addManufacturer()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>