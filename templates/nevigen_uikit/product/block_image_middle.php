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
<?php echo $this->_tmp_product_html_body_image?>
<?php if(!count($this->images)){?>
	<img id="main_image"  src="<?php echo $this->image_product_path?>/<?php echo $this->noimage?>" alt="<?php echo htmlspecialchars($this->product->name)?>" />
<?php } else {
	$image=$this->images[0];?>
	<a  data-uk-lightbox id="main_image_full_<?php echo $image->image_id?>" title="<?php echo htmlspecialchars($image->_title)?>" href="<?php echo $this->image_product_path?>/<?php echo $image->image_full;?>" >
		<img class="uk-thumbnail" itemprop="image" id="main_image_<?php echo $image->image_id?>" src="<?php echo $this->image_product_path?>/<?php echo $image->image_name;?>" alt="<?php echo htmlspecialchars($image->_title)?>" title="<?php echo htmlspecialchars($image->_title)?>" />
	</a>
	<?php }?>
	