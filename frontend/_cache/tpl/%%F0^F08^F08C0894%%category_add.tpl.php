<?php /* Smarty version 2.6.13, created on 2018-01-04 10:28:26
         compiled from category_add.tpl */ ?>
<div id="form">

    <div id="alertBox">
        <i id="errorAddCategory">

        </i>
    </div>
    <form id="frmaddCategory" method="POST" action="?mod=category&act=add">
        <div class="clear">
            <div class="label"><span>Tên danh mục: </span></div>
            <div class="input"><input type="text" value="<?php echo $_POST['category']; ?>
" name="category" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addcategory()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>