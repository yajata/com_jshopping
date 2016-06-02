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

JFile::delete(JPATH_COMPONENT.'/css/nevigen_uikit.css');
JFile::delete(JPATH_COMPONENT.'/css/nevigen_uikit.custom.css');
JFolder::delete(JPATH_COMPONENT.'/lang/templates/nevigen_uikit');
JFolder::delete(JPATH_COMPONENT.'/templates/nevigen_uikit');
?>