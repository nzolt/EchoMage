<?php
class EchoMage_Cupons_Block_Adminhtml_Cupontype_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("cupons_form", array("legend"=>Mage::helper("cupons")->__("Item information")));

				
						$fieldset->addField("code", "text", array(
						"label" => Mage::helper("cupons")->__("Code"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "code",
						));
					
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("cupons")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("value", "text", array(
						"label" => Mage::helper("cupons")->__("Value"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "value",
						));
									
						 $fieldset->addField('value_type', 'select', array(
						'label'     => Mage::helper('cupons')->__('Value type'),
						'values'   => EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getValueArray3(),
						'name' => 'value_type',					
						"class" => "required-entry",
						"required" => true,
						));				
						 $fieldset->addField('active', 'select', array(
						'label'     => Mage::helper('cupons')->__('Active'),
						'values'   => EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getValueArray4(),
						'name' => 'active',					
						"class" => "required-entry",
						"required" => true,
						));				
						 $fieldset->addField('type', 'select', array(
						'label'     => Mage::helper('cupons')->__('Type'),
						'values'   => EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getValueArray6(),
						'name' => 'type',					
						"class" => "required-entry",
						"required" => true,
						));
						$fieldset->addField("prefix", "text", array(
						"label" => Mage::helper("cupons")->__("Prefix"),
						"name" => "prefix",
						));
					
						$fieldset->addField("length", "text", array(
						"label" => Mage::helper("cupons")->__("Code length"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "length",
						));
					
						$fieldset->addField("sufix", "text", array(
						"label" => Mage::helper("cupons")->__("Sufix"),
						"name" => "sufix",
						));
									
						 $fieldset->addField('unique', 'select', array(
						'label'     => Mage::helper('cupons')->__('Unique / Customer'),
						'values'   => EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getValueArray17(),
						'name' => 'unique',
						));

				if (Mage::getSingleton("adminhtml/session")->getCupontypeData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCupontypeData());
					Mage::getSingleton("adminhtml/session")->setCupontypeData(null);
				} 
				elseif(Mage::registry("cupontype_data")) {
				    $form->setValues(Mage::registry("cupontype_data")->getData());
				}
				return parent::_prepareForm();
		}
}
