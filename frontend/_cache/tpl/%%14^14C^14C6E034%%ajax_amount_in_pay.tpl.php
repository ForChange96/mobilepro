<?php /* Smarty version 2.6.13, created on 2018-02-19 15:21:54
         compiled from ajax_amount_in_pay.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'ajax_amount_in_pay.tpl', 3, false),)), $this); ?>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Thành tiền</label>
    <div class="col-xs-6 form-control-static"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Phí vận chuyển cố định</label>
    <div class="col-xs-6 form-control-static">5,000 VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Sản phẩm tính thuế</label>
    <div class="col-xs-6 form-control-static"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']/10)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</div>
</div>
<div class="row qc-totals">
    <label class="col-xs-6 control-label" >Tổng cộng </label>
    <div class="col-xs-6 form-control-static"><?php echo ((is_array($_tmp=$this->_tpl_vars['total']*11/10+5000)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 VNĐ</div>
</div>