<?php

class Virtua_Category_Model_Resource_Category extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('virtua_category/category','value_id');
    }
}