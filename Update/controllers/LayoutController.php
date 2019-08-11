<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-21
 * Time: 09:10
 */

class Virtua_Update_LayoutController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}