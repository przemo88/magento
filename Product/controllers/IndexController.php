<?php

class Virtua_Product_IndexController extends Mage_Core_Controller_Front_Action
{

    public function sendAction()
    {
        $this->loadLayout();
        $this->renderLayout();

        $session = Mage::getSingleton("core/session");
        $type = $session->getData('product_type');

       if($type == 'simple')
        {
            $temp = $this->getRequest()->getPost();

            $session = Mage::getSingleton("core/session");
            $productName = $session->getData('product_name');
            $productId = $session->getData('product_id');

            $email = $temp['email'];

            $insert = array('product_id' => $productId, 'name' => $productName, 'email' => $email, 'create' => null);

            $model = Mage::getModel('virtua_product/product')->setData($insert);

            try
            {
                $model->save();
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
        if($type == 'configurable')
        {
            $temp = $this->getRequest()->getPost();

            $email = $temp['email'];
            $name = $temp['variant'];

            $model = Mage::getModel('catalog/product')->getCollection()
                ->addAttributeToSelect('entity_id')
                ->addAttributeToFilter('sku',$name);


            foreach($model as $m)
            {
                $variantId = $m['entity_id'];
            }

            $insert = array('product_id' => $variantId, 'name' => $name, 'email' => $email, 'create' => null);

            $model = Mage::getModel('virtua_product/product')->setData($insert);

            try
            {
                $model->save();
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }
}