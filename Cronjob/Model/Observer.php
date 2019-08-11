<?php

class Virtua_Cronjob_Model_Observer
{
    public function cron()
    {
        $fileName = "client.csv";

        $var_csv = new Varien_File_Csv();

        $collection = Mage::getModel('customer/customer')->getCollection()
            ->addAttributeToSelect(array("email"));



        $temp = array();
        foreach($collection as $col)
        {
            $data = array();
            $data["entity_id"] = $col->getEntity_id();
            $data["email"] = $col->getEmail();
            $temp[] = $data;
        }

        $var_csv->saveData($fileName, $temp);
    }

}