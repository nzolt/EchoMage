<?php

class EchoMage_Cupons_Block_Adminhtml_Customercupons_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("customercuponsGrid");
				$this->setDefaultSort("customer_cupon_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("cupons/customercupons")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("customer_cupon_id", array(
				"header" => Mage::helper("cupons")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "customer_cupon_id",
				));
                
				$this->addColumn("customer_id", array(
				"header" => Mage::helper("cupons")->__("Customer"),
				"index" => "customer_id",
				));
				$this->addColumn("cupon_type", array(
				"header" => Mage::helper("cupons")->__("Cupon type"),
				"index" => "cupon_type",
				));
				$this->addColumn("cupon_code", array(
				"header" => Mage::helper("cupons")->__("Cupon code"),
				"index" => "cupon_code",
				));
				$this->addColumn("used", array(
				"header" => Mage::helper("cupons")->__("Used"),
				"index" => "used",
				));
				$this->addColumn("order_id", array(
				"header" => Mage::helper("cupons")->__("Order"),
				"index" => "order_id",
				));
					$this->addColumn('used_date', array(
						'header'    => Mage::helper('cupons')->__('Use date'),
						'index'     => 'used_date',
						'type'      => 'datetime',
					));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return '#';
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('customer_cupon_id');
			$this->getMassactionBlock()->setFormFieldName('customer_cupon_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_customercupons', array(
					 'label'=> Mage::helper('cupons')->__('Remove Customercupons'),
					 'url'  => $this->getUrl('*/adminhtml_customercupons/massRemove'),
					 'confirm' => Mage::helper('cupons')->__('Are you sure?')
				));
			return $this;
		}
			

}