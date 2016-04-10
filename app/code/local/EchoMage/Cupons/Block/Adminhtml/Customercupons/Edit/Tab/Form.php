<?php
class EchoMage_Cupons_Block_Adminhtml_Customercupons_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("cupons_form", array("legend"=>Mage::helper("cupons")->__("Item information")));

				
						$fieldset->addField("customer_id", "text", array(
						"label" => Mage::helper("cupons")->__("Customer"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "customer_id",
						));
					
						$fieldset->addField("cupon_type", "text", array(
						"label" => Mage::helper("cupons")->__("Cupon type"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "cupon_type",
						));
					
						$fieldset->addField("cupon_code", "text", array(
						"label" => Mage::helper("cupons")->__("Cupon code"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "cupon_code",
						));
					
						$fieldset->addField("used", "text", array(
						"label" => Mage::helper("cupons")->__("Used"),
						"name" => "used",
						));
					
						$fieldset->addField("order_id", "text", array(
						"label" => Mage::helper("cupons")->__("Order"),
						"name" => "order_id",
						));
					
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('used_date', 'date', array(
						'label'        => Mage::helper('cupons')->__('Use date'),
						'name'         => 'used_date',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));

				if (Mage::getSingleton("adminhtml/session")->getCustomercuponsData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCustomercuponsData());
					Mage::getSingleton("adminhtml/session")->setCustomercuponsData(null);
				} 
				elseif(Mage::registry("customercupons_data")) {
				    $form->setValues(Mage::registry("customercupons_data")->getData());
				}
				return parent::_prepareForm();
		}
}
