<?php
/**
* @version      3.11.0 26.12.2010
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/

defined('_JEXEC') or die();

class jshopProductFieldValue extends jshopMultilang{
    
    function __construct( &$_db ){
        parent::__construct('#__jshopping_products_extra_field_values', 'id', $_db );
    }
    
    function getAllList($display = 0){
        $db = JFactory::getDBO();
        $lang = JSFactory::getLang(); 
        $query = "SELECT id, `".$lang->get("name")."` as name, field_id FROM `#__jshopping_products_extra_field_values` order by ordering";
        $db->setQuery($query);
        if ($display==0){
            return $db->loadObjectList();
        }elseif($display==1){
            $rows = $db->loadObjectList();
            $list = array();
            foreach($rows as $k=>$row){
                $list[$row->id] = $row->name;
                unset($rows[$k]);    
            }
            return $list;
        }else{
            $rows = $db->loadObjectList();
            $list = array();
            foreach($rows as $k=>$row){
                $list[$row->field_id][$row->id] = $row->name;
                unset($rows[$k]);    
            }
            return $list;
        }
    }

}