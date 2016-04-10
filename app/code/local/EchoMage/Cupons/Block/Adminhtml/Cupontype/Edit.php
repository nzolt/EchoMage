<?php
	
class EchoMage_Cupons_Block_Adminhtml_Cupontype_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "cupontype_id";
				$this->_blockGroup = "cupons";
				$this->_controller = "adminhtml_cupontype";
				$this->_updateButton("save", "label", Mage::helper("cupons")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("cupons")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("cupons")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("cupontype_data") && Mage::registry("cupontype_data")->getId() ){

				    return Mage::helper("cupons")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("cupontype_data")->getId()));

				} 
				else{

				     return Mage::helper("cupons")->__("Add Item");

				}
		}
}