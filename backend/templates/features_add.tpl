<div id="form">

    <div id="alertBox">
        <i id="errorAddFeatures">

        </i>
    </div>
    <form id="frmaddFeatures" method="POST" action="?mod=features&act=add">
        <div class="clear">
            <div class="label"><span>Tên tính năng: </span></div>
            <div class="input"><input type="text" value="{$smarty.post.features}" name="features" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Thêm mới" style="padding: 4px; margin-left: -12px;" class="btn btn-primary" onclick="addfeatures()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
