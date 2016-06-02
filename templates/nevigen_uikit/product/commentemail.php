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
$back_link = JFactory::getApplication()->input->getString('back_link');
if (substr($back_link, 0, 1) == '/') {
	$back_link = substr($back_link, 1);
}
?>
<?php echo _JSHOP_PRODUCT?>: <a href="<?php echo JURI::base().$back_link?>"><?php echo $this->product_name;?><a/><br/>
<?php echo _JSHOP_REVIEW_USER_NAME?>: <?php echo $this->user_name;?><br/>
<?php echo _JSHOP_REVIEW_USER_EMAIL?>: <?php echo $this->user_email;?><br/>
<?php echo _JSHOP_REVIEW_MARK_PRODUCT?>: <?php echo $this->mark;?><br/>
<?php echo _JSHOP_COMMENT?>:<br/>
<?php print nl2br($this->review)?>