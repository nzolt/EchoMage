<?php
class EchoMage_Cupons_Model_Quote_Address_Total_Cuponvalue 
extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
     public function __construct()
    {
         $this -> setCode('cuponvalue_total');
         }
    /**
     * Collect totals information about cuponvalue
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function collect(Mage_Sales_Model_Quote_Address $address)
    {
         parent :: collect($address);
         $items = $this->_getAddressItems($address);
         if (!count($items)) {
            return $this;
         }
         $quote= $address->getQuote();

		 //amount definition

         $cuponvalueAmount = 0.01;

         //amount definition

         $cuponvalueAmount = $quote -> getStore() -> roundPrice($cuponvalueAmount);
         $this -> _setAmount($cuponvalueAmount) -> _setBaseAmount($cuponvalueAmount);
         $address->setData('cuponvalue_total',$cuponvalueAmount);

         return $this;
     }
    
    /**
     * Add cuponvalue totals information to address object
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
         parent :: fetch($address);
         $amount = $address -> getTotalAmount($this -> getCode());
         if ($amount != 0){
             $address -> addTotal(array(
                     'code' => $this -> getCode(),
                     'title' => $this -> getLabel(),
                     'value' => $amount
                    ));
         }
        
         return $this;
     }
    
    /**
     * Get label
     * 
     * @return string 
     */
     public function getLabel()
    {
         return Mage :: helper('cupons') -> __('Used cupon');
    }
}