<?php
/**
 * EchoMage_Subscribecupon
**/
class EchoMage_Subscribecupon_GenerateController extends Mage_Core_Controller_Front_Action
{
    public function cuponcodeAction() {
        $helper = Mage::helper('subscribecupon');

        $params = $this->getRequest()->getParams();
        $email = $params['email'];
        $email = explode(',',$email);die($email);
        $email = $email[0];

        $value = Mage::getStoreConfig('Subscribecupon/cuponvalue');
        
        $helper->addCuponCode($email, $value);

        $this->_redirectUrl('/');

    }
}