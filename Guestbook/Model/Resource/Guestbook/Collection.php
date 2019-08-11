<?php

class Virtua_Guestbook_Model_Resource_Guestbook_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('virtua_guestbook/guestbook');
    }
}