<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright � Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;
?>
<?php print $this->checkout_navigator?>
<?php print $this->small_cart?>
<div class="jshop prevfinish_info" id="comjshop">
	<?php print $this->_tmp_ext_html_previewfinish_start?>
	<div class="addr_block">
		<div class="bill_address">
			<strong><?php echo _JSHOP_BILL_ADDRESS?></strong>: 
			<?php if ($this->invoice_info['firma_name']) print $this->invoice_info['firma_name'].", ";?> 
			<?php print $this->invoice_info['f_name'] ?> 
			<?php print $this->invoice_info['l_name'] ?>, 
			<?php if ($this->invoice_info['street'] && $this->invoice_info['street_nr']) print $this->invoice_info['street']." ".$this->invoice_info['street_nr'].","?>
			<?php if ($this->invoice_info['street'] && !$this->invoice_info['street_nr']) print $this->invoice_info['street'].","?>
			<?php if ($this->invoice_info['home'] && $this->invoice_info['apartment']) print $this->invoice_info['home']."/".$this->invoice_info['apartment'].","?>
			<?php if ($this->invoice_info['home'] && !$this->invoice_info['apartment']) print $this->invoice_info['home'].","?>
			<?php if ($this->invoice_info['state']) print $this->invoice_info['state']."," ?> 
			<?php print $this->invoice_info['zip']." ".$this->invoice_info['city']." ".$this->invoice_info['country']?>
		</div>
		<?php if ($this->count_filed_delivery){?>
			<div class="delivery_address">
				<strong><?php echo _JSHOP_FINISH_DELIVERY_ADRESS?></strong>: 
				<?php if ($this->delivery_info['firma_name']) print $this->delivery_info['firma_name'].", ";?> 
				<?php print $this->delivery_info['f_name'] ?> 
				<?php print $this->delivery_info['l_name'] ?>, 
				<?php if ($this->delivery_info['street'] && $this->delivery_info['street_nr']) print $this->delivery_info['street']." ".$this->delivery_info['street_nr'].","?>
				<?php if ($this->delivery_info['street'] && !$this->delivery_info['street_nr']) print $this->delivery_info['street'].","?>
				<?php if ($this->delivery_info['home'] && $this->delivery_info['apartment']) print $this->delivery_info['home']."/".$this->delivery_info['apartment'].","?>
				<?php if ($this->delivery_info['home'] && !$this->delivery_info['apartment']) print $this->delivery_info['home'].","?>
				<?php if ($this->delivery_info['state']) print $this->delivery_info['state']."," ?> 
				<?php print $this->delivery_info['zip']." ".$this->delivery_info['city']." ".$this->delivery_info['country']?>
			</div>
		<?php }?>
		<?php if (!$this->config->without_shipping){?>  
			<div class="shipping_method">
			   <strong><?php echo _JSHOP_FINISH_SHIPPING_METHOD?></strong>: <?php print $this->sh_method->name?>
			   <?php if ($this->delivery_time){?>
					<div class="delivery_time"><strong><?php echo _JSHOP_DELIVERY_TIME?></strong>: <?php print $this->delivery_time?></div>
			   <?php }?>
			   <?php if ($this->delivery_date){?>
					<div class="delivery_date"><strong><?php echo _JSHOP_DELIVERY_DATE?></strong>: <?php print $this->delivery_date?></div>
			   <?php }?>       
			</div>
		<?php } ?>
		<?php if (!$this->config->without_payment){?>  
			<div class="payment_method">
				<strong><?php echo _JSHOP_FINISH_PAYMENT_METHOD?></strong>: <?php print $this->payment_name ?>
			</div>
		<?php } ?> 
	</div>


	<form name="form_finish" class="uk-form" action="<?php print $this->action ?>" method="post">
		<div class="prevfinishjshop">
			<div class="add_info">
				<textarea rows="7" class="uk-width-1-1" placeholder="<?php echo _JSHOP_ADD_INFO?>" id="order_add_info" name="order_add_info"></textarea>
			</div>
			 <div class="uk-panel-box">
			<div class="uk-grid" data-uk-margin>
				<?php if ($this->config->display_agb || $this->no_return){?>
					<div class="uk-width-large-1-2 uk-width-small-1-1">
						<?php if ($this->config->display_agb){?>
							<div class="row_agb">
									<input type="checkbox" name="agb" id="agb"class="row_agb" />        
									<a class="policy" href="#" onclick="window.open('<?php print SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=agb&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;"><?php print _JSHOP_AGB;?></a>
									<?php echo _JSHOP_AND?>
									<a class="policy" href="#" onclick="window.open('<?php print SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=return_policy&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;"><?php print _JSHOP_RETURN_POLICY?></a>
									<?php echo _JSHOP_CONFIRM?>        
							</div>
						<?php }?>
						<?php if($this->no_return){?>
							<div class="row_no_return">            
								<input type = "checkbox" name="no_return" id="no_return" />        
								<?php print _JSHOP_NO_RETURN_DESCRIPTION;?>     
							</div>
						<?php }?>
						<?php print $this->_tmp_ext_html_previewfinish_agb?>
					</div>
				<?php } else {?>
					<div class="uk-width-1-2 uk-visible-large"> &nbsp; </div>
				<?php }?>
				<div class="uk-width-large-1-2 uk-width-small-1-1">
					<div class="uk-panel uk-text-center">
						<?php print $this->_tmp_ext_html_previewfinish_before_button?>
						<input class="uk-button uk-button-success uk-button-large" type="submit" name="finish_registration" value="<?php print _JSHOP_ORDER_FINISH?>" <?php if ($this->config->display_agb){?>onclick="return checkAGB()"<?php }?> />
					</div>
				</div>
			</div>
			</div>
		</div>
		<?php print $this->_tmp_ext_html_previewfinish_end?>
	</form>
</div>