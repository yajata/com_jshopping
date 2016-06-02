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
<?php print $this->checkout_navigator?>
<?php print $this->small_cart?>

<script type="text/javascript">
//<![CDATA[
	var payment_type_check = {};
	<?php foreach($this->payment_methods as  $payment){?>
	payment_type_check['<?php print $payment->payment_class;?>'] = '<?php print $payment->existentcheckform;?>';
	<?php }?>
//]]>
</script>

<div class="jshop payments uk-margin" id="comjshop">
<form id = "payment_form" name = "payment_form" action = "<?php print $this->action ?>" method = "post">
<?php print $this->_tmp_ext_html_payment_start?>
<ul class="uk-list uk-list-line uk-margin-large-left" id="table_payments">
  <?php 
  $payment_class = "";
  foreach($this->payment_methods as  $payment){
  if ($this->active_payment==$payment->payment_id) $payment_class = $payment->payment_class;
  ?>
		<li class="padiv">
			<label for = "payment_method_<?php print $payment->payment_id ?>">
			<input type = "radio" name = "payment_method" id = "payment_method_<?php print $payment->payment_id ?>" onclick = "showPaymentForm('<?php print $payment->payment_class ?>')" value = "<?php print $payment->payment_class ?>" <?php if ($this->active_payment==$payment->payment_id){?>checked<?php } ?> />
			<?php if ($payment->image){
				?><span class="payment_image"><img src="<?php print $payment->image?>" alt="<?php print htmlspecialchars($payment->name)?>" /></span><?php
			}
			?><?php print $payment->name;?></b> 
				<?php if ($payment->price_add_text!=''){?>
					(<?php print $payment->price_add_text?>)
				<?php }?>
			</label>
			<div id = "tr_payment_<?php print $payment->payment_class ?>" <?php if ($this->active_payment != $payment->payment_id){?>style = "display:none"<?php } ?>>
				<div class = "jshop_payment_method">
				<?php print $payment->payment_description?>
				<?php print $payment->form?>
				</div>
			</div>
		</li>

  <?php } ?>
</ul>
<?php print $this->_tmp_ext_html_payment_end?>
	<nav class="uk-navbar">
		<div class="uk-navbar-content uk-navbar-flip">
			<button id="payment_submit" class="uk-button uk-button-primary textupper" name="payment_submit" onclick="checkPaymentForm();"> <?php echo _JSHOP_NEXT ?> <i class="uk-icon-chevron-right"> </i> </button>
		</div>
	</nav>
</form>
</div>

<?php if ($payment_class){ ?>
<script type="text/javascript">
//<![CDATA[
    showPaymentForm('<?php print $payment_class;?>');
//]]>
</script>
<?php } ?>