<?php
/**
* Man Carousel v0.4
* @author kik-off.com <info@kik-off.com>
**/

if (!defined('_PS_VERSION_'))
    exit;

class ManCarousel extends Module
{
    private $_html = '';
	private $user_groups;

	public function __construct()
    {
        $this->name = 'mancarousel';
        $this->tab = 'front_office_features';
        $this->version = 0.4;
        $this->author = 'www.kik-off.com';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Man Carousel');
        $this->description = $this->l('Smooth manufacturer carousel.');
    }

    public function install()
    {
        Configuration::updateValue('MAN_CAROUSEL_HOOK', 2);
		Configuration::updateValue('MAN_CAROUSEL_IMAGE_TYPE', 'medium');
		Configuration::updateValue('MAN_CAROUSEL_DISPLAY_ITEMS', 8);
		Configuration::updateValue('MAN_CAROUSEL_SCROLL_ITEMS', 8);
		Configuration::updateValue('MAN_CAROUSEL_RESPONSIVE', 0);
		Configuration::updateValue('MAN_CAROUSEL_PAUSE_TIME', 5000);
		Configuration::updateValue('MAN_CAROUSEL_CIRCULAR', 1);
		Configuration::updateValue('MAN_CAROUSEL_INFINITE', 1);
		Configuration::updateValue('MAN_CAROUSEL_MOUSEOVER_PAUSE', 1);
		Configuration::updateValue('MAN_CAROUSEL_AUTO_START', 1);
		Configuration::updateValue('MAN_CAROUSEL_RANDOM', 1);
		Configuration::updateValue('MAN_CAROUSEL_FX', 'none');
		Configuration::updateValue('MAN_CAROUSEL_FX_TIME', 500);
		Configuration::updateValue('MAN_CAROUSEL_CACHE', 31536000);

		if (parent::install() == false
		    OR !$this->registerHook('header')
			OR !$this->registerHook('top')
			OR !$this->registerHook('home')
			OR !$this->registerHook('rightcolumn')
			OR !$this->registerHook('footer')
		)
            return false;
        return true;
    }

	public function uninstall()
    {
        if (parent::uninstall() == false ||
		    !Configuration::deleteByName('MAN_CAROUSEL_HOOK') ||
			!Configuration::deleteByName('MAN_CAROUSEL_IMAGE_TYPE') ||
			!Configuration::deleteByName('MAN_CAROUSEL_DISPLAY_ITEMS') ||
			!Configuration::deleteByName('MAN_CAROUSEL_SCROLL_ITEMS') ||
			!Configuration::deleteByName('MAN_CAROUSEL_RESPONSIVE') ||
			!Configuration::deleteByName('MAN_CAROUSEL_PAUSE_TIME') ||
			!Configuration::deleteByName('MAN_CAROUSEL_CIRCULAR') ||
			!Configuration::deleteByName('MAN_CAROUSEL_INFINITE') ||
			!Configuration::deleteByName('MAN_CAROUSEL_MOUSEOVER_PAUSE') ||
			!Configuration::deleteByName('MAN_CAROUSEL_AUTO_START') ||
			!Configuration::deleteByName('MAN_CAROUSEL_RANDOM') ||
			!Configuration::deleteByName('MAN_CAROUSEL_FX') ||
			!Configuration::deleteByName('MAN_CAROUSEL_FX_TIME')
		)
            return false;
		return true;
    }

	public function getContent()
	{
		if (Tools::isSubmit('manCarouselFormSubmit'))
		{
		    $man_carousel_hook = Tools::getValue('man_carousel_hook');
			$man_carousel_image_type = Tools::getValue('man_carousel_image_type');
			$man_carousel_display_items = Tools::getValue('man_carousel_display_items');
			$man_carousel_scroll_items = Tools::getValue('man_carousel_scroll_items');
			$man_carousel_responsive = Tools::getValue('man_carousel_responsive');
			$man_carousel_pause_time = Tools::getValue('man_carousel_pause_time');
			$man_carousel_auto_start = Tools::getValue('man_carousel_auto_start');
			$man_carousel_random = Tools::getValue('man_carousel_random');
			$man_carousel_circular = Tools::getValue('man_carousel_circular');
			$man_carousel_infinite = Tools::getValue('man_carousel_infinite');
			$man_carousel_mouseover_pause = Tools::getValue('man_carousel_mouseover_pause');
			$man_carousel_fx = Tools::getValue('man_carousel_fx');
			$man_carousel_fx_time = Tools::getValue('man_carousel_fx_time');

			Configuration::updateValue('MAN_CAROUSEL_HOOK', $man_carousel_hook);
			Configuration::updateValue('MAN_CAROUSEL_IMAGE_TYPE', $man_carousel_image_type);
			Configuration::updateValue('MAN_CAROUSEL_DISPLAY_ITEMS', $man_carousel_display_items);
			Configuration::updateValue('MAN_CAROUSEL_SCROLL_ITEMS', $man_carousel_scroll_items);
			Configuration::updateValue('MAN_CAROUSEL_RESPONSIVE', $man_carousel_responsive);
			Configuration::updateValue('MAN_CAROUSEL_PAUSE_TIME', $man_carousel_pause_time);
			Configuration::updateValue('MAN_CAROUSEL_AUTO_START', $man_carousel_auto_start);
			Configuration::updateValue('MAN_CAROUSEL_RANDOM', $man_carousel_random);
			Configuration::updateValue('MAN_CAROUSEL_CIRCULAR', $man_carousel_circular);
			Configuration::updateValue('MAN_CAROUSEL_INFINITE', $man_carousel_infinite);
			Configuration::updateValue('MAN_CAROUSEL_MOUSEOVER_PAUSE', $man_carousel_mouseover_pause);
			Configuration::updateValue('MAN_CAROUSEL_FX', $man_carousel_fx);
			Configuration::updateValue('MAN_CAROUSEL_FX_TIME', $man_carousel_fx_time);
			
			if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
        	{
			    $files = glob('../tools/'.(_PS_FORCE_SMARTY_2_ ? 'smarty_v2' : 'smarty').'/cache/*.mancarousel.tpl.php',GLOB_BRACE);
			}
			elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
			{
			    $files = glob('../cache/smarty/cache/mancarousel/*/*/*/*/*/*/*/*.mancarousel.tpl.php',GLOB_BRACE);
			}
			elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
        	{
			    $files = glob('../cache/smarty/cache/*.mancarousel.tpl.php',GLOB_BRACE);
			}

			if($files)
			{
			    $num_files = count($files);
				foreach($files as $file)
				{
				    if(is_file($file))
                        unlink($file);
				}
			}

			$this->_html .= '<div class="conf">'.$this->l('Settings updated').'</div>';
	    }

		if (Tools::isSubmit('cacheTimeFormSubmit'))
		{
			$mancarousel_cache_time = Tools::getValue('mancarousel_cache_time');

			Configuration::updateValue('MAN_CAROUSEL_CACHE', $mancarousel_cache_time);

			$this->_html .= '<div class="conf">'.$this->l('Cache time updated').'</div>';
	    }

		if (Tools::isSubmit('flushCacheFormSubmit'))
		{
			if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
        	{
			    $files = glob('../tools/'.(_PS_FORCE_SMARTY_2_ ? 'smarty_v2' : 'smarty').'/cache/*.mancarousel.tpl.php',GLOB_BRACE);
			}
			elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
			{
			    $files = glob('../cache/smarty/cache/mancarousel/*/*/*/*/*/*/*/*.mancarousel.tpl.php',GLOB_BRACE);
			}
			elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
        	{
			    $files = glob('../cache/smarty/cache/*.mancarousel.tpl.php',GLOB_BRACE);
			}

			if($files)
			{
			    $num_files = count($files);
				foreach($files as $file)
				{
				    if(is_file($file))
                        unlink($file);
				}

				$this->_html .=  '<div class="conf">'.$this->l('Cache flushed!').'<br/>'. $this->l('Removed items').' : '.$num_files.'<br/>';

					foreach($files as $index => $file)
				    {
				        $this->_html .= ($index+1).' "'.$file.'"<br/>';
				    }

				$this->_html .=  '</div>';
			}
			else{
			    $this->_html .=  $this->displayConfirmation($this->l('Files not found.'));
			}
	    }

		$this->_html .= '<h2>'.$this->displayName.'</h2>';

		$this->_html .= '
		<style type="text/css">
		    #imprint{width: 100%;text-align: right;}
		    #imprint img {float: left;}
		</style>';

		$images = ImageType::getImagesTypes('manufacturers');

		$this->_html .= '
		<fieldset>
			<legend><img src="'.$this->_path.'logo.gif" alt="" />'.$this->l('Settings').'</legend><br/>
			<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
			    <label>'.$this->l('Display in').':</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_hook" id="man_carousel_hook_0" value="0" '.((int)Configuration::get('MAN_CAROUSEL_HOOK')== 0 ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_hook_0"><b>'.$this->l('Top').'</b></label><br/>
					<input type="radio" name="man_carousel_hook" id="man_carousel_hook_0" value="0" '.((int)Configuration::get('MAN_CAROUSEL_HOOK')== 0 ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_hook_3"><b>'.$this->l('RightColumn').'</b></label><br/>
					<input type="radio" name="man_carousel_hook" id="man_carousel_hook_1" value="1" '.((int)Configuration::get('MAN_CAROUSEL_HOOK')== 1 ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_hook_1"><b>'.$this->l('Home').'</b></label><br/>
					<input type="radio" name="man_carousel_hook" id="man_carousel_hook_2" value="2" '.((int)Configuration::get('MAN_CAROUSEL_HOOK')== 2 ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_hook_2"><b>'.$this->l('Footer').'</b></label>
					<p class="preference_description clear">'.$this->l('Select the hook where you want to display the block').'.</p>
				</div>
				<label>'.$this->l('Select image type').'</label>
			    <div class="margin-form">
			        <select id="man_carousel_image_type" name="man_carousel_image_type">';
		        foreach ($images AS $key => $image)
		        {
				    $this->_html .= '<option value="' . $image['name'] . '"'.(Configuration::get('MAN_CAROUSEL_IMAGE_TYPE') == $image['name'] ? ' selected="selected" class="selected"' : '').'>' . $image['name'] . ' (' . $image['width'] . 'x' . $image['height'] . ')</option>';
		        }
		        $this->_html .= '
				    </select>
				</div>
				<label>'.$this->l('Responsive').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_responsive" id="man_carousel_responsive_on" value="1" '.(Tools::getValue('man_carousel_responsive', Configuration::get('MAN_CAROUSEL_RESPONSIVE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_responsive_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_responsive" id="man_carousel_responsive_off" value="0" '.(!Tools::getValue('man_carousel_responsive', Configuration::get('MAN_CAROUSEL_RESPONSIVE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_responsive_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
					<p class="preference_description clear">'.$this->l('If enabled, the visible and scroll items will ignored').'.</p>
				</div>
			    <label>'.$this->l('Visible items').'</label>
				<div class="margin-form">
					<input type="text" name="man_carousel_display_items" id="man_carousel_display_items" size="3" value="'.Tools::getValue('man_carousel_display_items', Configuration::get('MAN_CAROUSEL_DISPLAY_ITEMS')).'" />
				</div>
				<label>'.$this->l('Scroll items').'</label>
				<div class="margin-form">
					<input type="text" name="man_carousel_scroll_items" id="man_carousel_scroll_items" size="3" value="'.Tools::getValue('man_carousel_scroll_items', Configuration::get('MAN_CAROUSEL_SCROLL_ITEMS')).'" />
				</div>
				<label>'.$this->l('Pause').'</label>
				<div class="margin-form">
					<input type="text" name="man_carousel_pause_time" id="man_carousel_pause_time" size="3" value="'.Tools::getValue('man_carousel_pause_time', Configuration::get('MAN_CAROUSEL_PAUSE_TIME')).'" />
					<p class="preference_description clear">'.$this->l('The amount of milliseconds the carousel will pause').'.</p>
				</div>
				<label>'.$this->l('Auto start').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_auto_start" id="man_carousel_auto_start_on" value="1" '.(Tools::getValue('man_carousel_auto_start', Configuration::get('MAN_CAROUSEL_AUTO_START')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_auto_start_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_auto_start" id="man_carousel_auto_start_off" value="0" '.(!Tools::getValue('man_carousel_auto_start', Configuration::get('MAN_CAROUSEL_AUTO_START')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_auto_start_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
				</div>
				<label>'.$this->l('Random').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_random" id="man_carousel_random_on" value="1" '.(Tools::getValue('man_carousel_random', Configuration::get('MAN_CAROUSEL_RANDOM')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_random_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_random" id="man_carousel_random_off" value="0" '.(!Tools::getValue('man_carousel_random', Configuration::get('MAN_CAROUSEL_RANDOM')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_random_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
				</div>
				<label>'.$this->l('Circular').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_circular" id="man_carousel_circular_on" value="1" '.(Tools::getValue('man_carousel_circular', Configuration::get('MAN_CAROUSEL_CIRCULAR')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_circular_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_circular" id="man_carousel_circular_off" value="0" '.(!Tools::getValue('man_carousel_circular', Configuration::get('MAN_CAROUSEL_CIRCULAR')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_circular_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
					<p class="preference_description clear">'.$this->l('Determines whether the carousel should be circular').'.</p>
				</div>
				<label>'.$this->l('Infinite').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_infinite" id="man_carousel_infinite_on" value="1" '.(Tools::getValue('man_carousel_infinite', Configuration::get('MAN_CAROUSEL_INFINITE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_infinite_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_infinite" id="man_carousel_infinite_off" value="0" '.(!Tools::getValue('man_carousel_infinite', Configuration::get('MAN_CAROUSEL_INFINITE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_infinite_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
					<p class="preference_description clear">'.$this->l('Determines whether the carousel should be infinite. Note: It is possible to create a non-circular, infinite carousel, but it is not possible to create a circular, non-infinite carousel').'.</p>
				</div>
				<label>'.$this->l('Mouseover pause').'</label>
				<div class="margin-form">
					<input type="radio" name="man_carousel_mouseover_pause" id="man_carousel_mouseover_on" value="1" '.(Tools::getValue('man_carousel_mouseover_pause', Configuration::get('MAN_CAROUSEL_MOUSEOVER_PAUSE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_mouseover_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="man_carousel_mouseover_pause" id="man_carousel_mouseover_off" value="0" '.(!Tools::getValue('man_carousel_mouseover_pause', Configuration::get('MAN_CAROUSEL_MOUSEOVER_PAUSE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="man_carousel_mouseover_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
				</div>
				<label>'.$this->l('Transition').'</label>
				<div class="margin-form">
					<select name="man_carousel_fx" style="width:100px;" />
					    <option value="none"'.(Configuration::get('MAN_CAROUSEL_FX') == 'none' ? ' selected="selected"' : '').'>'.$this->l('None').'</option>
					    <option value="scroll"'.(Configuration::get('MAN_CAROUSEL_FX') == 'scroll' ? ' selected="selected"' : '').'>'.$this->l('Scroll').'</option>
						<option value="directscroll"'.(Configuration::get('MAN_CAROUSEL_FX') == 'directscroll' ? ' selected="selected"' : '').'>'.$this->l('Direct scroll').'</option>
						<option value="fade"'.(Configuration::get('MAN_CAROUSEL_FX') == 'fade' ? ' selected="selected"' : '').'>'.$this->l('Fade').'</option>
						<option value="crossfade"'.(Configuration::get('MAN_CAROUSEL_FX') == 'crossfade' ? ' selected="selected"' : '').'>'.$this->l('Crossfade').'</option>
						<option value="cover"'.(Configuration::get('MAN_CAROUSEL_FX') == 'cover' ? ' selected="selected"' : '').'>'.$this->l('Cover').'</option>
						<option value="cover-fade"'.(Configuration::get('MAN_CAROUSEL_FX') == 'cover-fade' ? ' selected="selected"' : '').'>'.$this->l('Cover fade').'</option>
						<option value="uncover"'.(Configuration::get('MAN_CAROUSEL_FX') == 'uncover' ? ' selected="selected"' : '').'>'.$this->l('Uncover').'</option>
						<option value="uncover-fade"'.(Configuration::get('MAN_CAROUSEL_FX') == 'uncover-fade' ? ' selected="selected"' : '').'>'.$this->l('Uncover fade').'</option>
					</select>
				</div>
				<label>'.$this->l('Duration').'</label>
				<div class="margin-form">
					<input type="text" name="man_carousel_fx_time" id="man_carousel_fx_time" size="3" value="'.Tools::getValue('man_carousel_fx_time', Configuration::get('MAN_CAROUSEL_FX_TIME')).'" />
					<p class="preference_description clear">'.$this->l('Duration of the transition in milliseconds').'.</p>
				</div>
				<div class="margin-form">
				    <input class="button" name="manCarouselFormSubmit" type="submit" value="'.$this->l('Save').'" />
				</div>
		</form></fieldset><br/>';

		$this->displayCacheTools();

		$this->_html .= '<fieldset><div id="imprint"><a href="http://www.kik-off.com" target="_blank" title="http://www.kik-off.com"><img src="'.$this->_path.'img/logo_kik_off.gif" alt="" /></a>'.$this->l('Module by').': <a href="http://www.kik-off.com" target="_blank" title="http://www.kik-off.com">www.kik-off.com</a>, <a href="mailto:info@kik-off.com">info@kik-off.com</a></div></fieldset>';

		return $this->_html;
	}

	public function displayCacheTools()
	{	
		$hide_form = '';
		if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
       	{
		    $files = glob('../tools/'.(_PS_FORCE_SMARTY_2_ ? 'smarty_v2' : 'smarty').'/cache/*.mancarousel.tpl.php',GLOB_BRACE);
		}
		elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
		{
			$files = glob('../cache/smarty/cache/mancarousel/*/*/*/*/*/*/*/*.mancarousel.tpl.php',GLOB_BRACE);
			$hide_form = 'style="display: none;"';
		}
		elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
        {
			$files = glob('../cache/smarty/cache/*.mancarousel.tpl.php',GLOB_BRACE);
		}

		$this->_html .= '
		<fieldset>
		<legend><img src="'.$this->_path.'logo.gif" alt="" />'.$this->l('Cache').'</legend><br/>
		<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post" '.$hide_form.'>
			<label>'.$this->l('Cache time').'</label>
            <div class="margin-form">
				<input type="text" name="mancarousel_cache_time" id="mancarousel_cache_time" value="'.Configuration::get('MAN_CAROUSEL_CACHE').'" />
				<p class="preference_description clear">'.$this->l('Do not change unless you know it is').'.</p>
				<button id="cacheTimeFormSubmit" class="button" name="cacheTimeFormSubmit">'.$this->l('Save').'</button>
			</div>
			<br/>
		</form>
		<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
			<label>'.$this->l('Flush cache').'</label>
            <div class="margin-form">
				<button id="flushCacheFormSubmit" class="button" name="flushCacheFormSubmit">'.$this->l('OK').'</button>
			</div>
		</form>
		<label>'.$this->l('Cached files').'</label>
		<ul class="margin-form">';
		if ($files)
		{
    	    foreach($files as $index => $file)
			{
				if ($size = filesize($file))
                {
                    $fileSize = round(($size / 1024), 2).' KB';
                }
	    		$this->_html .= '<li>'.($index+1).' "'.$file.'" <b>'.$fileSize.' '.date ("F d Y H:i:s.", filemtime($file)).'</b></li>';
		    }
		}
		else
		{
		    $this->_html .= '<li>'.$this->l('Cache is empty').'</li>';
		}
		$this->_html .= '</ul>
		</fieldset><br/>';
	}

	public function hookHeader( $params )
    {
		if(_PS_VERSION_ > '1.4.0.0' && _PS_VERSION_ < '1.5.0.0')
        {
		    Tools::addCSS($this->_path.'css/'.$this->name.'.css', 'all');
			Tools::addJS($this->_path.'js/jquery.carouFredSel-6.1.0-packed.js');
		}
		if(_PS_VERSION_ > '1.5.0.0')
		{
		    $this->context->controller->addCSS(($this->_path).'css/'.($this->name).'.css', 'all');
			$this->context->controller->addJS(($this->_path).'js/jquery.carouFredSel-6.1.0-packed.js');
		}
    }

	public function hookFooter( $params )
    {
        if(Configuration::get('MAN_CAROUSEL_HOOK') == 2)
		{
			global $smarty, $cookie;

			$man_carousel_image_type = Configuration::get('MAN_CAROUSEL_IMAGE_TYPE');

			if(_PS_VERSION_ > '1.4.0.0' && _PS_VERSION_ < '1.5.0.0')
    	    {
			    $mancarousel = Manufacturer::getManufacturers(false, $cookie->id_lang, true, false, false, false);
			}
			if(_PS_VERSION_ > '1.5.0.0')
			{
		    	$id_current_shop_group = Shop::getContextShopGroupID();
			    $mancarousel = Manufacturer::getManufacturers(true, $this->context->language->id, true, false, false, false, $id_current_shop_group);
			}

			$man_carousel_display_items = Configuration::get('MAN_CAROUSEL_DISPLAY_ITEMS');
			$man_carousel_scroll_items = Configuration::get('MAN_CAROUSEL_SCROLL_ITEMS');
			$man_carousel_pause_time = Configuration::get('MAN_CAROUSEL_PAUSE_TIME');
			$man_carousel_responsive = Configuration::get('MAN_CAROUSEL_RESPONSIVE');
			$man_carousel_auto_start = Configuration::get('MAN_CAROUSEL_AUTO_START');
			$man_carousel_random = Configuration::get('MAN_CAROUSEL_RANDOM');
			$man_carousel_circular = Configuration::get('MAN_CAROUSEL_CIRCULAR');
			$man_carousel_infinite = Configuration::get('MAN_CAROUSEL_INFINITE');
			$man_carousel_mouseover_pause = Configuration::get('MAN_CAROUSEL_MOUSEOVER_PAUSE');
			$man_carousel_fx = Configuration::get('MAN_CAROUSEL_FX');
			$man_carousel_fx_time = Configuration::get('MAN_CAROUSEL_FX_TIME');

		    if($man_carousel_circular == 1){
		    	$man_carousel_cir = 'true';
			}
			elseif($man_carousel_circular == 0){
			    $man_carousel_cir = 'false';
			}
			if($man_carousel_infinite == 1){
		    	$man_carousel_inf = 'true';
			}
			elseif($man_carousel_infinite == 0){
			    $man_carousel_inf = 'false';
			}
			if($man_carousel_auto_start == 1){
			    $man_carousel_auto = 'true';
			}
			elseif($man_carousel_auto_start == 0){
			    $man_carousel_auto = 'false';
			}
			if($man_carousel_mouseover_pause == 1){
			    $man_carousel_mouseover = 'true';
			}
			elseif($man_carousel_mouseover_pause == 0){
			    $man_carousel_mouseover = 'false';
			}
			if($man_carousel_random == 1){
			    $man_carousel_rand = '"random"';
			}
			else{
			    $man_carousel_rand = 0;
			}

        	if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
        	{
	        	$groups = $id_customer ? implode(', ', Customer::getGroupsStatic($id_customer)) : _PS_DEFAULT_CUSTOMER_GROUP_;
				$smartyCacheId = 'mancarousel|'.$groups.'_'.$id_lang;

				$smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();
		    	if (!$this->isCached('mancarousel.tpl', $smartyCacheId))
		    	{
			    	$smarty->assign(array(
					    'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
					    'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
				    	'man_carousel_fx_time' => $man_carousel_fx_time,
						'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
			        ));
				}
				$html = $this->display(__FILE__, 'mancarousel.tpl', $smartyCacheId);
		    	Tools::restoreCacheSettings();
		    	return $html;
			}
	    	elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
			{
                if (!$this->isCached('mancarousel.tpl', $this->getCacheId()))
				{
				   $this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
				}
		        return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
			}
			elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
			{
		    	$this->user_groups =  ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
		    	$smarty_cache_id = 'mancarousel-'.(int)$this->context->shop->id.'-'.implode(', ',$this->user_groups).'-'.(int)$this->context->language->id;
		    	$this->context->smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();

			    if (!$this->isCached('mancarousel.tpl', $smarty_cache_id))
				{
					$this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
			    }

			    $html = $this->display(__FILE__, 'mancarousel.tpl', $smarty_cache_id);
			    Tools::restoreCacheSettings();
			    return $html;
			}
		}
    }

	public function hookHome( $params )
    {
	    if(Configuration::get('MAN_CAROUSEL_HOOK') == 1)
		{
			global $smarty, $cookie;

			$man_carousel_image_type = Configuration::get('MAN_CAROUSEL_IMAGE_TYPE');

			if(_PS_VERSION_ > '1.4.0.0' && _PS_VERSION_ < '1.5.0.0')
    	    {
			    $mancarousel = Manufacturer::getManufacturers(false, $cookie->id_lang, true, false, false, false);
			}
			if(_PS_VERSION_ > '1.5.0.0')
			{
		    	$id_current_shop_group = Shop::getContextShopGroupID();
			    $mancarousel = Manufacturer::getManufacturers(true, $this->context->language->id, true, false, false, false, $id_current_shop_group);
			}

			$man_carousel_display_items = Configuration::get('MAN_CAROUSEL_DISPLAY_ITEMS');
			$man_carousel_scroll_items = Configuration::get('MAN_CAROUSEL_SCROLL_ITEMS');
			$man_carousel_pause_time = Configuration::get('MAN_CAROUSEL_PAUSE_TIME');
			$man_carousel_responsive = Configuration::get('MAN_CAROUSEL_RESPONSIVE');
			$man_carousel_auto_start = Configuration::get('MAN_CAROUSEL_AUTO_START');
			$man_carousel_random = Configuration::get('MAN_CAROUSEL_RANDOM');
			$man_carousel_circular = Configuration::get('MAN_CAROUSEL_CIRCULAR');
			$man_carousel_infinite = Configuration::get('MAN_CAROUSEL_INFINITE');
			$man_carousel_mouseover_pause = Configuration::get('MAN_CAROUSEL_MOUSEOVER_PAUSE');
			$man_carousel_fx = Configuration::get('MAN_CAROUSEL_FX');
			$man_carousel_fx_time = Configuration::get('MAN_CAROUSEL_FX_TIME');

		    if($man_carousel_circular == 1){
		    	$man_carousel_cir = 'true';
			}
			elseif($man_carousel_circular == 0){
			    $man_carousel_cir = 'false';
			}
			if($man_carousel_infinite == 1){
		    	$man_carousel_inf = 'true';
			}
			elseif($man_carousel_infinite == 0){
			    $man_carousel_inf = 'false';
			}
			if($man_carousel_auto_start == 1){
			    $man_carousel_auto = 'true';
			}
			elseif($man_carousel_auto_start == 0){
			    $man_carousel_auto = 'false';
			}
			if($man_carousel_mouseover_pause == 1){
			    $man_carousel_mouseover = 'true';
			}
			elseif($man_carousel_mouseover_pause == 0){
			    $man_carousel_mouseover = 'false';
			}
			if($man_carousel_random == 1){
			    $man_carousel_rand = '"random"';
			}
			else{
			    $man_carousel_rand = 0;
			}

        	if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
        	{
	        	$groups = $id_customer ? implode(', ', Customer::getGroupsStatic($id_customer)) : _PS_DEFAULT_CUSTOMER_GROUP_;
				$smartyCacheId = 'mancarousel|'.$groups.'_'.$id_lang;

				$smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();
		    	if (!$this->isCached('mancarousel.tpl', $smartyCacheId))
		    	{
			    	$smarty->assign(array(
					    'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
					    'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
				    	'man_carousel_fx_time' => $man_carousel_fx_time,
						'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
			        ));
				}
				$html = $this->display(__FILE__, 'mancarousel.tpl', $smartyCacheId);
		    	Tools::restoreCacheSettings();
		    	return $html;
			}
	    	elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
			{
                if (!$this->isCached('mancarousel.tpl', $this->getCacheId()))
				{
				   $this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
				}
		        return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
			}
			elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
			{
		    	$this->user_groups =  ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
		    	$smarty_cache_id = 'mancarousel-'.(int)$this->context->shop->id.'-'.implode(', ',$this->user_groups).'-'.(int)$this->context->language->id;
		    	$this->context->smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();

			    if (!$this->isCached('mancarousel.tpl', $smarty_cache_id))
				{
					$this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
			    }

			    $html = $this->display(__FILE__, 'mancarousel.tpl', $smarty_cache_id);
			    Tools::restoreCacheSettings();
			    return $html;
			}
		}
	}

	public function hookTop( $params )
    {
	    if(Configuration::get('MAN_CAROUSEL_HOOK') == 0)
		{
			global $smarty, $cookie;

			$man_carousel_image_type = Configuration::get('MAN_CAROUSEL_IMAGE_TYPE');

			if(_PS_VERSION_ > '1.4.0.0' && _PS_VERSION_ < '1.5.0.0' )
    	    {
			    $mancarousel = Manufacturer::getManufacturers(false, $cookie->id_lang, true, false, false, false);
			}
			if(_PS_VERSION_ > '1.5.0.0')
			{
		    	$id_current_shop_group = Shop::getContextShopGroupID();
			    $mancarousel = Manufacturer::getManufacturers(true, $this->context->language->id, true, false, false, false, $id_current_shop_group);
			}

			$man_carousel_display_items = Configuration::get('MAN_CAROUSEL_DISPLAY_ITEMS');
			$man_carousel_scroll_items = Configuration::get('MAN_CAROUSEL_SCROLL_ITEMS');
			$man_carousel_pause_time = Configuration::get('MAN_CAROUSEL_PAUSE_TIME');
			$man_carousel_responsive = Configuration::get('MAN_CAROUSEL_RESPONSIVE');
			$man_carousel_auto_start = Configuration::get('MAN_CAROUSEL_AUTO_START');
			$man_carousel_random = Configuration::get('MAN_CAROUSEL_RANDOM');
			$man_carousel_circular = Configuration::get('MAN_CAROUSEL_CIRCULAR');
			$man_carousel_infinite = Configuration::get('MAN_CAROUSEL_INFINITE');
			$man_carousel_mouseover_pause = Configuration::get('MAN_CAROUSEL_MOUSEOVER_PAUSE');
			$man_carousel_fx = Configuration::get('MAN_CAROUSEL_FX');
			$man_carousel_fx_time = Configuration::get('MAN_CAROUSEL_FX_TIME');

		    if($man_carousel_circular == 1){
		    	$man_carousel_cir = 'true';
			}
			elseif($man_carousel_circular == 0){
			    $man_carousel_cir = 'false';
			}
			if($man_carousel_infinite == 1){
		    	$man_carousel_inf = 'true';
			}
			elseif($man_carousel_infinite == 0){
			    $man_carousel_inf = 'false';
			}
			if($man_carousel_auto_start == 1){
			    $man_carousel_auto = 'true';
			}
			elseif($man_carousel_auto_start == 0){
			    $man_carousel_auto = 'false';
			}
			if($man_carousel_mouseover_pause == 1){
			    $man_carousel_mouseover = 'true';
			}
			elseif($man_carousel_mouseover_pause == 0){
			    $man_carousel_mouseover = 'false';
			}
			if($man_carousel_random == 1){
			    $man_carousel_rand = '"random"';
			}
			else{
			    $man_carousel_rand = 0;
			}

        	if (version_compare(_PS_VERSION_, '1.5.0.0', '<'))
        	{
	        	$groups = $id_customer ? implode(', ', Customer::getGroupsStatic($id_customer)) : _PS_DEFAULT_CUSTOMER_GROUP_;
				$smartyCacheId = 'mancarousel|'.$groups.'_'.$id_lang;

				$smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();
		    	if (!$this->isCached('mancarousel.tpl', $smartyCacheId))
		    	{
			    	$smarty->assign(array(
					    'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
					    'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
				    	'man_carousel_fx_time' => $man_carousel_fx_time,
						'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
			        ));
				}
				$html = $this->display(__FILE__, 'mancarousel.tpl', $smartyCacheId);
		    	Tools::restoreCacheSettings();
		    	return $html;
			}
	    	elseif (version_compare(_PS_VERSION_, '1.5.4.1', '>='))
			{
                if (!$this->isCached('mancarousel.tpl', $this->getCacheId()))
				{
				   $this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
				}
		        return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
			}
			elseif (version_compare(_PS_VERSION_, '1.5.0.0', '>='))
			{
		    	$this->user_groups =  ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
		    	$smarty_cache_id = 'mancarousel-'.(int)$this->context->shop->id.'-'.implode(', ',$this->user_groups).'-'.(int)$this->context->language->id;
		    	$this->context->smarty->cache_lifetime = Configuration::get('MAN_CAROUSEL_CACHE');
		    	Tools::enableCache();

			    if (!$this->isCached('mancarousel.tpl', $smarty_cache_id))
				{
					$this->smarty->assign(array(
				        'man_carousel_display_items' => $man_carousel_display_items,
					    'man_carousel_scroll_items' => $man_carousel_scroll_items,
					    'man_carousel_pause_time' => $man_carousel_pause_time,
						'man_carousel_responsive' => $man_carousel_responsive,
					    'man_carousel_auto' => $man_carousel_auto,
					    'man_carousel_rand' => $man_carousel_rand,
				    	'man_carousel_cir' => $man_carousel_cir,
					    'man_carousel_inf' => $man_carousel_inf,
					    'man_carousel_mouseover' => $man_carousel_mouseover,
					    'man_carousel_fx' => $man_carousel_fx,
					    'man_carousel_fx_time' => $man_carousel_fx_time,
					    'imageSize' => Image::getSize($man_carousel_image_type),
					    'imageName' => $man_carousel_image_type,
					    'mancarousel' => $mancarousel
					));
			    }

			    $html = $this->display(__FILE__, 'mancarousel.tpl', $smarty_cache_id);
			    Tools::restoreCacheSettings();
			    return $html;
			}
		}
	}
}
?>