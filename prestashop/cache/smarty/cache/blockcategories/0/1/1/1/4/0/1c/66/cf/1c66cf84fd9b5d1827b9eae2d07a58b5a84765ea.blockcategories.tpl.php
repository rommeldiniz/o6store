<?php /*%%SmartyHeaderCode:3004352ab7924205534-74382503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c66cf84fd9b5d1827b9eae2d07a58b5a84765ea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\modules\\blockcategories\\blockcategories.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
    'bcc309dcfa843e1cf9fb8584b84175a440ffd301' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\modules\\blockcategories\\category-tree-branch.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3004352ab7924205534-74382503',
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52abcdcc2f7876_55073286',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52abcdcc2f7876_55073286')) {function content_52abcdcc2f7876_55073286($_smarty_tpl) {?>
<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<p class="title_block">Categorías</p>
	<div class="block_content">
		<ul class="tree dhtml">
									
<li >
	<a href="http://localhost/o6store/prestashop/index.php?id_category=3&amp;controller=category" 		title="Es hora de que el mejor jugador de la m&uacute;sica, al escenario para hacer un bis. Con el nuevo iPod, el mundo es tu escenario.">iPods</a>
	</li>

												
<li >
	<a href="http://localhost/o6store/prestashop/index.php?id_category=4&amp;controller=category" 		title="Todos los accesorios de moda para tu iPod">Accesorios</a>
	</li>

												
<li class="last">
	<a href="http://localhost/o6store/prestashop/index.php?id_category=5&amp;controller=category" class="selected"		title="El &uacute;ltimo procesador Intel, un disco duro m&aacute;s grande, con profusi&oacute;n de memoria y otras novedades. Todo en s&oacute;lo 2,59 cm libres de cualquier obstrucci&oacute;n. Las nuevas port&aacute;tiles Mac cumplir rendimiento, potencia y conectividad de una computadora de escritorio. Sin la parte del escritorio.">Port&aacute;tiles</a>
	</li>

							</ul>
		
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php }} ?>