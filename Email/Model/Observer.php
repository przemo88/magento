<?php

class Virtua_Email_Model_Observer
{
    public function showEmail($observer)
    {
        $collection = $observer->getOrderGridCollection();
        $select = $collection->getSelect();
        $select->joinLeft(array('zamowienia'=>sales_flat_order), 'zamowienia.entity_id = main_table.entity_id', array('zamowienia.customer_email'));



    }
}