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

class JFormFieldPayment extends JFormField {

	public $type = 'payment';

	protected function getInput(){
		require_once JPATH_SITE.'/components/com_jshopping/lib/factory.php'; 

		return JHTML::_( 'select.genericlist', JTable::getInstance('PaymentMethod', 'jshop')->getAllPaymentMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "payment_desc" multiple="multiple"', 'payment_id', 'name', empty($this->value) ? '0' : $this->value );
	}
}
?>