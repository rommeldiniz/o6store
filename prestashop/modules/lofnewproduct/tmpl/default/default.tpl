<div class="clearfix clear clr"></div>
<div class="lof-featured {$theme}">
	<section class="featured-widget">
		<header>
        		<h3 class="featured-title">{l s='NUEVOS PRODUCTOS' mod='lofnewproduct'}
                	<hr style="width:520px; position:absolute; margin-left:145px; margin-top:-7px !important;" class="art"/>
                	<hr style="width:520px; position:absolute; margin-left:145px; margin-top:-10px !important;" class="art"/>
                </h3>
                
		</header>
		<div class="list-featured responsive">
			<ul id="loffeatured-{$moduleId}" class="featured-news clearfix">
				{foreach from=$listNews item=item}     
				<li>
					<article>
						<div class="featured-item box-hover clearfix">
							<div class="entry-content">
								<div class="video-thumb">
									<a href="{$item.link}" title="{$item.name}" class="product_image" target="{$target}">
									<img class="responsive-img" src="{$item.mainImge}" alt="{$item.name}"/>
									</a>
								</div>
								{if $show_title eq '1'}
								<h4 class="entry-title">
									<a href="{$item.link}" target="{$target}" title="{$item.name}">{$item.name}</a>
								</h4>
								{/if}
								
								{if !$PS_CATALOG_MODE && $show_price eq '1' AND !isset($restricted_country_mode) && $item.show_price}<div class="entry-price">{$item.price}</div>{/if}
								{if $show_desc eq '1'}<p>{$item.description}</p>{/if}

								{if ($item.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $item.available_for_order AND !isset($restricted_country_mode) AND $item.minimal_quantity == 1 AND $item.customizable != 2 AND !$PS_CATALOG_MODE}
									{if (($item.quantity > 0 OR $item.allow_oosp))}
									
                                    <div class="lof-main-puplic">
                                   	<span id="bolsa" style="margin-left:-18px !important"></span>
										<a class="lof-add-cart ajax_add_to_cart_button" rel="ajax_id_product_{$item.id_product}" href="{$site_url}cart.php?add&amp;id_product={$item.id_product}&amp;token={$token}"><span>{l s='Agregar a la bolsa' mod='loffeatured'}</span></a>
									</div>
									{else}
                                    	<div id="bolsa" class="lof-main-puplic"><a><span class="lof-add-cart">{l s='Agregar a la bolsa' mod='loffeatured'}</span></a></div>
									{/if}
								{/if}
							</div>
						</div>
					</article>				
				</li>
				{/foreach}
			</ul>
			{if $show_button eq '1'}
			<div class="featured-nav">
				<a id="loffprev-{$moduleId}" class="prev" href="#">&nbsp;</a>
				<a id="loffnext-{$moduleId}" class="next" href="#">&nbsp;</a>
			</div>
			{/if}
			{if $show_pager eq '1'}<div id="loffpager-{$moduleId}" class="lof-pager"></div>{/if}
		</div>
	</section>
</div>
 
  <script type="text/javascript">
// <![CDATA[
			$('#loffeatured-{$moduleId}').carouFredSel({ldelim}
				responsive:true,
				prev: '#loffprev-{$moduleId}',
				next: '#loffnext-{$moduleId}',
				pagination: "#loffpager-{$moduleId}",
				auto: {$auto_play},
				width: {$slide_width},
				height: {$slide_height},
				scroll: {$scroll_items},
				items:{ldelim}
					width:200,
					visible:{ldelim}
						min:1,
						max:{$limit_cols}
					{rdelim}
				{rdelim}
			{rdelim});	
		 
// ]]>

</script>
