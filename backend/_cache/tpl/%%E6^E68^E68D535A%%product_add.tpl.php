<?php /* Smarty version 2.6.13, created on 2018-01-29 05:23:27
         compiled from product_add.tpl */ ?>
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
                    <select class="form-control" name="category" onchange="show_hide_features(<?php echo $this->_tpl_vars['category']['category_name']; ?>
)">
                        <?php $_from = $this->_tpl_vars['listCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                            <option value="<?php echo $this->_tpl_vars['category']['category_id']; ?>
" <?php if ($this->_tpl_vars['category']['category_id'] == $_POST['category']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['category']['category_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hãng sản xuất</td>
                <td>
                    <select class="form-control" name="manufacturer">
                        <?php $_from = $this->_tpl_vars['listManufacturer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['manufacturer']):
?>
                            <option value="<?php echo $this->_tpl_vars['manufacturer']['manufacturer_id']; ?>
" <?php if ($this->_tpl_vars['manufacturer']['manufacturer_id'] == $_POST['manufacturer']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['manufacturer']['m_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="p_name" value="<?php echo $_POST['p_name']; ?>
" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="p_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm..." required><?php echo $_POST['p_description']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Đánh giá chi tiết</td>
                <td>
                    <textarea name="p_content" class="tinymce"><?php echo $_POST['p_content']; ?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Giá</td>
                <td>
                    <input type="number" name="p_price" value="<?php echo $_POST['p_price']; ?>
" class="form-control" placeholder="Nhập giá..." step="10000" min="0" max="100000000" required>
                </td>
            </tr>
            <tr id="features_add">
                <td><br>Tính năng nổi bật</td>
                <td style="text-align: left">
                    <br>
                    <div style="float: left; width: 35%; padding-left: 20px;">
                    <?php $_from = $this->_tpl_vars['listFeatures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['features']):
?>
                        <?php if ($this->_tpl_vars['k']%2 == 0): ?>
                            <label class="checkbox">
                                <input type="checkbox" name="features_<?php echo $this->_tpl_vars['features']['features_id']; ?>
" value="<?php echo $this->_tpl_vars['features']['features_id']; ?>
">
                                <?php echo $this->_tpl_vars['features']['f_name']; ?>

                            </label>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <div style="float: left; width: 65%; padding-left: 20px;">
                        <?php $_from = $this->_tpl_vars['listFeatures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['features']):
?>
                            <?php if ($this->_tpl_vars['k']%2 != 0): ?>
                                <label class="checkbox">
                                    <input type="checkbox" name="features_<?php echo $this->_tpl_vars['features']['features_id']; ?>
" value="<?php echo $this->_tpl_vars['features']['features_id']; ?>
">
                                    <?php echo $this->_tpl_vars['features']['f_name']; ?>

                                </label>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
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
                                                            </td>
                            <td>
                                <input type="file" name="img2" required>
                                                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="img3" required>
                                                            </td>
                            <td>
                                <input type="file" name="img4" required>
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