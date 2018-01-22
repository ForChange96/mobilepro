<div style="margin: 20px 0px">
    <h4 style="text-align: center; font-weight: bold">Chi tiết hoá đơn</h4>
    <h5 style="margin-left: 100px"><b>Tên khách hàng: </b><i>{$customer_name}</i></h5>
    <div class="table-responsive">
        <table class="table" style="width:80%;margin: auto; text-align: center">
            <tr>
                <td style="width: 100px"><b>STT</b></td>
                <td class="productname"><b>Tên hàng</b></td>
                <td class="diachi"><b>Số lượng</b></td>
                <td class="price"><b>Đơn giá</b></td>
                <td class="price"><b>Thành tiền</b></td>
            </tr>
            {foreach from=$list_product key=k item=row}
                <tr>
                    <td>{$k+1}</td>
                    <td class="productname">{$row.product_name}</td>
                    <td class="diachi">{$row.number}</td>
                    <td class="price">{$row.price|number_format}</td>
                    <td class="price">{$row.total_row|number_format}</td>
                </tr>
            {/foreach}
            <tr>
                <td colspan="5" style="color: #ff4a52">Tổng cộng: {$total|number_format}</td>
            </tr>
            <tr>
                <td colspan="5">
                    {if $status==0}
                        <span class="btn btn-default" id="btn_order_confirm">Xác nhận đã giao hàng</span>
                    {/if}
                </td>
            </tr>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="modal_order_confirm" role="dialog">
            <div class="modal-dialog" style="width: 450px;">
                <!-- Modal content-->
                <form action="?mod=order&act=confirm" method="post">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4>Nhập tên người giao hàng</h4>
                            <input type="text" name="shipper" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="order_id" value="{$order_id}">
                            <input type="submit" class="btn btn-success" value="Xác nhận">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                <!--End Modal content-->
            </div>
        </div>
        <!-- End Modal -->
    </div>
</div>