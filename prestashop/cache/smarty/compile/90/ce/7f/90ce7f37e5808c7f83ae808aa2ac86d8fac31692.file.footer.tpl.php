<?php /* Smarty version Smarty-3.1.14, created on 2013-12-13 22:08:08
         compiled from "C:\xampp\htdocs\o6store\prestashop\themes\default\mobile\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:388552ab773862ddb4-26391046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90ce7f37e5808c7f83ae808aa2ac86d8fac31692' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\mobile\\footer.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '388552ab773862ddb4-26391046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'PS_SHOP_NAME' => 0,
    'conditions' => 0,
    'id_cgv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab7738684698_35266540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab7738684698_35266540')) {function content_52ab7738684698_35266540($_smarty_tpl) {?>

			<div id="footer">
				<div class="ui-grid-a">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileFooterChoice"),$_smarty_tpl);?>

				</div><!-- /grid-a -->

				<div id="full-site-section" class="center">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?no_mobile_theme" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Browse the full site'),$_smarty_tpl);?>
</a>
				</div>

				<div data-role="footer" data-theme="a" id="bar_footer">
					<div id="link_bar_footer" class="ui-grid-a">
						<div class="ui-block-a">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true), ENT_QUOTES, 'UTF-8', true);?>
" data-ajax="false"><?php echo $_smarty_tpl->tpl_vars['PS_SHOP_NAME']->value;?>
</a>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['conditions']->value){?>
						<div class="ui-block-b">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['id_cgv']->value), ENT_QUOTES, 'UTF-8', true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Terms of service'),$_smarty_tpl);?>
</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div><!-- /footer -->
		</div><!-- /page -->
	</body>
</html>
<?php }} ?>