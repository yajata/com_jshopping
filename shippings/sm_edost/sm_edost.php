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


class sm_edost extends shippingextRoot{

	function showShippingPriceForm($params, &$shipping_ext_row, &$template){
		JSFactory::loadExtLanguageFile('sm_edost');
		include __DIR__.'/shippingpriceform.php';
		return 0;
	}

	function showConfigForm($config, &$shipping_ext, &$template){
		JSFactory::loadExtLanguageFile('sm_edost');
		$tmp = new stdClass();  
		$tmp->id = '';
		$tmp->payment_id = '';
		$tmp->name = JText::_('JSELECT');
		$allProductExtraField = array_merge(array($tmp), JSFactory::getAllProductExtraField());
		$allCurrencies = JTable::getInstance('Currency', 'jshop')->getAllCurrencies(0);
		$allPaymentMethods = array_merge(array($tmp), JTable::getInstance('PaymentMethod', 'jshop')->getAllPaymentMethods(0));
		$pickPointFields = array(
			0 => $tmp->name,
			1 => _JSHOP_EXT_FIELD_1,
			2 => _JSHOP_EXT_FIELD_2,
			3 => _JSHOP_EXT_FIELD_3
		);
		$params = unserialize($shipping_ext->params);
		include __DIR__.'/configform.php';
	}

	function getPrice($cart, $params, $price, $shipping_ext_row, $shipping_method_price){
		$session = JFactory::getSession();
		$eDostMethodID = $session->get('eDostMethodID', '', 'eDost');
		if (strlen($eDostMethodID) < 2) {
			return $price;
		}
		$strah = (int)$eDostMethodID[0];
		if (!in_array($strah, array(0,1))) {
			return;
		}
		$eDostMethodID = substr($eDostMethodID, 1);
		$eDostParams = unserialize($shipping_ext_row->params);
		$calculation = $session->get('calculation', array(), 'eDost');
		$cacheMD = $session->get('cacheMD', 0, 'eDost');
		if (!isset($calculation[$cacheMD])) {
			return;
		}
		$xml = simplexml_load_string($calculation[$cacheMD]);
		if (!$xml || $xml->stat != 1) {
			return;
		}
		foreach ($xml->tarif as $edostMethod) {
			if ($eDostMethodID == (int)$edostMethod->id && $strah == (int)$edostMethod->strah) {
				$tCurrency = JTable::getInstance('Currency', 'jshop');
				$tCurrency->load($eDostParams['currency']);
				if ($session->get('cashOnDelivery', 0, 'eDost')) {
					$calculeprice = (float)$edostMethod->pricecash;
				} else {
					$calculeprice = (float)$edostMethod->price;
				}
				return $calculeprice / $tCurrency->currency_value;
			}
		}
	}
}
?>