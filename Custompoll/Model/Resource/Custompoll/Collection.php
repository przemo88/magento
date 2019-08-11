<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-17
 * Time: 14:20
 */

class Virtua_Custompoll_Model_Resource_Custompoll_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('virtua_custompoll/custompoll');
    }
}