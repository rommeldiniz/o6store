<?php /* Smarty version Smarty-3.1.14, created on 2013-12-14 20:29:19
         compiled from "C:\xampp\htdocs\o6store\prestashop\themes\default\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1854352ab7735763937-38524004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2712e7513837ce69e59856ea27f5c1670ecee427' => 
    array (
      0 => 'C:\\xampp\\htdocs\\o6store\\prestashop\\themes\\default\\footer.tpl',
      1 => 1387069155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1854352ab7735763937-38524004',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ab773578f9f7_27961871',
  'variables' => 
  array (
    'content_only' => 0,
    'page_name' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab773578f9f7_27961871')) {function content_52ab773578f9f7_27961871($_smarty_tpl) {?>

		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
				</div>

<!-- Right -->
<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='authentication'){?>
				<div id="right_column" class="column grid_2 omega">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

				</div>
<?php }?>
			</div>

<!-- Footer -->
			<div id="footer" class="grid_9 alpha omega clearfix">
				<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

                 <div class="footer">
				<div class="logo_foot"> </div>
        
    </div><!-- FIN DEL FOOTER -->
    
                   
				
					<p class="center clearBoth"><div class="pie">
    	
        <p style="margin-left:125px; float:left; margin-top:6px; font-size:9px; color: #999;" disc>
        <a class="foot" href="#">HOME</a> • <a class="foot" href="#">MARCAS</a> • <a class="foot" href="#">PRODUCTOS</a> • <a class="foot" href="#">OULET • <a class="foot" href="#">BLOG</a> • <a class="foot" href="#">CONTACTO</a></p>
        
        <p style="margin-right:125px; float:right; margin-top:6px; font-size:9px; color: #999;" disc>O6Store @2013 by <a class="foot" href="#">Totuma Creativa</a> | Todos los derechos reservados</p>
       
    </div>
				
			</div>
		</div>
	<?php }?>
	</body>
</html>
<?php }} ?>