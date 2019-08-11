<?php

class Virtua_Delivery_Model_Options
{
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('virtua_delivery')->__('Poniedzialek')),
            array('value' => 2, 'label' => Mage::helper('virtua_delivery')->__('Wtorek')),
            array('value' => 3, 'label' => Mage::helper('virtua_delivery')->__('Sroda')),
            array('value' => 4, 'label' => Mage::helper('virtua_delivery')->__('Czwartek')),
            array('value' => 5, 'label' => Mage::helper('virtua_delivery')->__('Piatek')),
            array('value' => 6, 'label' => Mage::helper('virtua_delivery')->__('Sobota')),
            array('value' => 7, 'label' => Mage::helper('virtua_delivery')->__('Niedziela')),
        );
    }
}