<div id="form">

    <div id="alertBox">
        <i id="errorEditsupport">

        </i>
    </div>
    <form id="frmEditSupport" method="POST" action="">
        <div class="clear">
            <div class="label"><span>Họ tên: </span></div>
            <div class="input"><input type="text" value="{$supportEdit.s_name}" name="s_name" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Email: </span></div>
            <div class="input"><input type="text" value="{$supportEdit.s_email}" name="s_email" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear">
            <div class="label"><span>Số điện thoại: </span></div>
            <div class="input"><input type="text" value="{$supportEdit.s_phone_number}" name="s_phone_number" style="padding-left: 5px;" class="form-control"/></div>
        </div>
        <div class="clear center">
            <input type="button" value="Sửa" style="padding: 4px; margin-left: -52px;" class="btn btn-primary" onclick="editsupport()" />
            <input type="reset" value="Reset" class="btn btn-danger" style="padding: 4px" name="btnReset" />
            <input type="hidden" value="{$supportEdit.support_id}" name="id">
        </div>
    </form>
</div>