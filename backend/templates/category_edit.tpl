<div id="form">

    <div id="alertBox">
        <i id="errorEditCategory">

        </i>
    </div>
    <form id="frmEditCategory" method="POST" action="">
        <div class="clear">
            <div class="label"><span>Tên danh mục: </span></div>
            <div class="input"><input type="text" value="{$categoryEdit.category_name}" name="category" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Sửa" name="btnAdd" id="btnaddcategory" style="padding: 4px; margin-left: -52px;" class="btn btn-primary" onclick="editcategory()" />
            <input type="hidden" value="{$categoryEdit.category_id}" name="id"/>
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
