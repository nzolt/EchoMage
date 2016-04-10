<?php
class EchoMage_Cupons_Model_Mysql4_Customercupons extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("cupons/customercupons", "customer_cupon_id");
    }
}