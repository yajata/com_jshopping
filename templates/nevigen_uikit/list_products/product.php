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
<?php echo $product->_tmp_var_start?>
<figure class="product productitem_<?php echo $product->product_id?> uk-overlay uk-overlay-hover uk-text-center uk-panel-box uk-panel-header uk-width-1-1">
	<?php if ($product->label_id){?>
		<div class="product_label">
			<?php if ($product->_label_image){?>
				<img src="<?php echo $product->_label_image?>" alt="<?php echo htmlspecialchars($product->_label_name)?>" />
				<?php }else{?>
				<span class="label_name>"><?php echo $product->_label_name;?></span>
			<?php }?>
		</div>
	<?php }?>
	<div class="name">
		<div class="product_title uk-panel-title"><a href="<?php echo $product->product_link?>"><?php echo $product->name?></a></div>
		<div class="uk-article-meta">
			<?php if ($this->config->product_list_show_product_code){?>
				<div class="jshop_ean"><span data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_EAN?>"><i class="uk-icon-barcode"></i>&nbsp;&nbsp;<?php echo $product->product_ean;?></span></div>
			<?php }?>
			<?php if ($product->manufacturer->name){?>
				<div class="manufacturer_name"><span data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_MANUFACTURER?>"><i class="uk-icon-cogs"></i>&nbsp;&nbsp;<?php echo$product->manufacturer->name?></span></div>
			<?php }?>
		</div>
	</div>
	
	
	
	<div class="image">
		<?php print $product->_tmp_var_image_block;?>
				<a href="<?php print $product->product_link?>"> 
					<img class="jshop_img" src="<?php print $product->image?>" alt="<?php print htmlspecialchars($product->name);?>" title="<?php print htmlspecialchars($product->name);?>"  />
				</a>
        <?php echo $product->_tmp_var_bottom_foto;?>
    </div>
	
	<?php if ($this->allow_review){?>
        <div class="list_product_review_mark">
			<span><?php echo showMarkStar($product->average_rating);?></span>
			<span class="count_commentar"  data-uk-tooltip="{pos:'left'}" title="<?php echo sprintf(_JSHOP_X_COMENTAR, $product->reviews_count);?>"><i class="uk-icon-comments"></i> <?php echo '('.$product->reviews_count.')';?></span>
		</div>
	<?php }?>
		
	<div class="mainblock">
		<?php if ($product->product_quantity <=0 && !$this->config->hide_text_product_not_available){?>
			<div class="uk-alert uk-alert-danger"><?php echo _JSHOP_PRODUCT_NOT_AVAILABLE?></div>
		<?php }?>
		<?php if ($this->config->product_list_show_qty_stock && $product->product_quantity > 0){?>
			<div class="qty_in_stock uk-text-small"><?php echo _JSHOP_QTY_IN_STOCK?>: <span><?php echo sprintQtyInStock($product->qty_in_stock)?></span></div>
		<?php }?>
		<?php if ($product->product_old_price > 0){?>
			<div class="old_price uk-text-muted"><?php if ($this->config->product_list_show_price_description)?><span data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_OLD_PRICE;?>" ><?php echo formatprice($product->product_old_price)?></span></div>
		<?php }?>
		<?php print $product->_tmp_var_bottom_old_price;?>
		<?php if ($product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
			<div class="default_price"><?php echo _JSHOP_DEFAULT_PRICE.": ";?><span><?php echo formatprice($product->product_price_default)?></span></div>
		<?php }?>
		<?php if ($product->_display_price){?>
			<div class = "jshop_price">
				<?php if ($this->config->product_list_show_price_description) {?> <span data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_PRICE;?>"><i class="uk-icon-tags"></i> </span><?php } ?>
				 <br /> 
				 <span data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_PRICE;?>"><?php if ($product->show_price_from) echo _JSHOP_FROM." ";?> <?php echo formatprice($product->product_price);?><?php print $product->_tmp_var_price_ext;?></span>
			</div>	
		<?php }?>
		<?php echo $product->_tmp_var_bottom_price;?>
		<?php if ($this->config->show_tax_in_product && $product->tax > 0){?>
			<span class="uk-text-small"><?php echo productTaxInfo($product->tax);?></span>
		<?php }?>
		<?php if ($this->config->show_plus_shipping_in_product){?>
			<span class="plusshippinginfo"><?php echo sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
		<?php }?>
		<?php if ($product->basic_price_info['price_show']){?>
			<div class="base_price"><?php print _JSHOP_BASIC_PRICE?>: <?php if ($product->show_price_from && !$this->config->hide_from_basic_price) print _JSHOP_FROM;?> <span><?php print formatprice($product->basic_price_info['basic_price'])?> / <?php print $product->basic_price_info['name'];?></span></div>
		<?php }?>
		<?php if ($this->config->product_list_show_weight && $product->product_weight > 0){?>
			<div class="uk-text-small productweight"><?php echo _JSHOP_WEIGHT?>.: <span><?php echo formatweight($product->product_weight)?></span></div>
		<?php }?>
		<?php if ($product->delivery_time != ''){?>
			<div class="deliverytime"><?php echo _JSHOP_DELIVERY_TIME?>: <span><?php echo $product->delivery_time?></span></div>
		<?php }?>
		<?php if (is_array($product->extra_field)){?>
			<div class="extra_fields">
					<?php foreach($product->extra_field as $extra_field){?>
						<div class="uk-text-small"><span class="extra_name"><?php echo $extra_field['name'];?>:</span> <span class="extra_value"><?php echo $extra_field['value']; ?> </span></div>
					<?php }?>
			</div>
		<?php }?>
		<?php if ($product->vendor){?>
			<div class="vendorinfo"><?php echo _JSHOP_VENDOR?>: <a href="<?php echo $product->vendor->products?>"><?php echo $product->vendor->shop_name?></a></div>
		<?php }?>
        
	</div>
	<figcaption class="uk-flex uk-flex-center uk-flex-middle uk-text-center">
		<div>
		<p class="product_short_description"><?php echo $product->short_description?></p>
		<?php echo $product->_tmp_var_top_buttons;?>
		<div class="buttons">
			<?php if ($product->buy_link){?>
				<a class="button_buy uk-button uk-button-small uk-button-primary uk-margin-small-bottom uk-margin-small-right" href="<?php echo $product->buy_link?>">
					<i class="uk-icon-shopping-cart"></i> 
					<?php echo _JSHOP_BUY?>
				</a>
			<?php }?>
			<a class="uk-button uk-button-small uk-margin-small-bottom" href="<?php echo $product->product_link?>">
				<i class="uk-icon-check"></i> 
				<?php echo _JSHOP_DETAIL?>
			</a>
            <?php echo $product->_tmp_var_buttons;?>
        </div>
		<?php echo $product->_tmp_var_bottom_buttons;?>
		</div>
	</figcaption>
</figure>  
<?php echo $product->_tmp_var_end?>