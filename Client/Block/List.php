<?php

class Virtua_Client_Block_List extends Mage_Core_Block_Template
{
    public function getCustomer()
    {

        $collection = Mage::getModel('sales/order')->getCollection()
            ->addAttributeToSelect('customer_email')->distinct(true)
            ->addAttributeToSelect('customer_firstname');

        $collection->setOrder('increment_id','desc');
        $collection->getSelect()->limit(10);

        return $collection;
    }
}