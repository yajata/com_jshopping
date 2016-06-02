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
echo $this->checkout_navigator;
echo $this->small_cart?>

<div class="jshop address_block" id="comjshop">
	<?php 
	$config_fields=$this->config_fields;
	include(dirname(__FILE__)."/adress.js.php");
	?>
	<ul class="uk-tab" data-uk-tab="{connect:'#whataderess'}">
		<li class="uk-active"><a href="#" onclick="jQuery('#delivery_adress_2').attr('checked',false)"><?php echo _JSHOP_FINISH_DELIVERY_ADRESS ?></a></li>
		<?php if ($this->count_filed_delivery > 0){?>
		<li><a href="#" onclick="jQuery('#delivery_adress_2').attr('checked',true)"><?php echo _JSHOP_DELIVERY_ADRESS ?></a></li>
		<?php }?>
	</ul>
	<form action="<?php echo $this->action ?>" class="uk-form" method="post" name="loginForm" onsubmit="return validateCheckoutAdressForm('<?php echo $this->live_path ?>', this.name)" >
    <input type="checkbox" style="display:none" name="delivery_adress" id="delivery_adress_2" value="1" />
	<?php echo $this->_tmp_ext_html_address_start?>
    <ul id="whataderess" class="uk-switcher uk-margin">
		<li>
			<div class="jshop_register user_info">
				<fieldset>
					<?php if ($config_fields['title']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_REG_TITLE ?> 
						</label>
						<span class="input">
							<?php print $this->select_titles ?>
						</span>
						<?php if ($config_fields['title']['require']){?>
							<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span>
						<?php } ?>
					</div>     
					<?php } ?>	
					
					<?php if ($config_fields['f_name']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_F_NAME ?> 
						</label>
						<span class="input">
							<input type="text" name="f_name" id="f_name" value="<?php print $this->user->f_name ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['f_name']['require']){?>
							<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"> <i class="uk-icon-warning"></i></span>
						<?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['l_name']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_L_NAME ?> 
							
						</label>
						<span class="input">
							<input type="text" name="l_name" id="l_name" value="<?php print $this->user->l_name ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['l_name']['require']){?>
							<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"> <i class="uk-icon-warning"></i>	</span>
						<?php } ?>
					</div>  
					<?php } ?>
					<?php if ($config_fields['m_name']['display']){?>
					<div>
						<label class="name">
							<?php print _JSHOP_M_NAME ?> 
						</label>
						<span class="input">
							<input type="text" name="m_name" id="m_name" value="<?php print $this->user->m_name ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['m_name']['require']){?>
							<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"> <i class="uk-icon-warning"></i>	</span>
						<?php } ?>
					</div>
					<?php } ?>
					<?php if ($config_fields['firma_name']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_FIRMA_NAME ?> 
						</label>
						<span class="input">
							<input type="text" name="firma_name" id="firma_name" value="<?php print $this->user->firma_name ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['firma_name']['require']){?>
							<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"> <i class="uk-icon-warning"></i>	</span>
						<?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['client_type']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_CLIENT_TYPE ?> 
						</label>
						<span class="input">
							<?php print $this->select_client_types;?>
						</span>
						<?php if ($config_fields['client_type']['require']){?>
						<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span>
						<?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['firma_code']['display']){?>
					<div id='tr_field_firma_code' <?php if ($config_fields['client_type']['display'] && $this->user->client_type!="2"){?>style="display:none;"<?php } ?>>
						<label class="name">
							<?php echo _JSHOP_FIRMA_CODE ?> <?php if ($config_fields['firma_code']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</label>
						<span class="input">
							<input type="text" name="firma_code" id="firma_code" value="<?php print $this->user->firma_code ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['firma_code']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['tax_number']['display']){?>
					<div id='tr_field_tax_number' <?php if ($config_fields['client_type']['display'] && $this->user->client_type!="2"){?>style="display:none;"<?php } ?>>
					  <label class="name">
							<?php echo _JSHOP_VAT_NUMBER ?>
						</label>
						<span class="input">
							<input type="text" name="tax_number" id="tax_number" value="<?php print $this->user->tax_number ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['tax_number']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['email']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_EMAIL ?>
						</label>
						<span class="input">
							<input type="text" name="email" id="email" value="<?php print $this->user->email ?>" class="inputbox" />
						</span> 
						<?php if ($config_fields['email']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['email2']['display']){?>
						<div>
						  <label class="name">
							<?php print _JSHOP_EMAIL2 ?> <?php if ($config_fields['email2']['require']){?><span>*</span><?php } ?>
						  </label>
						  <span class="input">
							<input type = "text" name = "email2" id = "email2" value = "<?php print $this->user->email ?>" class = "inputbox" />
						</span>
						</div>
					<?php } ?> 

					<?php if ($config_fields['birthday']['display']){?>
					<div>
						<label class="name">
							<?php print _JSHOP_BIRTHDAY ?> 
						</label>
						<span class="input">
							<?php echo JHTML::_('calendar', $this->user->birthday, 'birthday', 'birthday', $this->config->field_birthday_format, array('class'=>'inputbox', 'size'=>'25', 'maxlength'=>'19'));?>            
					  </span>
					  <?php if ($config_fields['birthday']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>
					<?php } ?>
					
					<?php echo $this->_tmpl_editaccount_html_2?>
					
					<?php if ($config_fields['home']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_HOME ?> 
						</label>
						<span class="input">
							<input type="text" name="home" id="home" value="<?php print $this->user->home ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['home']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['apartment']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_APARTMENT ?>
						</label>
						<span class="input">
							<input type="text" name="apartment" id="apartment" value="<?php print $this->user->apartment ?>" class="inputbox" />
						</span>
						 <?php if ($config_fields['apartment']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div>  
					<?php } ?>
					
					<?php if ($config_fields['street']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_STREET_NR ?>
						</label>
						<span class="input">
							<input type="text" name="street" id="street" value="<?php print $this->user->street ?>" class="inputbox" />
						</span>
						 <?php if ($config_fields['street']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
					
					<?php if ($config_fields['zip']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_ZIP ?>
						</label>
						<span class="input">
							<input type="text" name="zip" id="zip" value="<?php print $this->user->zip ?>" class="inputbox" />
						</span>
						 <?php if ($config_fields['zip']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
					
					<?php if ($config_fields['city']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_CITY ?> 
						</label>
						<span class="input">
							<input type="text" name="city" id="city" value="<?php print $this->user->city ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['city']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
					
					<?php if ($config_fields['state']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_STATE ?> 
						</label>
						<span class="input">
							<input type="text" name="state" id="state" value="<?php print $this->user->state ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['state']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
					
					<?php if ($config_fields['country']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_COUNTRY ?> 
						</label>
						<span class="input">
							<?php print $this->select_countries ?>
						</span>
						<?php if ($config_fields['country']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
					
					<?php echo $this->_tmpl_editaccount_html_3?>
					
					<?php if ($config_fields['phone']['display']){?>
					<div>
						<label class="name">
							<?php echo _JSHOP_TELEFON ?> 
						</label>
						<span class="input">
							<input type="text" name="phone" id="phone" value="<?php print $this->user->phone ?>" class="inputbox" />
						</span>
						<?php if ($config_fields['phone']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
					</div> 
					<?php } ?>
						
						<?php if ($config_fields['mobil_phone']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_MOBIL_PHONE ?> 
							</label>
							<span class="input">
								<input type="text" name="mobil_phone" id="mobil_phone" value="<?php print $this->user->mobil_phone ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['mobil_phone']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						<?php if ($config_fields['fax']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_FAX ?> 
							</label>
							<span class="input">
								<input type="text" name="fax" id="fax" value="<?php print $this->user->fax ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['fax']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['ext_field_1']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_1 ?> 
							</label>
							<span class="input">
								<input type="text" name="ext_field_1" id="ext_field_1" value="<?php print $this->user->ext_field_1 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['ext_field_1']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['ext_field_2']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_2 ?> 
							</label>
							<span class="input">
								<input type="text" name="ext_field_2" id="ext_field_2" value="<?php print $this->user->ext_field_2 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['ext_field_2']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['ext_field_3']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_3 ?> 
							</label>
							<span class="input">
								<input type="text" name="ext_field_3" id="ext_field_3" value="<?php print $this->user->ext_field_3 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['ext_field_3']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php echo $this->_tmpl_address_html_4?>
					</fieldset>
				</div>
			</li>
			<?php if ($this->count_filed_delivery > 0){?>
			<li>
				<div id="div_delivery">
					<fieldset>
						<?php if ($config_fields['d_title']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_REG_TITLE ?> 
							</label>
							<span class="input">
								<?php print $this->select_d_titles ?>
							</span>
							<?php if ($config_fields['d_title']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>       
						<?php } ?>

						<?php if ($config_fields['d_f_name']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_F_NAME ?> 
							</label>
							<span class="input">
								<input type="text" name="d_f_name" id="d_f_name" value="<?php print $this->user->d_f_name ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_f_name']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>

						<?php if ($config_fields['d_l_name']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_L_NAME ?> 
							</label>
							<span class="input">
								<input type="text" name="d_l_name" id="d_l_name" value="<?php print $this->user->d_l_name ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_l_name']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>

						<?php if ($config_fields['d_m_name']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_M_NAME ?> 
							</label>
							<span class="input">
								<input type="text" name="d_m_name" id="d_m_name" value="<?php print $this->user->d_m_name ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_m_name']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_firma_name']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_FIRMA_NAME ?> 
							</label>
							<span class="input">
								<input type="text" name="d_firma_name" id="d_firma_name" value="<?php print $this->user->d_firma_name ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_firma_name']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>

						<?php if ($config_fields['d_email']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EMAIL ?> 
							</label>
							<span class="input">
								<input type="text" name="d_email" id="d_email" value="<?php print $this->user->d_email ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_email']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_birthday']['display']){?>
						<div>
							<label class="name">
								<?php print _JSHOP_BIRTHDAY ?> 
							</label>
							<span class="input">
								<?php echo JHTML::_('calendar', $this->user->d_birthday, 'd_birthday', 'd_birthday', $this->config->field_birthday_format, array('class'=>'inputbox', 'size'=>'25', 'maxlength'=>'19'));?>
							</span>
							<?php if ($config_fields['d_birthday']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>
						<?php } ?>
						
						<?php echo $this->_tmpl_editaccount_html_5?>

						<?php if ($config_fields['d_home']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_HOME ?>
							</label>
							<span class="input">
								<input type="text" name="d_home" id="d_home" value="<?php print $this->user->d_home ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_home']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>

						<?php if ($config_fields['d_apartment']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_APARTMENT ?> 
							</label>
							<span class="input">
								<input type="text" name="d_apartment" id="d_apartment" value="<?php print $this->user->d_apartment ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_apartment']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>   
							 
						<?php if ($config_fields['d_street']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_STREET_NR ?> 
							</label>
							<span class="input">
								<input type="text" name="d_street" id="d_street" value="<?php print $this->user->d_street ?>" class="inputbox" />
								<?php if ($config_fields['d_street_nr']['display']){?>
									<input type="text" name="d_street_nr" id="d_street_nr" value="<?php print $this->user->d_street_nr?>" class="inputbox" />
								<?php }?>
							</span>
							<?php if ($config_fields['d_street']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_zip']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_ZIP ?> 
							</label>
							<span class="input">
								<input type="text" name="d_zip" id="d_zip" value="<?php print $this->user->d_zip ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_zip']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i> </span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_city']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_CITY ?> 
							</label>
							<span class="input">
								<input type="text" name="d_city" id="d_city" value="<?php print $this->user->d_city ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_city']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_state']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_STATE ?> 
							</label>
							<span class="input">
								<input type="text" name="d_state" id="d_state" value="<?php print $this->user->d_state ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_state']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>   
						<?php } ?>
						
						<?php if ($config_fields['d_country']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_COUNTRY ?> 
							</label>
							<span class="input">
								<?php print $this->select_d_countries ?>
							</span>
							<?php if ($config_fields['d_country']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div>  
						<?php } ?>
						
						<?php echo $this->_tmpl_address_html_6?>
						
						<?php if ($config_fields['d_phone']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_TELEFON ?> 
							</label>
							<span class="input">
								<input type="text" name="d_phone" id="d_phone" value="<?php print $this->user->d_phone ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_phone']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['d_mobil_phone']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_MOBIL_PHONE ?> 
							</label>
							<span class="input">
								<input type="text" name="d_mobil_phone" id="d_mobil_phone" value="<?php print $this->user->d_mobil_phone ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_mobil_phone']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['d_fax']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_FAX ?> 
							</label>
							<span class="input">
								<input type="text" name="d_fax" id="d_fax" value="<?php print $this->user->d_fax ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_fax']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['d_ext_field_1']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_1 ?> 
							</label>
							<span class="input">
								<input type="text" name="d_ext_field_1" id="d_ext_field_1" value="<?php print $this->user->d_ext_field_1 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_ext_field_1']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['d_ext_field_2']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_2 ?> 
							</label>
							<span class="input">
								<input type="text" name="d_ext_field_2" id="d_ext_field_2" value="<?php print $this->user->d_ext_field_2 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_ext_field_2']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
						
						<?php if ($config_fields['d_ext_field_3']['display']){?>
						<div>
							<label class="name">
								<?php echo _JSHOP_EXT_FIELD_3 ?> 
							</label>
							<span class="input">
								<input type="text" name="d_ext_field_3" id="d_ext_field_3" value="<?php print $this->user->d_ext_field_3 ?>" class="inputbox" />
							</span>
							<?php if ($config_fields['d_ext_field_3']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
						</div> 
						<?php } ?>
										   
						<?php echo $this->_tmpl_address_html_7?>
					</fieldset>
				</div>
			</li>
			<?php }?>
		</ul>
		<?php if ($config_fields['privacy_statement']['display']){?>
		<div class="jshop_register">
		<div class="jshop_block_privacy_statement">    
			<div>
			  <label class="name">
				<a class="privacy_statement" href="#" onclick="window.open('<?php print SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=privacy_statement&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
				<?php echo _JSHOP_PRIVACY_STATEMENT?> <?php if ($config_fields['privacy_statement']['require']){?><span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>"><i class="uk-icon-warning"></i></span><?php } ?>
				</a>            
			  </label>
			  <span class="input">
				<input type="checkbox" name="privacy_statement" id="privacy_statement" value="1" />
			  </span>

			</div>
		</div>
		</div>
		<?php } ?>   
		
		<?php echo $this->_tmp_ext_html_address_end?>
		
		<div class="reqsave">
			<?php echo $this->_tmpl_address_html_8?>
			<?php echo $this->_tmpl_address_html_9?>
		</div>
		
		<nav class="uk-navbar">
			<div class="uk-navbar-brand">
					<span class="requiredtext"><i class="uk-icon-warning"></i> - <?php echo _JSHOP_REQUIRED?></span>
			</div>
			
			<div class="uk-navbar-content uk-navbar-flip">
				<button type="submit" class="uk-button uk-button-primary textupper" name="next">  <?php echo _JSHOP_NEXT ?>   <i class="uk-icon-chevron-right"> </i> </button>
			</div>
		</nav>
	</form>
</div>
