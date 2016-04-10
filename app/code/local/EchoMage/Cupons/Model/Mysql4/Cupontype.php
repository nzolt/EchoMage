<?php
class EchoMage_Cupons_Model_Mysql4_Cupontype extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("cupons/cupontype", "cupontype_id");
    }
}