<?php

class Virtua_Order_Model_Data extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('virtua_order');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        $quote= $address->getQuote();
        	if(!$quote->isVirtual() && $address->getAddressType() == 'billing'){
        	return$this;
	}

	$items= $address->getAllItems();
	$baseDiscount= count($items) * 5;
	$discount= Mage::app()->getStore()->convertPrice($baseDiscount);
	$address->setBaseFee($baseDiscount);
	$address->setFee($discount);

	$address->setBaseGrandTotal($address->getBaseGrandTotal() + $baseDiscount);
	$address->setGrandTotal($address->getGrandTotal() + $discount);

	return $this;

        $discount= Mage::app()->getStore()->convertPrice($baseDiscount);

    }


    public function fetch(Mage_Sales_Model_Quote_Address $address){
        $amount = $address->getFee();
        $title = Mage::helper('virtua_order')->__('Fee');
        if ($amount != 0){
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => $title,
                'value' => $amount,
            ));
        }
        return $this;
    }
}


