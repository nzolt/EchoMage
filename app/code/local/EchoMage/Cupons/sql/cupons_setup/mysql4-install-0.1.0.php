<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
	->newTable($installer->getTable('cupons/cupontype'))
	->addColumn('cupontype_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'unsigned'  => true,
		'nullable'  => false,
		'primary'   => true,
	), 'Id')
	->addColumn('code', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
	), 'Code')
	->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
	), 'Name')
	->addColumn('value', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
	), 'Value')
	->addColumn('value_type', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
	), 'Value type')
	->addColumn('active', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
		'nullable'  => false,
	), 'Active')
	->addColumn('type', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
	), 'Type')
	->addColumn('prefix', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => true,
	), 'Prefix')
	->addColumn('length', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => true,
	), 'Length')
	->addColumn('sufix', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => true,
	), 'Sufix')
	->addColumn('unique', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
		'nullable'  => true,
	), 'Unique');
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
	->newTable($installer->getTable('cupons/customercupons'))
	->addColumn('customer_cupon_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'unsigned'  => true,
		'nullable'  => false,
		'primary'   => true,
	), 'Id')
	->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
	), 'Customer')
	->addColumn('cupon_type', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
	), 'Cupon type')
	->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
	), 'E-mail address')
	->addColumn('cupon_code', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
		'nullable'  => false,
	), 'Cupon code')
	->addColumn('used', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
		'nullable'  => true,
	), 'Used')
	->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => true,
	), 'Order')
	->addColumn('used_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => true,
	), 'Used')
	/*->addForeignKey(
		$installer->getFkName('cupons/customercupons', 'customer_id', 'customer/entity','entity_id'),
		'customer_id',
		$installer->getTable('customer/entity'),
		'entity_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE
	)*/
	->addForeignKey(
		$installer->getFkName('cupons/customercupons', 'cupon_type', 'cupons/cupontype','cupontype_id'),
		'cupon_type',
		$installer->getTable('cupons/cupontype'),
		'cupontype_id',
		Varien_Db_Ddl_Table::ACTION_CASCADE,
		Varien_Db_Ddl_Table::ACTION_CASCADE
	)
    ->addForeignKey(
        $installer->getFkName('cupons/customercupons', 'order_id', 'sales/order','entity_id'),
        'order_id',
        $installer->getTable('sales/order'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    );

$installer->getConnection()->createTable($table);

$installer->run($sql);

$installer->endSetup();
	 