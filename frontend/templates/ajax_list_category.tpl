{foreach from=$listCategory item=category}
    <a href="javascript: void (0)" onclick="load_list_product({$category.category_id})" class="list-group-item {if $selected==$category.category_id}active{/if}">{$category.category_name}</a>
{/foreach}