<?php
class Virtua_Guestbook_Block_Adminhtml_Guest_Grid extends Mage_Adminhtml_Block_Widget_Grid {
  protected function _prepareCollection() {
    $collection = Mage::getResourceModel(
            'virtua_guestbook/guestbook_collection'
    );
    $this->setCollection($collection);
    return parent::_prepareCollection();
  }

  protected function _prepareColumns() {
    $this->addColumn('id', array(
      'header' => $this->_getHelper()->__('ID'),
      'type' => 'number',
      'index' => 'id',
    ));
    $this->addColumn('name', array(
      'header' => $this->_getHelper()->__('Imie'),
      'type' => 'text',
      'index' => 'name',
    ));
    $this->addColumn('surname', array(
      'header' => $this->_getHelper()->__('Nazwisko'),
      'type' => 'text',
      'index' => 'surname',
    ));
    $this->addColumn('message', array(
      'header' => $this->_getHelper()->__('Wiadomosc'),
      'type' => 'text',
      'index' => 'message',
    ));
    $this->addColumn('create', array(
      'header' => $this->_getHelper()->__('Utworzono'),
        'type' => 'text',
        'index' => 'create',
    ));
    $this->addColumn('visible', array(
        'header' => $this->_getHelper()->__('Widoczny'),
        'type' => 'text',
        'index' => 'visible',
    ));
    return parent::_prepareColumns();
  }
  protected function _getHelper() {
    return Mage::helper('virtua_guestbook');
  }

  public function getRowUrl($row)
  {
    return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }




}
