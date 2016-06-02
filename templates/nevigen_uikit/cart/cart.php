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

	defined('_JEXEC') or die();
	$countprod = count($this->products);
?>
<div class="jshop" id="comjshop">
<?php print $this->checkout_navigator?>
	<?php print $this->_tmp_ext_html_before_discount?>
	<?php if ($this->use_rabatt && $countprod>0){ ?>
		<nav class="uk-nav uk-navbar">
			<a href="#" class="uk-navbar-brand"><?php print _JSHOP_RABATT ?></a>
			<div class="uk-navbar-content">
				<form name="rabatt" method="post" class="uk-form uk-margin-remove uk-display-inline-block" action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=discountsave')?>">
					<input type="text" class="uk-form-small"name="rabatt" value="" />
					<input type="submit" class="uk-button" value="<?php print _JSHOP_RABATT_ACTIVE ?>" />
				</form>
			</div>
		</nav>
	<?php }?>
	<br/>
	<form class="uk-form" action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=refresh')?>" method="post" name="updateCart">
		<?php print $this->_tmp_ext_html_cart_start?>
		<?php if ($countprod>0){?>
		<div class="uk-overflow-container">
			<table class="nvgcart uk-table uk-table-hover uk-table-condensed" style="min-width: 550px;">
				<thead class="nvgthead">
				  <tr class="uk-table-middle">
					<th class="uk-text-bold"> </th>
					<th class="uk-text-bold"> <?php print _JSHOP_ITEM?> </th>    
					<th class="uk-text-bold"> <?php print _JSHOP_SINGLEPRICE?> </th>
					<th class="uk-text-bold"> <?php print _JSHOP_NUMBER?> </th>
					<th class="uk-text-bold"> <?php print _JSHOP_PRICE_TOTAL?> </th>
					<th class="uk-text-bold"> </th>
				  </tr>
				</thead>
			  <?php foreach($this->products as $key_id=>$prod){ ?> 
			  <tr class="uk-table-middle">
				<td>
				  <a href="<?php print $prod['href']?>">
					<img src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt="<?php print htmlspecialchars($prod['product_name']);?>" class="jshop_img uk-thumbnail" />
				  </a>
				</td>
				<td>
					<a class="prod_name" href="<?php print $prod['href']?>"><?php print $prod['product_name']?></a>
					<?php if ($this->config->show_product_code_in_cart){?>
						<div class="jshop_ean" data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_EAN?>"><i class="uk-icon-barcode"></i>&nbsp;&nbsp;<?php print $prod['ean']?></div>
					<?php }?>
					<?php print $prod['_ext_product_name'] ?>
					<?php if ($prod['manufacturer']!=''){?>
						<div class="manufacturer_name" data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_MANUFACTURER?>"><i class="uk-icon-cogs"></i>&nbsp;&nbsp;<?php echo $prod['manufacturer']?></div>
					<?php }?>
					<?php print sprintAtributeInCart($prod['attributes_value']);?>
					<?php print sprintFreeAtributeInCart($prod['free_attributes_value']);?>
					<?php print sprintFreeExtraFiledsInCart($prod['extra_fields']);?>
					<?php print $prod['_ext_attribute_html']?>
				</td>
				<td>
					<div class="prod_price">
						<?php print formatprice($prod['price'])?>
						<?php print $prod['_ext_price_html']?>
					</div>
					<?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
						<div class="taxinfo"><?php print productTaxInfo($prod['tax']);?></div>
					<?php }?>
					<?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0){?>
						<div class="basic_price"><?php print _JSHOP_BASIC_PRICE?>: <?php print sprintBasicPrice($prod);?></div>
					<?php }?>
				</td>
				<td >
					<div class="quantity">
						<div class="mobile-cart">
							<?php print _JSHOP_NUMBER; ?>
						</div>
						<div class="data">
							<span class="quantitymore" onclick="var qty_el=document.getElementsByName('quantity[<?php print $key_id ?>]'); for ( keyVar in qty_el) { if( !isNaN( qty_el[keyVar].value )) {qty_el[keyVar].value++;document.updateCart.submit();}}return false;"></span>
							<input type="text" name="quantity[<?php print $key_id ?>]" value="<?php print $prod['quantity'] ?>" onchange="document.updateCart.submit()" />
							<?php print $prod['_qty_unit'];?>
							<span class="quantityless " onclick=" var qty_el=document.getElementsByName('quantity[<?php print $key_id ?>]'); for ( keyVar in qty_el) { if( !isNaN( qty_el[keyVar].value ) && qty_el[keyVar].value > 1) {qty_el[keyVar].value--;document.updateCart.submit();} }return false;"></span>
						</div>
					</div>
				</td>
				<td>
					<div class="prod_ordersum">
						<?php print formatprice($prod['price']*$prod['quantity']); ?>
						<?php print $prod['_ext_price_total_html']?>
					</div>
					<?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
						<div class="taxinfo"><?php print productTaxInfo($prod['tax']);?></div>
					<?php }?>
				</td>
				<td>
				  <a href="<?php print $prod['href_delete']?>" title = "<?php print _JSHOP_DELETE?>" onclick="return confirm('<?php print _JSHOP_CONFIRM_REMOVE?>')"><i class="uk-icon-trash-o"></i></a>
				</td>
			  </tr>
			  <?php } ?>
			</table>
		</div>
		<?php if ($this->config->show_weight_order){?>  
			<div class="weightorder uk-text-right">
				<div class="uk-badge"><?php print _JSHOP_WEIGHT_PRODUCTS?>: <span><?php print formatweight($this->weight);?></span>
			</div>
		<?php }?>  

		<?php if ($this->config->summ_null_shipping>0){?>
			<div class=" shippingfree uk-text-right">
				<div class=""><?php printf(_JSHOP_FROM_PRICE_SHIPPING_FREE, formatprice($this->config->summ_null_shipping, null, 1));?></div>
			</div>
		<?php } ?>
	  
		<div class="cartdescr uk-text-right"><?php print $this->cartdescr?></div>
		<br/>

		<div class="uk-grid">
			<div class="uk-width-1-2 uk-visible-large"> &nbsp; </div>
			<div class="uk-width-large-1-2 uk-width-small-1-1">
				<div class=" uk-panel uk-panel-box">
					<?php if (!$this->hide_subtotal){?>
						<div class="uk-grid uk-margin-small-top">
							<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php print _JSHOP_SUBTOTAL ?> </div>
							<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php print formatprice($this->summ);?><?php print $this->_tmp_ext_subtotal?> </div>
						</div>
					<?php } ?>
					<?php print $this->_tmp_html_after_subtotal?>
					<?php if ($this->discount > 0){ ?>
						<div class="uk-grid uk-text-success uk-margin-small-top">
							<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php print _JSHOP_RABATT_VALUE ?> <?php print $this->_tmp_ext_discount_text?></div>
							<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php print formatprice(-$this->discount);?><?php print $this->_tmp_ext_discount?> </div>
						</div>
					<?php } ?>
					<?php if (!$this->config->hide_tax){?>
						<?php foreach($this->tax_list as $percent=>$value){ ?>
						<div class="uk-grid uk-margin-small-top">
							<div class="cartvat name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php print displayTotalCartTaxName();?> <?php if ($this->show_percent_tax) print formattax($percent)."%"?> </div>
							<div class="cartvat value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php print formatprice($value);?><?php print $this->_tmp_ext_tax[$percent]?></div>
						</div>
						<?php } ?>
					<?php } ?>
					<div class="total uk-grid uk-text-large uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right">
						  <?php print _JSHOP_PRICE_TOTAL ?>
						</div>
						<div class = "value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right">
						  <?php print formatprice($this->fullsumm)?><?php print $this->_tmp_ext_total?>
						</div>
					</div>
					<?php print $this->_tmp_html_after_total?>
					<?php if ($this->config->show_plus_shipping_in_product){?>  
						<div class="uk-width-1-1">   
							<span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>  
						</div>
					<?php }?>
					<?php if ($this->free_discount > 0){?>  
						<div class="uk-width-1-2 uk-hidden-small"> &nbsp; </div>
						<div class="uk-width-1-2">       
							<span class="free_discount"><?php print _JSHOP_FREE_DISCOUNT;?>: <?php print formatprice($this->free_discount); ?></span>  
						</div>
					<?php }?>
				</div>
			</div>
		</div>

		<div>
		<?php }else{?>
			<div class="cart_empty_text uk-alert uk-alert-danger"><?php print _JSHOP_CART_EMPTY?></div>
		<?php }?>

		<?php print $this->_tmp_html_before_buttons?>
		<div id="checkout" class="uk-grid">
			<div class="uk-width-1-3 uk-text-left">
			   <a class="btn_back uk-button" href = "<?php print $this->href_shop ?>" alt="<?php print _JSHOP_BACK_TO_SHOP ?>">
				 <i class="uk-icon-chevron-circle-left"></i> <span class="uk-hidden-small"><?php print _JSHOP_BACK_TO_SHOP ?></span>
			   </a>
			</div>
			<div class="uk-width-2-3 uk-text-right">
			<?php if ($countprod>0){?>
			   <a class="uk-button uk-button-large uk-button-success btn_checkout" href = "<?php print $this->href_checkout ?>" alt="<?php print _JSHOP_CHECKOUT ?>">
				 <i class="uk-icon-shopping-cart uk-text-large"></i> <?php print _JSHOP_CHECKOUT ?> 
			   </a>
			<?php }?>
			</div>
		</div>
		<?php print $this->_tmp_html_after_buttons?>
	</form>

</div>