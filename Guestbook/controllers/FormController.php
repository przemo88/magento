<?php

class Virtua_Guestbook_FormController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function sendAction()
    {

        if($this->getRequest()->getPost())
        {
            $create = now();
            $visible = 0;
            $this->getRequest()->setPost('create',$create);
            $this->getRequest()->setPost('visible',$visible);

            $post = $this->getRequest()->getPost();
            Zend_Debug::dump($post);
            try
            {
                $data = Mage::getModel('virtua_guestbook/guestbook')->setData($post);
                $data->save();

            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        Mage::app()->getResponse()->setRedirect(Mage::getUrl('guestbook/form/show'));

    }

    public function showAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}