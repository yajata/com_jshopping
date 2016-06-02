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
<div class="vendordetailinfo" id="comjshop">
		<h1><?php print $this->product->vendor_info->shop_name?></h1>
		<div class="vendor_logo">
			<img class="uk-thumbnail" src="<?php print $this->product->vendor_info->logo?>" alt="<?php print htmlspecialchars($this->vendor->shop_name);?>" />
		</div>
			<div>
			  <span class="name">
				<?php echo _JSHOP_F_NAME?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->vendor->f_name ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_L_NAME?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->vendor->l_name ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_FIRMA_NAME ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->company_name ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_EMAIL?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->email ?>
			  </span>
			</div>        
			<div>
			  <span  class="name">
				<?php echo _JSHOP_STREET_NR?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->adress ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_ZIP ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->zip ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_CITY?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->city ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_STATE ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->state ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_COUNTRY?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->country ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_TELEFON?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->phone ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_FAX?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php print $this->product->vendor_info->fax ?>
			  </span>
			</div>
</div>