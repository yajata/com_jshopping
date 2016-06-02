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
    <h1><?php echo _JSHOP_LOGOUT ?></h1>
	<?php print $this->checkout_navigator?>
    <input type="button" value="<?php echo _JSHOP_LOGOUT ?>" onclick="location.href='<?php print SEFLink("index.php?option=com_jshopping&controller=user&task=logout"); ?>'" />
</div>