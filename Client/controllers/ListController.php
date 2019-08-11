<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-21
 * Time: 09:53
 */


class Virtua_Client_ListController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function listAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}