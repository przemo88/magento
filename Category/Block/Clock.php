<?php

class Virtua_Category_Block_Clock extends Mage_Core_Block_Template
{
    public function countTime()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn() && Mage::registry('current_category')) {

            $category_id = Mage::registry('current_category')->getId();

            $attribute_id = Mage::getSingleton('eav/config')->getAttribute(Mage_Catalog_Model_Category::ENTITY, 'end_date');

            $collection = Mage::getModel('virtua_category/category')->getCollection()
                ->addFieldToSelect('value')
                ->addFieldToFilter('attribute_id', $attribute_id->getId())
                ->addFieldToFilter('entity_id', $category_id);

            foreach ($collection as $c) {
                $end_day = $c['value'];
            }

            return $end_day;
        }


    }
}
?>
