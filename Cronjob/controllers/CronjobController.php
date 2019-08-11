<?php

class Virtua_Cronjob_CronjobController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function writeAction()
    {
        $fileName = "client.csv";

        $var_csv = new Varien_File_Csv();


        /* $collection = Mage::getModel('sales/order')->getCollection();
         $collection->addAttributeToSelect('customer_firstname');
         $collection->addAttributeToSelect('customer_email');


         $collection->setOrder('entity_id','asc');
         $collection->getSelect()->limit(5);*/

        $collection = Mage::getModel('customer/customer')->getCollection()
            ->addAttributeToSelect(array("entity_id", "email"));


        $temp = array();
        foreach ($collection as $col) {
            $data = array();
            $data["entity_id"] = $col->getEntity_id();
            $data["email"] = $col->getEmail();
            //$data['created_at'] = $col->getCreated_at();
            $temp[] = $data;
        }
        //var_dump($temp);
        $var_csv->saveData($fileName, $temp);
    }

    }




