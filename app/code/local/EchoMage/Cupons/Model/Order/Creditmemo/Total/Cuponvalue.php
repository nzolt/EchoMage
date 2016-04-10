<?php
class EchoMage_Cupons_Model_Order_Creditmemo_Total_Cuponvalue 
extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {

		return $this;

        $order = $creditmemo->getOrder();
        $orderCuponvalueTotal        = $order->getCuponvalueTotal();

        if ($orderCuponvalueTotal) {
			$creditmemo->setGrandTotal($creditmemo->getGrandTotal()+$orderCuponvalueTotal);
			$creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal()+$orderCuponvalueTotal);
        }

        return $this;
    }
}