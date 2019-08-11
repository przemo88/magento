<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-17
 * Time: 14:18
 */

class Virtua_Custompoll_Model_Resource_Custompoll extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('virtua_custompoll/custompoll','id');
    }
}