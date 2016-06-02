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
    <h1><?php echo _JSHOP_LOGIN ?></h1>
	<?php print $this->checkout_navigator?>
	<?php if ($this->config->shop_user_guest && $this->show_pay_without_reg) {?>
		<div class="text_pay_without_reg uk-alert"><?php echo _JSHOP_ORDER_WITHOUT_REGISTER_CLICK ?> <a class="uk-button" href="<?php print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2',1,0, $this->config->use_ssl);?>"><?php echo _JSHOP_HERE ?></a></div>
	<?php } ?>
	<?php echo $this->tmpl_login_html_1?>
	<ul class="uk-tab" data-uk-tab="{connect:'#logregstep'}">
		<li>
			<a href="#"><div class="small_header"><?php echo _JSHOP_HAVE_ACCOUNT ?>.</div>
              <div class="uk-text-small"><?php echo _JSHOP_PL_LOGIN ?></div>
			 </a>
		</li>
		<?php if ($this->config->show_registerform_in_logintemplate){?>
			<li><a href="#"><div><?php echo _JSHOP_HAVE_NOT_ACCOUNT ?>?</div>
				<div class="uk-text-small"><?php echo _JSHOP_REGISTER ?></div>
				</a>
			</li>
		<?php }?>
	</ul>

	<!-- This is the container of the content items -->
	<ul id="logregstep" class="uk-switcher uk-margin">
		<li>
			<div class="login">
				<?php echo $this->tmpl_login_html_2?>
				<div class="login_block">
					<br/>
					<form method = "post" action = "<?php print SEFLink('index.php?option=com_jshopping&controller=user&task=loginsave', 0,0, $this->config->use_ssl)?>" name = "jlogin">
						<div id="lusername">
							<label><?php echo _JSHOP_USERNAME ?>: </label>
							<span><input type = "text" name = "username" value = "" class = "inputbox" /></span>
						</div>
						<div id="lpassword">
							<label><?php echo _JSHOP_PASSWORT ?>: </label>
							<span><input type = "password" name="passwd" value="" class = "inputbox" /></span>
						</div>
						<div id="lost_password">
							<label for="remember_me"><?php echo _JSHOP_REMEMBER_ME ?>  <input type="checkbox" name="remember" id="remember_me" value="yes" /></label><br />
							<input type="submit" class="uk-button" value="<?php echo _JSHOP_LOGIN ?>" />                     
							<a href = "<?php print $this->href_lost_pass ?>"><?php echo _JSHOP_LOST_PASSWORD ?></a>
						</div>
						<input type = "hidden" name = "return" value = "<?php print $this->return ?>" />
						<?php echo JHtml::_('form.token');?>
						<?php echo $this->tmpl_login_html_3?>
					</form>  
					<?php if (!$this->config->show_registerform_in_logintemplate){?>
						<div class="regbutton"><input type="button" class="uk-button" value="<?php echo _JSHOP_REGISTRATION ?>" onclick="location.href='<?php print $this->href_register ?>';" /></div>
					<?php }?>					
				</div>
			</div>
		</li>
		<li>
			<div class="register_block">
				<?php echo $this->tmpl_login_html_4?>
				<br/>
				<?php if (!$this->config->show_registerform_in_logintemplate){?>
					<div class="regbutton"><input type="button" class="uk-button" value="<?php echo _JSHOP_REGISTRATION ?>" onclick="location.href='<?php print $this->href_register ?>';" /></div>
				<?php }else{?>
					<?php $hideheaderh1 = 1; include(dirname(__FILE__)."/register.php"); ?>
				<?php }?>
				<?php echo $this->tmpl_login_html_5?>
			</div>   
		</li>
	</ul>
	<?php echo $this->tmpl_login_html_6?>
</div>    