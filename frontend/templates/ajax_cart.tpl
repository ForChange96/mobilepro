<table class="table table-bordered">
    <tr>
        <td class="text-center">Hình ảnh</td>
        <td class="text-center">Tên sản phẩm</td>
        <td class="text-center">Hãng sản xuất</td>
        <td class="text-center">Số lượng</td>
        <td class="text-center">Đơn Giá</td>
        <td class="text-center">Tổng cộng</td>
    </tr>
    <tbody id="list_product_from_cart">
    {foreach from=$smarty.session.cart key=product_id item=product}
        <tr>
            <td class="text-center">
                <a href="?mod=product&act=detail&id={$product_id}">
                    <img src="{$product.img_link_300}" alt="{$product.p_name}" title="{$product.p_name}" width="70px;" />
                </a>
            </td>
            <td class="text-center" style="line-height: 70px;">
                <a href="?mod=product&act=detail&id={$product_id}">{$product.p_name}</a>
            </td>
            <td class="text-center" style="line-height: 70px;">{$product.manufacturer}</td>
            <td class="text-center" style="padding-top: 30px">
                <div class="input-group btn-block" style="max-width: 200px;">
                    <input type="text" name="" value="{$product.number}" size="1" id="input_number{$product_id}" class="form-control input_number" />
                    <span class="input-group-btn">
                        <button type="button" data-toggle="tooltip" title="Cập nhật" class="btn btn-primary" onclick="update_number({$product_id})"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="Loại bỏ" class="btn btn-danger" onclick="remove_from_cart2({$product_id})"><i class="fa fa-times-circle"></i></button>
                    </span>
                </div>
            </td>
            <td class="text-center" style="line-height: 70px;">{$product.p_price*$product.number|number_format}</td>
            <td class="text-center" style="line-height: 70px;">{$product.p_price*$product.number*110/100|number_format}</td>
        </tr>
    {/foreach}
    </tbody>
</table>