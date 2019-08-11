<?php

class Virtua_Product_Adminhtml_AvalabilityController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $content =  $this->_addContent(
            $this->getLayout()->createBlock('virtua_product/adminhtml_avalability')
        );

        $this->renderLayout();



    }
}