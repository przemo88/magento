<?php

class Virtua_Category_Model_Options extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {


        $customer_group = Mage::getModel('customer/group')->getCollection();

        foreach ($customer_group as $c) {
            $customer_group_id[] = $c['customer_group_id'];
            $customer_group_code[] = $c['customer_group_code'];

        }
        $count = count($customer_group_code)+1;
        $temp = array();

        for ($a = 1; $a < $count; $a++) {

            $temp[] = array('value' => $a, 'label' => Mage::helper('virtua_category')->__($customer_group_code[$a-1]));
        }
        return $temp;


    }

    public function toOptionArray()
    {
        return $this->getAllOptions();
    }
}