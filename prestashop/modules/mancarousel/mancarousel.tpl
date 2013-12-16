{*
* Man Carousel v0.4
* @author kik-off.com <info@kik-off.com>
*}
<!-- MODULE Man Carousel -->
{if isset($mancarousel) && $mancarousel}
<script type="text/javascript">
{literal}
$(document).ready(function(){
	$("#mancarousel").carouFredSel({
		debug : false,
		circular : {/literal}{$man_carousel_cir}{literal},
	    infinite : {/literal}{$man_carousel_inf}{literal},
	    align : "center",
		{/literal}{if $man_carousel_responsive == '1'}{literal}
		width : "100%",
		{/literal}{else}{literal}
		width : null,
		height : null,
		{/literal}{/if}{literal}
	    auto : {
    		play : {/literal}{$man_carousel_auto}{literal},
	    	timeoutDuration : {/literal}{$man_carousel_pause_time}{literal}
	    },
	    items : {
		    {/literal}{if $man_carousel_responsive == '1'}{literal}
			visible : null,
			{/literal}{else}{literal}
			visible : {/literal}{$man_carousel_display_items}{literal},
			{/literal}{/if}{literal}
			start : {/literal}{$man_carousel_rand}{literal},
			width : "{/literal}{$imageSize.width}{literal}",
			height : "{/literal}{$imageSize.height}{literal}"
		},
		scroll : {
			{/literal}{if $man_carousel_responsive == '0'}{literal}
			items : {/literal}{$man_carousel_scroll_items}{literal},
			{/literal}{/if}{literal}
			fx : "{/literal}{$man_carousel_fx}{literal}",
			duration : {/literal}{$man_carousel_fx_time}{literal},
			pauseOnHover : {/literal}{$man_carousel_mouseover}{literal}
		},
		prev : {
			button : "#mancarousel_prev",
			key : "left"
		},
		next : {
			button : "#mancarousel_next",
			key : "right"
		}
	}, {
		wrapper : {
		    element : "div",
		    classname : "mancarousel_wrapper"
	    },
	    classnames : {
		    selected : "selected",
		    hidden : "hidden",
		    disabled : "disabled",
		    paused : "paused",
		    stopped : "stopped"
	    }
    });
});
{/literal}
</script>
<div class="clearfix_mancarousel"></div>
<div class="image_carousel{if $man_carousel_responsive == '1'} mancarousel_responsive{/if}">
	<div id="mancarousel">
		{foreach $mancarousel as $man}
		    <a href="{$link->getmanufacturerLink($man.id_manufacturer, $man.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$man.name|escape:'htmlall':'UTF-8'}" class="lnk_img">
				<img src="{$img_manu_dir}{$man.id_manufacturer|escape:'htmlall':'UTF-8'}-{$imageName}.jpg" alt="{$man.name|escape:'htmlall':'UTF-8'}" width="{$imageSize.width}" height="{$imageSize.height}" />
			</a>
		{/foreach}
	</div>
	<div class="clearfix_mancarousel"></div>
	<a class="prev" id="mancarousel_prev" href="#" style="top: {math equation="height / division + px" height=$imageSize.height px=8 division=2}px;"><span>{l s='prev' mod='mancarousel'}</span></a>
	<a class="next" id="mancarousel_next" href="#" style="top: {math equation="height / division + px" height=$imageSize.height px=8 division=2}px;"><span>{l s='next' mod='mancarousel'}</span></a>
</div>
{/if}
<!-- /MODULE Man Carousel -->