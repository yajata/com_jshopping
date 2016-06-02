<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website https://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement https://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;

$db = JFactory::getDbo();
$db->setQuery("SELECT `id` FROM `#__jshopping_shipping_ext_calc` WHERE `alias` = 'sm_edost'");
$id = $db->loadResult();
if ($id) {
	JFactory::getApplication()->redirect('index.php?option=com_jshopping&controller=shippingextprice&task=edit&id='.$id);
} else {
	JFactory::getApplication()->redirect('index.php?option=com_jshopping&controller=addons');
}