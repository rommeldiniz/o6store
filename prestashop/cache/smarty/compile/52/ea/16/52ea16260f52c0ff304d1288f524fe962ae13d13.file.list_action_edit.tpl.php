<?php /* Smarty version Smarty-3.1.14, created on 2013-12-13 17:44:44
         compiled from "C:\xampp\htdocs\o6store\prestashop\admin5530\themes\default\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2088852ab86d43c0c05-92083887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ea16260f52c0ff304d1288f524fe962ae13d13' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\admin5530\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1384807196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2088852ab86d43c0c05-92083887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab86d43cb211_33348107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab86d43cb211_33348107')) {function content_52ab86d43cb211_33348107($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>