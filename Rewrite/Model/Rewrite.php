<?php

class Virtua_Rewrite_Model_Rewrite extends Mage_Sales_Model_Order
{

    public function getOrderDetailsHtml()
    {
        $temp = Mage::getModel('sales/order')->getCollection()->distinct(true)
            ->addAttributeToSelect('customer_firstname')
            ->addAttributeToSelect('customer_lastname')
            ->addAttributeToSelect('customer_email');

        $temp->getSelect()->join( array('zamowienia'=> sales_flat_order_address), 'zamowienia.parent_id = main_table.entity_id', array('zamowienia.country_id','zamowienia.region','zamowienia.city','zamowienia.street'))->distinct();

        $temp->setOrder('entity_id','desc');

        $names = array();

        foreach ($temp as $a) {
            $data = array();
            $data['customer_names'] = $a->getData('customer_firstname');
            $data['customer_lastname']= $a->getData('customer_lastname');
            $data['country_id'] = $a->getData('country_id');
            $data['region'] = $a->getData('region');
            $data['city'] = $a->getData('city');
            $data['customer_email'] = $a->getData('customer_email');
            $data['street'] = $a->getData('street');
            $names[] = $data;
        }

        return $names;

    }

}