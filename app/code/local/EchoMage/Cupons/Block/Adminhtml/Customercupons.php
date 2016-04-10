<?php


class EchoMage_Cupons_Block_Adminhtml_Customercupons extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_customercupons";
	$this->_blockGroup = "cupons";
	$this->_headerText = Mage::helper("cupons")->__("Customercupons Manager");
	$this->_addButtonLabel = Mage::helper("cupons")->__("Add New Item");
	parent::__construct();
	$this->_removeButton('add');
	}

}