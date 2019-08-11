<?php

class Virtua_Guestbook_Block_Adminhtml_Guest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();
        $this->_blockGroup = 'virtua_guestbook_adminhtml';
        $this->_controller = 'guest';

        $this->removeButton('add');
    }
    public function getHeaderText()
    {
        return Mage::helper('virtua_guestbook')->__('Edit guestbook');
    }
}

