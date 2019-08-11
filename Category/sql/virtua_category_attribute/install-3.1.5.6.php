<?php

$this->startSetup();
$setup = new Mage_Catalog_Model_Resource_Setup('core_setup');


$this->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'start_date', array(
   'group' => 'General Information',
    'input' => 'date',
    'type' => 'varchar',
    'label' => 'start date',
    'backend' => '',
    'visible' => true,
    'required' => false,
    'visible_on_front' => true,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$this->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'end_date', array(
    'group' => 'General Information',
    'input' => 'date',
    'type' => 'varchar',
    'label' => 'end date',
    'backend' => '',
    'visible' => true,
    'required' => false,
    'visible_on_front' => true,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$this->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'category_availability', array(
    'group' => 'General Information',
    'input' => 'multiselect',
    'type' => 'varchar',
    'label' => 'category availability',
    'backend'=>'eav/entity_attribute_backend_array',
    'visible' => true,
    'required' => false,
    'visible_on_front' => true,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'source' => 'virtua_category/options',
));

$this->endSetup();