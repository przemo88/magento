<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2016-03-15
 * Time: 09:20
 */

	class Virtua_Custompoll_CustompollController  extends Mage_Core_Controller_Front_Action {



        public function indexAction()
        {
            $this->loadLayout();
            $this->renderLayout();

        }

        public function resultsAction()
        {
            $this->loadLayout();
            $this->renderLayout();
        }



        public function sendAction()
        {
           if($this->getRequest()->getPost())
           {
               $zapisano = now();
               $this->getRequest()->setPost('zapisano',$zapisano);

               $post = $this->getRequest()->getPost();

               try
               {
                    $data = Mage::getModel('virtua_custompoll/custompoll')->setData($post);
                    $data->save();

               }
               catch(Exception $e)
               {
                   echo $e->getMessage();
               }
           }
            Mage::app()->getResponse()->setRedirect(Mage::getUrl('custompoll/custompoll/results'));
        }

    }
?>