<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-18
 * Time: 09:55
 */

class Virtua_Observer_CommentController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}