<?php
class EchoMage_Cupons_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function generateCuponCode($email)
    {
        $cuponType = Mage::getModel("cupons/cupontype")
            ->getCollection()
            ->addFieldToFilter('type',1)
            ->addFieldToFilter('active',1)
            ->load();

        foreach($cuponType as $cType)
        {
            //var_dump($cType);
        }
        //die();

    }

    public function generateCode()
    {
        $mt=microtime(true);
        return strtoupper(dechex($mt));
    }
}
