<?php

class Virtua_Product_Block_Configurable extends Mage_Core_Block_Template
{
    public function configurable()
    {
        $session = Mage::getSingleton("core/session");
        $id = Mage::registry('current_product')->getId();
        $name = Mage::registry('current_product')->getSku();
        $type = Mage::registry('current_product')->getTypeId();

        $session->setData('product_name',$name);
        $session->setData('product_id',$id);
        $session->setData('product_type',$type);

        $product = Mage::getModel('catalog/product')->load($id);
        $childProducts = Mage::getModel('catalog/product_type_configurable')
            ->getUsedProducts(null, $product);

        foreach ($childProducts as $child) {
            if ($child->getIsInStock() == 0) {
                $not_available = 1;
                $child->getSku();
                $child->getName();
                $out_of_stock[] = $child->getSku();

            }
        }

        $products = Mage::getModel('catalog/category')->load()
            ->getProductCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter(
                'status',
                array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED)
            );

        foreach ($products as $p ) {
           $p['status'];
           $enabled_sku[] = $p['sku'];
            $p['entity_id'];
        }

        $result = array_intersect($enabled_sku,$out_of_stock);

        return array($not_available, $result);

    }

    public  function simple()
    {

        $session = Mage::getSingleton("core/session");
        $id = Mage::registry('current_product')->getId();
        $name = Mage::registry('current_product')->getSku();
        $type = Mage::registry('current_product')->getTypeId();

        $session->setData('product_name',$name);
        $session->setData('product_id',$id);
        $session->setData('product_type',$type);
    }
}



