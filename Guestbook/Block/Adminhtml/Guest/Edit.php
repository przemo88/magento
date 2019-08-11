<?php

class Virtua_Guestbook_Block_Adminhtml_Guest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'virtua_guestbook_adminhtml';
        $this->_controller = 'guest';

        $this->_updateButton('save','label', Mage::helper('virtua_guestbook')->__('Zapisz'));
        $this->_updateButton('delete','label', Mage::helper('virtua_guestbook')->__('Usun'));
        $this->removeButton('reset');

    }
}