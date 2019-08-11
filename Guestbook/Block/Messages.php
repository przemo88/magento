<?php

class Virtua_Guestbook_Block_Messages extends Mage_Core_Block_Template
{
    public function getMessages()
    {
        $collection = Mage::getModel('virtua_guestbook/guestbook')->getCollection()

            ->addFieldToFilter('visible','1');

        foreach ($collection as $collections)
        {

            $collections['id'];
            $collections['name'];
            $collections['surname'];
            $collections['message'];
            $collections['create'];
        }

        return $collection;

    }

}