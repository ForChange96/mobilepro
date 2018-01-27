<div id="form">

    <div id="alertBox">
        <i id="errorEditcontact">

        </i>
    </div>
    <form id="frmEditContact" method="POST" action="">
        <div class="clear">
            <div class="label"><span>Hotline: </span></div>
            <div class="input"><input type="text" value="{$contactEdit.hotline}" name="hotline" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Hotline: </span></div>
            <div class="input"><input type="text" value="{$contactEdit.hotline2}" name="hotline2" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Địa chỉ: </span></div>
            <div class="input"><input type="text" value="{$contactEdit.address}" name="address" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Email: </span></div>
            <div class="input"><input type="email" value="{$contactEdit.email}" name="email" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear center">
            <input type="button" value="Sửa" style="padding: 4px; margin-left: -52px;" class="btn btn-primary" onclick="editcontact()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
        </div>
    </form>
</div>
