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
<div class="jshop" id="comjshop">
	<table class="jshop cart uk-table uk-table-hover">
		<thead>
			<tr>
				<th scope="col" class="width20" id="image"><?php echo _JSHOP_IMAGE ?></th>
				<th scope="col" class="width20" id="item"><?php echo _JSHOP_ITEM ?></th>  
				<th scope="col" class="width15" id="singleprice"><?php echo _JSHOP_SINGLEPRICE ?></th>
				<th scope="col" class="width15" id="number"><span><?php echo _JSHOP_NUMBER ?></span></th>
				<th scope="col" class="width15" id="price_total"><?php echo _JSHOP_PRICE_TOTAL ?></th>
				<th scope="col" class="width15" id="to_cart"></th>
				<th scope="col" class="width10" id="remove"></th>			
			</tr>
		</thead>
		<tbody>  
		<?php $i=1; $countprod = count($this->products);
		foreach($this->products as $key_id=>$prod){?> 
		<tr class = "jshop_prod_cart <?php if ($i%2==0) print "even"; else print "odd"?>">
			<td class = "jshop_img_description_center" headers="image">
				<a href = "<?php print $prod['href']; ?>">
					<img src = "<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt = "<?php print htmlspecialchars($prod['product_name']);?>" class = "jshop_img" />
				</a>
			</td>
			<td class="product_name" headers="item">
				<a href="<?php print $prod['href']?>"><?php print $prod['product_name']?></a>
				<?php if ($this->config->show_product_code_in_cart){?>
				<span class="jshop_code_prod">(<?php print $prod['ean']?>)</span>
				<?php }?>
				<?php print $prod['_ext_product_name'] ?>
				<?php if ($prod['manufacturer']!=''){?>
				<div class="manufacturer"><?php echo _JSHOP_MANUFACTURER ?>: <span><?php print $prod['manufacturer']?></span></div>
				<?php }?>
				<?php print sprintAtributeInCart($prod['attributes_value']);?>
				<?php print sprintFreeAtributeInCart($prod['free_attributes_value']);?>
				<?php print sprintFreeExtraFiledsInCart($prod['extra_fields']);?>
				<?php print $prod['_ext_attribute_html']?>        
			</td>    
			<td class="price" headers="singleprice">
			<?php print formatprice($prod['price'])?>
			<?php print $prod['_ext_price_html']?>
			<?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
				<span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
			<?php }?>
			<?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0){?>
				<div class="basic_price"><?php print _JSHOP_BASIC_PRICE?>: <span><?php print sprintBasicPrice($prod);?></span></div>
			<?php }?>
			</td>
			<td class="qty" headers="number">
				<?php print $prod['quantity']?><?php print $prod['_qty_unit'];?>
			</td>
			<td class="price_summ" headers="price_total">
				<?php print formatprice($prod['price']*$prod['quantity']);?>
				<?php print $prod['_ext_price_total_html']?>
				<?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
				<span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
				<?php }?>
			</td>
			<td class="to_cart uk-text-center" headers="to_cart">
				<a href="<?php print $prod['remove_to_cart'] ?>"  data-uk-tooltip="{pos:'top'}" title = "<?php echo _JSHOP_REMOVE_TO_CART?>"><i class="uk-icon-shopping-cart"></i></a>
			</td>
			<td class="remove uk-text-center" headers="remove">
				<a href="<?php print $prod['href_delete'] ?>" onclick="return confirm('<?php echo _JSHOP_REMOVE?>')" data-uk-tooltip="{pos:'top'}"  title = "<?php echo _JSHOP_DELETE?>"><i class="uk-icon-trash-o"></i></a>
			</td>
		</tr>
		<?php $i++; } ?>
	</table>

	<?php print $this->_tmp_html_before_buttons?>
	<div id="checkout" class="uk-grid"> 
		<div class="uk-width-1-2  uk-text-left">
		   <a href="<?php echo $this->href_shop ?>" data-uk-tooltip="{pos:'left'}"  title="<?php echo _JSHOP_BACK_TO_SHOP?>">  <i class="uk-icon-angle-left"></i> <?php echo _JSHOP_BACK_TO_SHOP ?> </a>
		</div>
		<div class="uk-width-1-2 uk-text-right">
		<?php if ($countprod>0){?>
		   <a class="uk-text-large" href="<?php echo $this->href_checkout ?>" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_CHECKOUT?>"><?php echo _JSHOP_CHECKOUT ?> <i class="uk-icon-chevron-circle-right"></i> </a>
		<?php }?>
		</div>
	</div>
	<?php print $this->_tmp_html_after_buttons?>
</div>