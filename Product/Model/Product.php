<?php

class Virtua_Product_Model_Product extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('virtua_product/product');
    }
}