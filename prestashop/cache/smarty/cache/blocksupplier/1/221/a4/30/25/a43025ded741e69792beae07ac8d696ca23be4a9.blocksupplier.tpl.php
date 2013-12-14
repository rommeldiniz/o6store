<?php /*%%SmartyHeaderCode:3041752ab79242e7566-64472998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43025ded741e69792beae07ac8d696ca23be4a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\modules\\blocksupplier\\blocksupplier.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3041752ab79242e7566-64472998',
  'variables' => 
  array (
    'display_link_supplier' => 0,
    'link' => 0,
    'suppliers' => 0,
    'text_list' => 0,
    'text_list_nb' => 0,
    'supplier' => 0,
    'form_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab7924397b18_82414804',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab7924397b18_82414804')) {function content_52ab7924397b18_82414804($_smarty_tpl) {?>
<!-- Block suppliers module -->
<div id="suppliers_block_left" class="block blocksupplier">
	<p class="title_block"><a href="http://localhost/o6store/prestashop/index.php?controller=supplier" title="Proveedores">Proveedores</a></p>
	<div class="block_content">
		<ul class="bullet">
					<li class="first_item">
			<a href="http://localhost/o6store/prestashop/index.php?id_supplier=1&amp;controller=supplier" title="Más sobre AppleStore">AppleStore</a>
		</li>
							<li class="last_item">
			<a href="http://localhost/o6store/prestashop/index.php?id_supplier=2&amp;controller=supplier" title="Más sobre Shure Online Store">Shure Online Store</a>
		</li>
				</ul>
				<form action="/o6store/prestashop/index.php" method="get">
			<p>
				<select id="supplier_list" onchange="autoUrl('supplier_list', '');">
					<option value="0">Todos los proveedores</option>
									<option value="http://localhost/o6store/prestashop/index.php?id_supplier=1&amp;controller=supplier">AppleStore</option>
									<option value="http://localhost/o6store/prestashop/index.php?id_supplier=2&amp;controller=supplier">Shure Online Store</option>
								</select>
			</p>
		</form>
		</div>
</div>
<!-- /Block suppliers module -->
<?php }} ?>