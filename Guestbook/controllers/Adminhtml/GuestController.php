<?php
class Virtua_Guestbook_Adminhtml_GuestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {

        $content=$this->getLayout()
            ->createBlock( 'virtua_guestbook/adminhtml_guest' );
        $this->loadLayout();
        $this->_addContent( $content );
        $this->renderLayout();

    }

    public function editAction()
    {
        $content = $this->getLayout()
            ->createBlock('virtua_guestbook/adminhtml_guest_edit');
        $this->loadLayout();
        $this->_addContent($content);

        $this->renderLayout();
    }

    public function saveAction()
    {
        if($this->getRequest()->getPost())
        {
            $post = $this->getRequest()->getPost();

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
        Mage::app()->getResponse()->setRedirect(Mage::getUrl('adminhtml/guest/index'));
    }



    public function deleteAction()
    {

        if($this->getRequest()) {

            $id = $this->getRequest()->getParam('id');

            try
           {
               $data = Mage::getModel('virtua_guestbook/guestbook')->setId($id);
               $data->delete();

           }
           catch(Exception $e)
           {
               echo $e->getMessage();
           }
       }
       Mage::app()->getResponse()->setRedirect(Mage::getUrl('adminhtml/guest/index'));
    }



    public function newAction()
    {
       
    }
}


?>