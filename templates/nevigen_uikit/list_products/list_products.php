<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;
JSFactory::loadJsFilesLightBox();
echo $this->unijaxLandingDesc;
?>
<div class="jshop list_product" id="comjshop_list_product">
	<?php print $this->_tmp_list_products_html_start ?>
	<div class="uk-grid uk-grid-match" data-uk-grid-margin data-uk-grid-match="{target:'.block_product'}">
		<?php foreach ($this->rows as $k=>$product){?>
			<div class="uk-width-large-1-<?php echo $this->count_product_to_row;?> uk-width-medium-1-2 uk-width-small-1-1 uk-scrollspy-init-inview uk-scrollspy-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
				<?php include(dirname(__FILE__)."/".$product->template_block_product);?>
			</div>
		<?php } ?>
	</div>
	<?php print $this->_tmp_list_products_html_end;?>
</div>