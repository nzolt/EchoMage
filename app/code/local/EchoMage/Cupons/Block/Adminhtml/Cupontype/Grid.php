<?php

class EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("cupontypeGrid");
				$this->setDefaultSort("cupontype_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("cupons/cupontype")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("cupontype_id", array(
				"header" => Mage::helper("cupons")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "cupontype_id",
				));
                
				$this->addColumn("code", array(
				"header" => Mage::helper("cupons")->__("Code"),
				"index" => "code",
				));
				$this->addColumn("name", array(
				"header" => Mage::helper("cupons")->__("Name"),
				"index" => "name",
				));
				$this->addColumn("value", array(
				"header" => Mage::helper("cupons")->__("Value"),
				"index" => "value",
				));
						$this->addColumn('value_type', array(
						'header' => Mage::helper('cupons')->__('Value type'),
						'index' => 'value_type',
						'type' => 'options',
						'options'=>EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray3(),				
						));
						
						$this->addColumn('active', array(
						'header' => Mage::helper('cupons')->__('Active'),
						'index' => 'active',
						'type' => 'options',
						'options'=>EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray4(),				
						));
						
						$this->addColumn('type', array(
						'header' => Mage::helper('cupons')->__('Type'),
						'index' => 'type',
						'type' => 'options',
						'options'=>EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray6(),				
						));
						
				$this->addColumn("prefix", array(
				"header" => Mage::helper("cupons")->__("Prefix"),
				"index" => "prefix",
				));
				$this->addColumn("length", array(
				"header" => Mage::helper("cupons")->__("Code length"),
				"index" => "length",
				));
				$this->addColumn("sufix", array(
				"header" => Mage::helper("cupons")->__("Sufix"),
				"index" => "sufix",
				));
						$this->addColumn('unique', array(
						'header' => Mage::helper('cupons')->__('Unique / Customer'),
						'index' => 'unique',
						'type' => 'options',
						'options'=>EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray17(),				
						));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		static public function getOptionArray3()
		{
            $data_array=array(); 
			$data_array[1]='percent';
			$data_array[2]='value';
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
			foreach(EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray3() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array[1]='yes';
			$data_array[0]='no';
            return($data_array);
		}
		static public function getValueArray4()
		{
            $data_array=array();
			foreach(EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray6()
		{
            $data_array=array(); 
			$data_array[1]='newsletter';
			$data_array[2]='registration';
			$data_array[3]='general';
            return($data_array);
		}
		static public function getValueArray6()
		{
            $data_array=array();
			foreach(EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray6() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray17()
		{
            $data_array=array(); 
			$data_array[1]='yes';
			$data_array[0]='no';
            return($data_array);
		}
		static public function getValueArray17()
		{
            $data_array=array();
			foreach(EchoMage_Cupons_Block_Adminhtml_Cupontype_Grid::getOptionArray17() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}