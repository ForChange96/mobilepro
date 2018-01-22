<div id="form">

    <div id="alertBox">
        <i id="errorEditFeatures">

        </i>
    </div>
    <form id="frmEditFeatures" method="POST" action="">
        <div class="clear">
            <div class="label"><span>Tên danh mục: </span></div>
            <div class="input"><input type="text" value="{$featuresEdit.f_name}" name="features" style="padding-left: 5px;" class="form-control"/></div>
        </div>

        <div class="clear center">
            <input type="button" value="Sửa" style="padding: 4px; margin-left: -52px;" class="btn btn-primary" onclick="editfeatures()" />
            <input type="hidden" value="{$featuresEdit.features_id}" name="id"/>
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
