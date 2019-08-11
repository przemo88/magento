<?php

class Virtua_Cronjob_Block_Adminhtml_Show extends Mage_Core_Block_Template
{
    private  function checkId($id)
    {

        $collection = Mage::getModel('customer/customer')->getCollection()
            ->AddAttributeToSelect('entity_id');

        foreach ($collection as $col) {
            return $col['entity_id'];
        }
    }


    public   function updateEmail()
    {
        $csv = new Varien_File_Csv();
        $data = $csv->getData('client.csv');

        foreach ($data as $_data) {

            if ($this->checkId($_data[0])) {

                    $update = array('entity_id' => $_data[0],'email' => $_data[1]);
                    $model = Mage::getModel('customer/customer')->load($_data[0])->addData($update);
                    try {
                        $model->setEntityId($_data[0])->save();

                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }

                }

            }
                return $data;

            }
    }
