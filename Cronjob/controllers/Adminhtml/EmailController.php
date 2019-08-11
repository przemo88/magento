<?php

class Virtua_Cronjob_Adminhtml_EmailController extends Mage_Adminhtml_Controller_Action
{
    /*public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }*/

    public function indexAction()
    {
        $this->loadLayout()
            ->_addContent(
                $this->getLayout()
                    ->createBlock('virtua_cronjob/adminhtml_import')
                    ->setTemplate('cronjob/cronjob.phtml'))
            ->renderLayout();
    }




    public function importAction()
    {
        $this->loadLayout()
            ->_addContent(
                $this->getLayout()
                    ->createBlock('virtua_cronjob/adminhtml_show')
                    ->setTemplate('cronjob/import.phtml'))
            ->renderLayout();
    }



}