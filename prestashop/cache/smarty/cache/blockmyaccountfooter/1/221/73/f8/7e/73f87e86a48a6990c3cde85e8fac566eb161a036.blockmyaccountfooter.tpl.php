<?php /*%%SmartyHeaderCode:2153052ab7924db33a5-36129479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73f87e86a48a6990c3cde85e8fac566eb161a036' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\modules\\blockmyaccountfooter\\blockmyaccountfooter.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2153052ab7924db33a5-36129479',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab7924e51c79_11008271',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab7924e51c79_11008271')) {function content_52ab7924e51c79_11008271($_smarty_tpl) {?>
<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="http://localhost/o6store/prestashop/index.php?controller=my-account" title="Administrar mi cuenta de cliente" rel="nofollow">Mi cuenta</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="http://localhost/o6store/prestashop/index.php?controller=history" title="Listado de mis pedidos" rel="nofollow">Mis pedidos</a></li>
						<li><a href="http://localhost/o6store/prestashop/index.php?controller=order-slip" title="Listado de mis vales de compra" rel="nofollow">Mis vales descuento</a></li>
			<li><a href="http://localhost/o6store/prestashop/index.php?controller=addresses" title="Listado de mis direcciones" rel="nofollow">Mis direcciones</a></li>
			<li><a href="http://localhost/o6store/prestashop/index.php?controller=identity" title="Administrar mi información personal" rel="nofollow">Mis datos personales</a></li>
						
		</ul>
		<p class="logout"><a href="http://localhost/o6store/prestashop/index.php?mylogout" title="Cerrar sesión" rel="nofollow">Cerrar sesión</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>