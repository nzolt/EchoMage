<?php
class EchoMage_Cupons_Adminhtml_CuponsbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Customer cupons"));
	   $this->renderLayout();
    }
}