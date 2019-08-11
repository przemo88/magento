<?php
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();

$installer->addAttribute(
    'catalog_product',
    'delivery_time',
    array(
        'type'          => 'int',
        'input' => 'number',
        'group' => 'Delivery',
        'label'         => 'Czas dostawy',
        'required'      => false,

    )
);

$installer->addAttribute(
    'catalog_product',
    'no_delivery_date',
    array(
        'type'          => 'varchar',
        'group' => 'Delivery',
        'input' => 'multidate',
        'label'         => 'Dni bez dostawy',
        'required'      => false,

    )
);

$installer->endSetup();

/*$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_product', 'delivery_time',
    array(
        'group' => 'Delivery',
        'type' => 'text',
        'label' => 'Delivery ',
        'input' => 'text',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
 'visible' => true,
 'required' => false,
        'sort-order' => 5
 ));
$installer->endSetup();*/

