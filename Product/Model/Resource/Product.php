<?php

class Virtua_Product_Model_Resource_Product extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('virtua_product/product','id');
    }
}