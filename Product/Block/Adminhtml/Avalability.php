<?php

class Virtua_Product_Block_Adminhtml_Avalability extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        parent::_construct();
        $this->_blockGroup = 'virtua_product_adminhtml';
        $this->_controller = 'avalability';

    }


    public function _prepareLayout()
    {
        $this->_removeButton('add');

        return parent::_prepareLayout();
    }

    public function getHeaderText()
    {
        return Mage::helper('virtua_product')->__('Not avalibility product');
    }


}