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
<?php $config_fields = $this->config_fields;?>
<div class="jshop" id="comjshop">
    <h1><?php echo _JSHOP_MY_ACCOUNT ?></h1>
    <?php echo $this->tmpl_my_account_html_start?>
    <div class="jshop_profile_data">        
        <?php if ($config_fields['f_name']['display'] || $config_fields['l_name']['display']){?>
        <div class="name"><?php print $this->user->f_name." ".$this->user->l_name;?></div>
        <?php }?>
		
        <?php if ($config_fields['city']['display']){?>
        <div class="city"><span><?php echo _JSHOP_CITY ?>:</span> <?php print $this->user->city?></div>
        <?php }?>
		
        <?php if ($config_fields['state']['display']){?>
        <div class="state"><span><?php echo _JSHOP_STATE ?>:</span> <?php print $this->user->state?></div>
        <?php }?>
		
        <?php if ($config_fields['country']['display']){?>
        <div class="country"><span><?php echo _JSHOP_COUNTRY ?>:</span> <?php print $this->user->country?></div>
        <?php }?>
		
        <?php if ($config_fields['email']['display']){?>
        <div class="email"><span><?php echo _JSHOP_EMAIL ?>:</span> <?php print $this->user->email?></div>        
        <?php }?>
		
        <?php if ($this->config->display_user_group){?>
        <div class="group">
            <span><?php echo _JSHOP_GROUP ?>:</span> 
            <?php print $this->user->groupname?> 
            <span class="subinfo">(<?php echo _JSHOP_DISCOUNT ?>: <?php print $this->user->discountpercent?>%)</span> 
            <?php if ($this->config->display_user_groups_info){?>
            <a class="jshop_user_group_info" target="_blank" href="<?php print $this->href_user_group_info?>"><?php echo _JSHOP_USER_GROUPS_INFO ?></a>
            <?php }?>
        </div>
        <?php }?>
    </div>
    
    <ul class="jshop uk-list">
    	<li>
    		<a href="<?php print $this->href_edit_data?>"><?php echo _JSHOP_EDIT_DATA ?></a>
    	</li>
    	<li>
            <a href="<?php print $this->href_show_orders?>"><?php echo _JSHOP_SHOW_ORDERS ?></a>
        </li>
        <li>
        	<?php echo $this->tmpl_my_account_html_content?>
        </li> 
        <li>
            <a href="<?php print $this->href_logout?>"><?php echo _JSHOP_LOGOUT ?></a>
        </li> 
    </ul>
	<?php echo $this->tmpl_my_account_html_end?>    
</div>