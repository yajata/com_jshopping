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
<div class="jshop checkout">
	<div class="uk-overflow-container">
		<table class="nvgcart uk-table uk-table-hover uk-table-condensed" style="min-width: 550px;">
			<thead class="nvgthead">
			  <tr class="uk-table-middle">
				<th class="uk-width-1-6 uk-text-bold"> </th>
				<th class="uk-width-2-6 uk-text-bold"> <?php print _JSHOP_ITEM?> </th>    
				<th class="uk-width-1-6 uk-text-bold uk-text-center"> <?php print _JSHOP_SINGLEPRICE?> </th>
				<th class="uk-width-1-6 uk-text-bold uk-text-center"> <?php print _JSHOP_NUMBER?> </th>
				<th class="uk-width-2-6 uk-text-bold uk-text-center"> <?php print _JSHOP_PRICE_TOTAL?> </th>
			  </tr>
			</thead>

			<tbody>
			<?php $countprod=count($this->products);
			foreach($this->products as $key_id=>$prod){?> 
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
				<td class="uk-text-center" >
				  <?php echo $prod['quantity']?><?php echo $prod['_qty_unit'];?>
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
			  </tr>
			  <?php }?>
			</tbody>
		</table>
	</div>
	<?php if ($this->config->show_weight_order){?>  
		<div class="weightorder uk-text-right">
			<?php echo _JSHOP_WEIGHT_PRODUCTS ?>: <span><?php echo formatweight($this->weight);?></span>
		</div>
	<?php }?>
	<div class="uk-grid">
		<div class="uk-width-1-2 uk-visible-large"> &nbsp; </div>
		<div class="uk-width-large-1-2 uk-width-small-1-1">
			<div class=" uk-panel uk-panel-box">
				<?php if (!$this->hide_subtotal){?>
					<div class="uk-grid uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php print _JSHOP_SUBTOTAL ?> </div>
						<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php echo formatprice($this->summ);?><?php echo $this->_tmp_ext_subtotal?></div>
					</div>
				<?php } ?>
				<?php print $this->_tmp_html_after_subtotal?>
				<?php if ($this->discount > 0){ ?>
					<div class="uk-grid uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php print _JSHOP_RABATT_VALUE ?> <?php print $this->_tmp_ext_discount_text?></div>
						<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php print formatprice(-$this->discount);?><?php echo formatprice(-$this->discount);?><?php echo $this->_tmp_ext_discount?> </div>
					</div>
				<?php } ?>

				<?php if (isset($this->summ_delivery)){?>
					<div class="uk-grid  uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"> <?php echo _JSHOP_SHIPPING_PRICE ?></div>
						<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"> <?php echo formatprice($this->summ_delivery);?><?php echo $this->_tmp_ext_shipping?></div>
					</div>
				<?php } ?>
				<?php if (isset($this->summ_package)){?>
					<div class="uk-grid uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"><?php echo _JSHOP_PACKAGE_PRICE ?></div>
						<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"><?php print formatprice($this->summ_package);?><?php print $this->_tmp_ext_shipping_package?></div>
					</div>
				<?php } ?>
				<?php if ($this->summ_payment != 0){ ?>
					<div class="uk-grid uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"><?php echo $this->payment_name;?></div>
						<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"><?php echo formatprice($this->summ_payment);?><?php echo $this->_tmp_ext_payment?></div>
					</div>
				<?php } ?>  
				<?php if (!$this->config->hide_tax){ ?>
					<?php foreach($this->tax_list as $percent=>$value){?>
						<div class="uk-grid uk-text-small uk-margin-small-top tax">
							<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"><?php echo displayTotalCartTaxName();?><?php if ($this->show_percent_tax) echo formattax($percent)."%"?></div>
							<div class="value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"><?php echo formatprice($value);?><?php echo $this->_tmp_ext_tax[$percent]?></div>
						</div>
					<?php } ?>
				<?php } ?>
				
				<div class="uk-alert">
					<div class="total uk-grid uk-text-large uk-text-bold uk-margin-small-top">
						<div class="name uk-width-1-2 uk-width-small-2-3 uk-width-medium-2-3 uk-text-right"><?php echo $this->text_total; ?></div>
						<div class = "value uk-width-1-2 uk-width-small-1-3 uk-width-medium-1-3 uk-text-right"><?php echo formatprice($this->fullsumm)?><?php echo $this->_tmp_ext_total?></div>
					</div>
				</div>
				<?php print $this->_tmp_html_after_total?>
				<?php if ($this->free_discount > 0){?>  
					<div class="uk-width-1-2 uk-hidden-small"> &nbsp; </div>
					<div class="uk-width-1-2">       
						<span class="free_discount"><?php print _JSHOP_FREE_DISCOUNT;?>: <?php print formatprice($this->free_discount); ?></span>  
					</div>
				<?php }?> 
			</div>
		</div>
	</div>
	<?php print $this->_tmp_html_after_checkout_cart?>
</div> 