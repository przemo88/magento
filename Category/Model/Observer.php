<?php

class Virtua_Category_Model_Observer
{
    public function createMenu(Varien_Event_Observer $observer)
    {
        $start_date_id = Mage::getSingleton('eav/config')->getAttribute(Mage_Catalog_Model_Category::ENTITY, 'start_date');
        $end_date_id = Mage::getSingleton('eav/config')->getAttribute(Mage_Catalog_Model_Category::ENTITY, 'end_date');

        $end_date = Mage::getModel('virtua_category/category')->getCollection()
            ->addFieldToSelect('value')
            ->addFieldToselect('entity_id')
            ->addFieldToFilter('attribute_id',$end_date_id->getId());

        $start_date = Mage::getModel('virtua_category/category')->getCollection()
            ->addFieldToSelect('value')
            ->addFieldToselect('entity_id')
            ->addFieldToFilter('attribute_id',$start_date_id->getId());

        foreach ($start_date as $s)
        {
            $start[] = $s['value'];
        }


        foreach ($end_date as $e )
        {
            $end[] = $e['value'];
            $id[] = $e['entity_id'];
        }

        $today = date('m/d/Y');

        $stoday = strtotime($today);

        for($a = 0; $a < count($end); $a++  )
        {
            $send[$a] = strtotime($end[$a]);
        }

        for($a = 0; $a < count($start); $a++  )
        {
            $sstart[$a] = strtotime($start[$a]);
        }


      for($a = 0; $a < count($end); $a++  )
        {
            if($send[$a] >= $stoday && $sstart[$a] <= $stoday)
            {
                $cat = Mage::getModel('catalog/category')->load($id[$a]);
                $cat->setData('is_active','1');
                $cat->save();

            }
            else
            {
                $cat = Mage::getModel('catalog/category')->load($id[$a]);
                $cat->setData('is_active','0');
                $cat->save();
            }
        }


        $menu = $observer->getEvent()->getMenu();
        $menuCollection = $menu->getChildren();

        $active = true;

        if (Mage::registry('current_category')) {

            $category_id = Mage::registry('current_category')->getId();


            $access = Mage::getModel('catalog/category')->load($category_id);

            $category_availability[] = $access->getData('category_availability');

            $string = implode(",", $category_availability);

            $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
            $group = Mage::getModel('customer/group')->load($groupId);
            $group->getCode();

            $group_id = $group->getId();
            $group_id = $group_id + 1;

            $cat = (string)$group_id;

            if (strpos($string, $cat) !== false) {
                //echo 'Masz dostep do tej kategorii';
            } else {

                $landing_page = Mage::getStoreConfig('virtua_category/category_title/category_select');

                $url = Mage::getModel('cms/page')->getCollection()
                    ->AddFieldToFilter('page_id',$landing_page);

                foreach($url as $u)
                {
                    $u['identifier'].'<br>';
                }

                Mage::app()->getResponse()->setRedirect(Mage::getUrl($u['identifier']));

            }
        }

        if (Mage::getSingleton('customer/session')->isLoggedIn())
        {

            $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
            $group = Mage::getModel('customer/group')->load($groupId);
            $group->getCode();


            $group_id = $group->getId();
            $group_id = $group_id + 1;

            $cat = (string)$group_id;
            $cat . ',';

            $category_availability_id = Mage::getSingleton('eav/config')->getAttribute(Mage_Catalog_Model_Category::ENTITY, 'category_availability');

            $collection = Mage::getModel('virtua_category/category')->getCollection()
                ->addFieldToSelect('entity_id')
                ->addFieldToFilter('attribute_id',$category_availability_id->getId())
                ->addFieldToFilter('value', array('nlike' => "%$cat%"));

            foreach($collection as $c)
            {
                $entity_id[] = $c['entity_id'];
                $entity = implode(',', $entity_id);
            }


            $entity = $entity.',';

            $name_id = Mage::getSingleton('eav/config')->getAttribute(Mage_Catalog_Model_Category::ENTITY, 'name');

            $collection2 = Mage::getModel('virtua_category/category')->getCollection()
                ->addFieldToSelect('value')
                ->addFieldToFilter('attribute_id',$name_id->getId())
                ->addFieldToFilter('entity_id', array('regexp'=>"[$entity]"));

            foreach ($collection2 as $c)
            {
                $category_name[] = $c['value'];
            }


            $tree = new Varien_Data_Tree();
            $node = new Varien_Data_Tree_Node( 'id', $tree, $menu);

            foreach ($menuCollection as $menuItem) {

                $menuItem['name'];

                if (in_array($menuItem['name'], $category_name)) {
                    $menuCollection->delete($menuItem);
                }

                $node->addChild($menuItem);
            }

            $node->setData('is_active', $active);
            $menuCollection->add($node);
        }

        if (!Mage::getSingleton('customer/session')->isLoggedIn() && strpos(Mage::helper('core/url')->getCurrentUrl(), '.html') !== false) {

            $lastPage = Mage::helper('core/url')->getCurrentUrl();
            $session = Mage::getSingleton('core/session');
            $session->setData('last', $lastPage);
            Mage::app()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
        }
    }

    public function beforeLoad()
    {
        $session = Mage::getSingleton('core/session');
        $lastPage = $session->getData('last');
        $session = Mage::getSingleton('customer/session');
        $session->setAfterAuthUrl($lastPage);


    }
}



