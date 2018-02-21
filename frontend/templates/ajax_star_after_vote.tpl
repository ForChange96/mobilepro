Click để vote số sao:&nbsp;
<span class="fa fa-stack pointer" onclick="do_vote({$product_id},1,{$num_star_voted})">
                                    {if $num_star_voted<1}
                                        {*Nếu num_star_voted=-1 (Chưa tồn tại đánh giá) thì cho câu lệnh sql là insert, ngược lại sql=update*}
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    {else}
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    {/if}
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote({$product_id},2,{$num_star_voted})">
                                    {if $num_star_voted<2}
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    {else}
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    {/if}
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote({$product_id},3,{$num_star_voted})">
                                    {if $num_star_voted<3}
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    {else}
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    {/if}
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote({$product_id},4,{$num_star_voted})">
                                    {if $num_star_voted<4}
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    {else}
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    {/if}
                                </span>
<span class="fa fa-stack pointer" onclick="do_vote({$product_id},5,{$num_star_voted})">
                                    {if $num_star_voted<5}
                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                    {else}
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    {/if}
                                </span>