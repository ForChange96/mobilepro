<div id="form">

    <div id="alertBox">
        <i id="errorAddProduct">

        </i>
    </div>
    <form id="frmAddProduct" method="POST" action="?mod=product&act=doAdd" class="table-responsive" enctype="multipart/form-data">
        <table id="tableAddProduct">
            <tr>
                <td style="width: 200px;">Thuộc danh mục</td>
                <td>
                    <select class="form-control" name="category" onchange="show_hide_features({$category.category_name})">
                        {foreach from=$listCategory item=category}
                            <option value="{$category.category_id}" {if $category.category_id==$smarty.post.category} selected="selected"{/if}>{$category.category_name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hãng sản xuất</td>
                <td>
                    <select class="form-control" name="manufacturer">
                        {foreach from=$listManufacturer item=manufacturer}
                            <option value="{$manufacturer.manufacturer_id}" {if $manufacturer.manufacturer_id==$smarty.post.manufacturer} selected="selected"{/if}>{$manufacturer.m_name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="p_name" value="{$smarty.post.p_name}" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="p_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm..." required>{$smarty.post.p_description}</textarea>
                </td>
            </tr>
            <tr>
                <td>Đánh giá chi tiết</td>
                <td>
                    <textarea name="p_content" class="tinymce">{$smarty.post.p_content}</textarea>
                </td>
            </tr>
            <tr>
                <td>Giá</td>
                <td>
                    <input type="number" name="p_price" value="{$smarty.post.p_price}" class="form-control" placeholder="Nhập giá..." step="10000" min="0" max="100000000" required>
                </td>
            </tr>
            <tr id="features_add">
                <td><br>Tính năng nổi bật</td>
                <td style="text-align: left">
                    <br>
                    <div style="float: left; width: 35%; padding-left: 20px;">
                    {foreach from=$listFeatures key=k item="features"}
                        {if $k%2==0}
                            <label class="checkbox">
                                <input type="checkbox" name="features_{$features.features_id}" value="{$features.features_id}">
                                {$features.f_name}
                            </label>
                        {/if}
                    {/foreach}
                    </div>
                    <div style="float: left; width: 65%; padding-left: 20px;">
                        {foreach from=$listFeatures key=k item="features"}
                            {if $k%2!=0}
                                <label class="checkbox">
                                    <input type="checkbox" name="features_{$features.features_id}" value="{$features.features_id}">
                                    {$features.f_name}
                                </label>
                            {/if}
                        {/foreach}
                    </div>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh (4 hình)</td>
                <td style="text-align: left">
                    <br>
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <input type="file" id="img1" name="img1" required>
                                {*<div id="errImg1" style="text-align: left"><i style="color: red">Ảnh quá lớn hoặc sai định dạng</i></div>*}
                            </td>
                            <td>
                                <input type="file" name="img2" required>
                                {*<div id="errImg2"><i style="color: red">Ảnh quá lớn hoặc sai định dạng</i></div>*}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="img3" required>
                                {*<div id="errImg3"><i style="color: red">Ảnh quá lớn hoặc sai định dạng</i></div>*}
                            </td>
                            <td>
                                <input type="file" name="img4" required>
                                {*<div id="errImg4"><i style="color: red">Ảnh quá lớn hoặc sai định dạng</i></div>*}
                            </td>
                        </tr>
                    </table>
                    <div><i style="color: grey">Mẹo: Nên sử dụng ảnh vuông (Kích thước > 700x700 & dung lượng < 1mb)</i></div>
                </td>
            </tr>
            <tr>
                <td>Ưu tiên hiển thị</td>
                <td style="text-align: left"><input type="checkbox"  name="isHotProduct" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr>
                <td>Tình trạng (còn kinh doanh)</td>
                <td style="text-align: left"><input type="checkbox"  name="status" style="width: 25px; height: 25px;"></td>
            </tr>
            <tr style="height: 50px;">
                <td colspan="2">
                    <input type="submit" value="Thêm" class="btn btn-success">
                    <input type="reset" class="btn btn-danger">
                </td>
            </tr>
        </table>
    </form>
</div>
