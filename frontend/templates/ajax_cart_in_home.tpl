    {if isset($smarty.session.cart) && !empty($smarty.session.cart)}
        <li class="table-responsive">
            <table class="table" style="width: 400px">
                <tbody>
                {foreach from=$smarty.session.cart key=product_id item=product}
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="{$product.img_link_300}" alt="{$product.p_name}" title="{$product.p_name}" width="100">
                            </a>
                        </td>
                        <td class="text-left" style="padding-top: 30px;">
                            <a href="">{$product.p_name}</a>
                        </td>
                        <td class="text-right" style="padding-top: 30px;">x {$product.number}</td>
                        <td class="text-right" style="padding-top: 30px;">{$product.p_price|number_format}</td>
                        <td class="text-center" style="padding-top: 30px;">
                            <button type="button" onclick="remove_from_cart({$product_id})" title="Loại bỏ" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </li>
        <li>
            <div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Thành tiền</strong></td>
                        <td class="text-right">{$total|number_format} VNĐ</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Sản phẩm tính thuế</strong></td>
                        <td class="text-right">{$total/10|number_format} VNĐ</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Tổng cộng </strong></td>
                        <td class="text-right">{$total+$total/10|number_format} VNĐ</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-right">
                    <a href="?mod=cart&act=view"><strong><i class="fa fa-shopping-cart"></i> Xem Giỏ Hàng</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="?mod=cart&act=pay"><strong><i class="fa fa-share"></i> Thanh Toán</strong></a>
                </p>
            </div>
        </li>
    {else}
        <li class="text-center">Giỏ hàng trống</li>
    {/if}