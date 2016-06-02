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
<?php echo $this->checkout_navigator?>
<?php echo $this->small_cart?>

<div class="jshop uk-margin" id="comjshop">
<form id="shipping_form" class="uk-form" name="shipping_form" action="<?php echo $this->action ?>" method="post" onsubmit="return validateShippingMethods()">
<?php echo $this->_tmp_ext_html_shipping_start?>
<ul class="uk-list uk-list-line uk-margin-large-left" id="table_shippings">
<?php foreach($this->shipping_methods as $shipping){?>
	<li class="padiv">
		<input type="radio" name="sh_pr_method_id" id="shipping_method_<?php echo $shipping->sh_pr_method_id?>" value="<?php echo $shipping->sh_pr_method_id ?>" <?php if ($shipping->sh_pr_method_id==$this->active_shipping){ ?>checked = "checked"<?php } ?> onclick="showShippingForm(<?php echo $shipping->shipping_id?>)" />
		<label for="shipping_method_<?php echo $shipping->sh_pr_method_id ?>">
			<?php if ($shipping->image){ ?>
			<span class="shipping_image"><img src="<?php echo $shipping->image?>" alt="<?php echo htmlspecialchars($shipping->name)?>" /></span>
			<?php } ?>
			<?php echo $shipping->name?> (<?php echo formatprice($shipping->calculeprice); ?>)</label>
      		<?php if ($this->config->show_list_price_shipping_weight && count($shipping->shipping_price)){ ?>
          	<div class="shipping_weight_to_price">
          	<?php foreach($shipping->shipping_price as $price){?>
            	<div class="weight">
                	<?php if ($price->shipping_weight_to!=0){?>
                    	<?php echo formatweight($price->shipping_weight_from);?> - <?php echo formatweight($price->shipping_weight_to);?>
                    <?php }else{ ?>
                    	<?php echo _JSHOP_FROM." ".formatweight($price->shipping_weight_from);?>
                    <?php } ?>
                </div>
                <div class="price">
                    <?php echo formatprice($price->shipping_price); ?>
                </div>
          	<?php } ?>
          	</div>
      	<?php } ?>
      	<div class="shipping_descr"><?php echo $shipping->description?></div>
		<div id="shipping_form_<?php echo $shipping->shipping_id?>" class="shipping_form <?php if ($shipping->sh_pr_method_id==$this->active_shipping) echo 'shipping_form_active'?>"><?php echo $shipping->form?></div>
      	<?php if ($shipping->delivery){?>
      	<div class="shipping_delivery"><?php echo _JSHOP_DELIVERY_TIME.": ".$shipping->delivery?></div>
      	<?php }?>
	    <?php if ($shipping->delivery_date_f){?>
      	<div class="shipping_delivery_date"><?php echo _JSHOP_DELIVERY_DATE.": ".$shipping->delivery_date_f?></div>
      	<?php }?>       	
	</li>
<?php } ?>
</ul>
<?php echo $this->_tmp_ext_html_shipping_end?>
	<nav class="uk-navbar">
		<div class="uk-navbar-content uk-navbar-flip">
			<button type="submit" class="uk-button uk-button-primary textupper">  <?php echo _JSHOP_NEXT ?> <i class="uk-icon-chevron-right"> </i> </button>
		</div>
	</nav>


</form>
</div>