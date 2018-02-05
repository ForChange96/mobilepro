<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Thành tiền</label>
    <div class="col-xs-6 form-control-static">{$total|number_format} VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Phí vận chuyển cố định</label>
    <div class="col-xs-6 form-control-static">5,000 VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Sản phẩm tính thuế</label>
    <div class="col-xs-6 form-control-static">{$total/10|number_format} VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Tổng cộng </label>
    <div class="col-xs-6 form-control-static">{$total*11/10+5000|number_format} VNĐ</div>
</div>