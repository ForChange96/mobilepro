<div id="form">

    <div id="alertBox">
        <i id="errorAddCategory">

        </i>
    </div>
    <form id="frmaddCategory" method="POST" action="?mod=category&act=add">
        <div class="clear">
            <div class="label"><span>Tên danh mục: </span></div>
            <div class="input"><input type="text" value="{$smarty.post.category}" name="category" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addcategory()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
