<?php
class EchoMage_Cupons_Model_Newordertotalobserver
{
	 public function saveCuponvalueTotal(Varien_Event_Observer $observer)
    {
         $order = $observer -> getEvent() -> getOrder();
         $quote = $observer -> getEvent() -> getQuote();
         $shippingAddress = $quote -> getShippingAddress();
         if($shippingAddress && $shippingAddress -> getData('cuponvalue_total')){
             $order -> setData('cuponvalue_total', $shippingAddress -> getData('cuponvalue_total'));
             }
        else{
             $billingAddress = $quote -> getBillingAddress();
             $order -> setData('cuponvalue_total', $billingAddress -> getData('cuponvalue_total'));
             }
         $order -> save();
     }
    
     public function saveCuponvalueTotalForMultishipping(Varien_Event_Observer $observer)
    {
         $order = $observer -> getEvent() -> getOrder();
         $address = $observer -> getEvent() -> getAddress();
         $order -> setData('cuponvalue_total', $shippingAddress -> getData('cuponvalue_total'));
		 $order -> save();
     }
}