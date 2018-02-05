{foreach from=$smarty.session.cart key=product_id item=product}
    <tr>
        <td class="qc-image text-center">
            <a  href="?mod=product&act=detail&id={$product_id}">
                <img src="{$product.img_link_300}" width="50"/>
            </a>
        </td>
        <td class="qc-name text-center">
            <a href="?mod=product&act=detail&id={$product_id}" >
                {$product.p_name}
            </a>
        </td>
        <td class="qc-quantity text-center"  style="width: 20%">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-defaut" onclick="number_down({$product_id})">
                        <i class="fa fa-minus"></i>
                    </button>
                </span>
                <input type="text" value="{$product.number}" id="cart_number_product{$product_id}" class="form-control text-center"/>
                <span class="input-group-btn">
                    <button class="btn btn-defaut" onclick="number_up({$product_id})">
                        <i class="fa fa-plus"></i>
                    </button>
                </span>
            </div>
        </td>
        <td class="qc-price text-center">{$product.p_price*$product.number|number_format} VNĐ</td>
        <td class="qc-total text-center">{$product.p_price*$product.number*110/100|number_format} VNĐ</td>
    </tr>
{/foreach}