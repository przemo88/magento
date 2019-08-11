<?php

class Virtua_Guestbook_Model_Resource_Guestbook extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('virtua_guestbook/guestbook','id');
    }
}