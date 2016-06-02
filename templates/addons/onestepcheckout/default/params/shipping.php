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

class JFormFieldShipping extends JFormField {

	public $type = 'shipping';

	protected function getInput(){
		require_once JPATH_SITE.'/components/com_jshopping/lib/factory.php'; 

		return JHTML::_( 'select.genericlist', JTable::getInstance('ShippingMethod', 'jshop')->getAllShippingMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "shipping_desc" multiple="multiple"', 'shipping_id', 'name', empty($this->value) ? '0' : $this->value );
	}
}
?>