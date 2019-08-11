<?php

class Virtua_Cronjob_Block_Adminhtml_Import extends Mage_Core_Block_Template
{
    protected function _toHtml()
    {
        $url = Mage::helper('adminhtml')->getUrl('adminhtml/email/import', array('_secure' => true));
        $this->assign('action', $url);

        return parent::_toHtml();
    }

}