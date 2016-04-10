<?php
class EchoMage_Cupons_Block_Adminhtml_Customercupons_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("customercupons_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("cupons")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("cupons")->__("Item Information"),
				"title" => Mage::helper("cupons")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("cupons/adminhtml_customercupons_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
