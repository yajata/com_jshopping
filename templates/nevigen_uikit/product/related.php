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
?>
<?php $in_row = $this->config->product_count_related_in_row;?>
<?php if (count($this->related_prod)){?>    
	<div class = "prod_related">
		<div class="related_header no_display"><?php echo _JSHOP_RELATED_PRODUCTS?></div>
		<div class="list_related uk-grid uk-grid-match" data-uk-grid-margin data-uk-grid-match="{target:'.block_product'}">
			<?php foreach($this->related_prod as $k=>$product){?>  
				<div class="jshop_related uk-width-large-1-<?php echo $in_row; ?> uk-width-medium-1-2 uk-width-small-1-1">
					<?php include(dirname(__FILE__)."/../".$this->folder_list_products."/".$product->template_block_product);?>
				</div>
			<?php }?>
		</div>
	</div> 
<?php }?>