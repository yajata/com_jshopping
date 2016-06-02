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
<?php if (!empty($this->text)){?>
<?php echo $this->text;?>
<?php }else{?>
<div class="thanksfinish"><?php echo _JSHOP_THANK_YOU_ORDER ?></div>
<?php }?>
