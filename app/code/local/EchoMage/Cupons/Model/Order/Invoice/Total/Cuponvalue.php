<?php
class EchoMage_Cupons_Model_Order_Invoice_Total_Cuponvalue
extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
		$order=$invoice->getOrder();
        $orderCuponvalueTotal = $order->getCuponvalueTotal();
        if ($orderCuponvalueTotal&&count($order->getInvoiceCollection())==0) {
            $invoice->setGrandTotal($invoice->getGrandTotal()+$orderCuponvalueTotal);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal()+$orderCuponvalueTotal);
        }
        return $this;
    }
}