<?php /* Smarty version 2.6.13, created on 2018-02-28 09:00:24
         compiled from ajax_star_after_vote.tpl */ ?>
Click để vote số sao:&nbsp;
<span class="fa fa-stack pointer" onclick="do_vote(<?php echo $this->_tpl_vars['product_id']; ?>
,1,<?php echo $this->_tpl_vars['num_star_voted']; ?>
)">
                                    <?php if ($this->_tpl_vars['num_star_voted'] < 1): ?>
                                                                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    <?php endif; ?>
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote(<?php echo $this->_tpl_vars['product_id']; ?>
,2,<?php echo $this->_tpl_vars['num_star_voted']; ?>
)">
                                    <?php if ($this->_tpl_vars['num_star_voted'] < 2): ?>
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    <?php endif; ?>
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote(<?php echo $this->_tpl_vars['product_id']; ?>
,3,<?php echo $this->_tpl_vars['num_star_voted']; ?>
)">
                                    <?php if ($this->_tpl_vars['num_star_voted'] < 3): ?>
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    <?php endif; ?>
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote(<?php echo $this->_tpl_vars['product_id']; ?>
,4,<?php echo $this->_tpl_vars['num_star_voted']; ?>
)">
                                    <?php if ($this->_tpl_vars['num_star_voted'] < 4): ?>
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    <?php endif; ?>
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote(<?php echo $this->_tpl_vars['product_id']; ?>
,5,<?php echo $this->_tpl_vars['num_star_voted']; ?>
)">
                                    <?php if ($this->_tpl_vars['num_star_voted'] < 5): ?>
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    <?php endif; ?>
                                </span>