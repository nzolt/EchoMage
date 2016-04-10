<?php


class EchoMage_Cupons_Block_Adminhtml_Cupontype extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_cupontype";
	$this->_blockGroup = "cupons";
	$this->_headerText = Mage::helper("cupons")->__("Cupontype Manager");
	$this->_addButtonLabel = Mage::helper("cupons")->__("Add New Item");
	parent::__construct();
	
	}

}