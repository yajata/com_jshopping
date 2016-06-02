<?php
/**
* @version      4.13.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();

class jshopConfigDisplayPrice extends JTable{
    
    function __construct(&$_db){
        parent::__construct('#__jshopping_config_display_prices', 'id', $_db);
    }
    
    function setZones($zones){
        $this->zones = serialize($zones);
    }
    
    function getZones(){
        if ($this->zones!=""){
            return unserialize($this->zones);
        }else{
            return array();
        }
    }
    
    function getList(){
        $db = JFactory::getDBO();        
        $query = "SELECT * FROM `#__jshopping_config_display_prices`";
        $db->setQuery($query);
        $list = $db->loadObjectList();
        foreach($list as $k=>$v){
            $list[$k]->countries = unserialize($v->zones);
        }
        return $list;
    }
}