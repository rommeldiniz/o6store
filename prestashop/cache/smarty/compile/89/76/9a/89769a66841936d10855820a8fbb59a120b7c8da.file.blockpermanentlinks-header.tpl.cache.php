<?php /* Smarty version Smarty-3.1.14, created on 2013-12-13 17:48:24
         compiled from "C:\xampp\htdocs\o6store\prestashop\modules\blockpermanentlinks\blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1443052ab7923ddf6d1-48800089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89769a66841936d10855820a8fbb59a120b7c8da' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\modules\\blockpermanentlinks\\blockpermanentlinks-header.tpl',
      1 => 1386973102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1443052ab7923ddf6d1-48800089',
  'function' => 
  array (
  ),
  'cache_lifetime' => 31536000,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab7923e0e010_73330786',
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab7923e0e010_73330786')) {function content_52ab7923e0e010_73330786($_smarty_tpl) {?>

<!-- Block permanent links module HEADER -->
<ul id="header_links">
	<!--<li id="header_link_contact"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Contacto','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li> !-->
	<!--<li id="header_link_sitemap"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>!-->
	<!--<li id="header_link_bookmark">
		<script type="text/javascript">writeBookmarkLink('<?php echo $_smarty_tpl->tpl_vars['come_from']->value;?>
', '<?php echo addslashes(addslashes($_smarty_tpl->tpl_vars['meta_title']->value));?>
', '<?php echo smartyTranslate(array('s'=>'bookmark','mod'=>'blockpermanentlinks','js'=>1),$_smarty_tpl);?>
');</script>
	</li>!-->
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>