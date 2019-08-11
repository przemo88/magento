<?php
class Virtua_Guestbook_Block_Adminhtml_Guest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {



    protected function _prepareForm(){
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));
        $form->setUseContainer(true);
        $this->setForm($form);



        $collection = Mage::getModel('virtua_guestbook/guestbook')->setId()->getCollection();



        $temp = $this->getRequest()->getPost();


        $id = $this->getRequest()->getParam('id', null);

        $model = Mage::getModel("virtua_guestbook/guestbook");
        $collection=$model->getCollection()->addFieldToFilter('id', array('in' => $id));
        $data= $collection->getData();




        foreach($data as $temp)
        {
            $temp['id'].'<br>';
            $temp['name'].'<br>';
            $temp['surname'].'<br>';
            $temp['message'].'<br>';
            $temp['create'].'<br>';
            $temp['visible'];
        }


        $fieldset = $form->addFieldset('registry_form', array('legend'=>Mage::helper('virtua_guestbook')->__('Edytuj wiadomosc')));

        $fieldset->addField('id', 'text', array(
            'label'     => Mage::helper('virtua_guestbook')->__('Id'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'id',
            'readonly'  => 'readonly',

        ));

        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('virtua_guestbook')->__('Imie'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',
        ));

        $fieldset->addField('surname', 'text', array(
            'label'     => Mage::helper('virtua_guestbook')->__('Nazwisko'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'surname',
        ));

        $fieldset->addField('message', 'text', array(
            'label'     => Mage::helper('virtua_guestbook')->__('Wiadomosc'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'message',
        ));

        $fieldset->addField('create', 'text', array(
            'label'     => Mage::helper('virtua_guestbook')->__('Utworzono'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'create',
        ));

        $fieldset->addField('select','select', array(
            'label' => Mage::helper('virtua_guestbook')->__('Widocznosc'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'visible',
            'value' => '0',
            'values' => array('0' => 'Niewidoczny', '1' => 'Widoczny')
        ));

        $form->setValues($temp);
        return parent::_prepareForm();


    }

}