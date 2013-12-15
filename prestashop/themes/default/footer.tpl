{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

		{if !$content_only}
				</div>

<!-- Right -->
{if $page_name != 'authentication' && $page_name != 'index' &&  $page_name != 'category'} }
				<div id="right_column" class="column grid_2 omega">
					{$HOOK_RIGHT_COLUMN}
				</div>
{/if}
			</div>

<!-- Footer -->
			<div id="footer" class="grid_9 alpha omega clearfix">
				{$HOOK_FOOTER}
                 <div class="footer">
				<div class="logo_foot"> </div>
                
        <p class="center clearBoth"><div class="pie">
    	
        <p style="margin-left:125px; padding:0px !important; float:left; margin-top:6px; font-size:9px; color: #999;" disc>
        <a class="foot" href="#">HOME</a> • <a class="foot" href="#">MARCAS</a> • <a class="foot" href="#">PRODUCTOS</a> • <a class="foot" href="#">OULET • <a class="foot" href="#">BLOG</a> • <a class="foot" href="#">CONTACTO</a></p>
        
        <p style="margin-right:125px; padding:0px !important; float:right; margin-top:6px; font-size:9px; color: #999;" disc>O6Store @2013 by <a class="foot" href="#">Totuma Creativa</a> | Todos los derechos reservados</p>
    </div><!-- FIN DEL FOOTER -->
    
                   
				
					
       
    </div>
				
			</div>
		</div>
	{/if}
	</body>
</html>
