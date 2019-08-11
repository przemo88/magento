<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-18
 * Time: 10:36
 */

class Virtua_Observer_Model_Observer extends Varien_Object
{
    public function saveOrder($evt)
    {
        $_order   = $evt->getOrder();
        $_request = Mage::app()->getRequest();

        $_comments = strip_tags($_request->getParam('orderComment'));

        if(!empty($_comments)){
            $_comments;
            $_order->setCustomerNote($_comments);
        }

        return $this;
    }
}