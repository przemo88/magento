<?php

class Virtua_Custompoll_Block_Send extends Mage_Core_Block_Template
{
    public  function show()
    {
        $collection = Mage::getModel('virtua_custompoll/custompoll')->getCollection();

        $collection->setOrder('id','desc');
        $collection->getSelect()->limit(1);

        return $collection;

    }

    protected function average()
    {

        $statistic = Mage::getModel('virtua_custompoll/custompoll')->getCollection()
            ->AddFieldToSelect('mage','php','win');

        $statistic->getSelect()
            ->columns('sum(mage) as sum_mage, sum(php) as sum_php , sum(win) as sum_win , count(mage) as count_mage, count(php) as count_php, count(win) as count_win');

        foreach($statistic as $s)
        {
             $s['sum_mage'];
             $s['count_mage'];
             $s['sum_php'];
             $s['count_php'];
             $s['sum_win'];
             $s['count_win'];
        }

        $averageMage = round($averageMage = $s['sum_mage']/$s['count_mage'],2);
        $averagePhp = round($averagePhp = $s['sum_php']/$s['count_php'],2);
        $averageWin = round($averageWin = $s['sum_win']/$s['count_win'],2);
        return array($averageMage,$averagePhp,$averageWin,$s['count_mage']);

    }

}