<?php

class Virtua_Guestbook_Model_Guestbook extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('virtua_guestbook/guestbook');
    }
}