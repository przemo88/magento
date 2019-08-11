<?php

class Virtua_Category_Model_LandingPage
{
    public function getLandingPage()
    {
        $collection = Mage::getModel('cms/page')->getCollection();

        foreach($collection as $c)
        {
            $page_id[] = $c['page_id'];
            $identifier[] = $c['identifier'];
        }

        $count = count($identifier);
        $temp = array();

        for($a = 1; $a < $count; $a++)
        {
            $temp[] = array('value' => $a+1, 'label' => Mage::helper('virtua_category')->__($identifier[$a]));
        }

        return $temp;
    }

    public function toOptionArray()
    {
        return $this->getLandingPage();
    }
}