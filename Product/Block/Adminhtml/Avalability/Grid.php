<?php

class Virtua_Product_Block_Adminhtml_Avalability_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('id');
        $this->setDefaultSort('id');

    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('virtua_product/product')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('id', array(
            'index' => 'id',
            'header' => Mage::helper('virtua_product')->__('Id'),
            'type' => 'number',
            'sortable' => true,
            'width' => '100px',
        ));

        $this->addColumn('product_id', array(
            'index' => 'product_id',
            'header' => Mage::helper('virtua_product')->__('Product_id'),
            'type' => 'number',
            'sortable' => false,
            'width' => '100px',
        ));

        $this->addColumn('name', array(
            'index' => 'name',
            'header' => Mage::helper('virtua_product')->__('Name'),
            'type' => 'text',
            'sortable' => false,
            'width' => '100px',
        ));

        $this->addColumn('email', array(
            'index' => 'email',
            'header' => Mage::helper('virtua_product')->__('Email'),
            'type' => 'text',
            'sortable' => false,
            'width' => '100px',
        ));

        $this->addColumn('create', array(
            'index' => 'create',
            'header' => Mage::helper('virtua_product')->__('Create'),
            'type' => 'text',
            'sortable' => false,
            'width' => '100px',
        ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
{
    return $this->getUrl('*/*/index', array(
        '_current' => true,
    ));
}


}