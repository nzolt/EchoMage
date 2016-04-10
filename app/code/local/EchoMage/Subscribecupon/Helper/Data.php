<?php
/**
 * EchoMage_Subscribecupon
**/
class EchoMage_Subscribecupon_Helper_Data extends Mage_Core_Helper_Abstract {

	private function generateCuponCode() {
		$mt=microtime(true);
		return strtoupper(dechex($mt));
	} 

	public function addCuponCode($email) {

		$session = Mage::getSingleton('core/session');

        $cupon_name = 'Newsletter subscriber - ' . $email;
        $cupon_value = Mage::getStoreConfig('newsletter/subscribecupon/cuponvalue');
        $cupon_valid = date('Y-m-d', strtotime('+' . Mage::getStoreConfig('newsletter/subscribecupon/cuponvalid') . ' days'));

        $used = false;
        $collection = Mage::getModel('salesrule/rule')->getResourceCollection();
        foreach ($collection as $sales_rule) {
                if ($sales_rule->getName() == $cupon_name) {
                        $used = true;
                }
        }

        if ($used) {
        	$session->addNotice('This cupon was already used by ' . $email);
        }
        else {
			$cupon_code = Mage::getStoreConfig('newsletter/subscribecupon/cuponprefix')
                . $this->generateCuponCode();

			$customerGroups = Mage::getModel('customer/group')->getCollection();
			$groups = array();
			foreach ($customerGroups as $group){
				$groups[] = $group->getId();
			}

			$sales_rule = Mage::getModel('salesrule/rule');
			$sales_rule->setName($cupon_name);
			$sales_rule->setDescription('Newsletter subscription cupon');
			$sales_rule->setFromDate(date('Y-m-d'));
			$sales_rule->setToDate($cupon_valid);
			$sales_rule->setCouponCode($cupon_code);
			$sales_rule->setUsesPerCoupon(1);
			$sales_rule->setUsesPerCustomer(1);
			$sales_rule->setCustomerGroupIds($groups);
			$sales_rule->setIsActive(1);
			$sales_rule->setStopRulesProcessing(1);
			$sales_rule->setIsRss(0);
			$sales_rule->setIsAdvanced(1);
			$sales_rule->setProductIds('');
			$sales_rule->setSortOrder(0);			 
			$sales_rule->setSimpleAction('cart_fixed');
			$sales_rule->setDiscountAmount($cupon_value);
			$sales_rule->setDiscountQty(0);
			$sales_rule->setDiscountStep(0);
			$sales_rule->setSimpleFreeShipping(0);
			$sales_rule->setApplyToShipping(0);
			$sales_rule->setWebsiteIds(1);

			$sales_rule->loadPost($sales_rule->getData());
			$sales_rule->setCouponType(2);

			$labels = array();
			$labels[1] = 'NS - ' . $cupon_value . ' cupon';
			
			$sales_rule->setStoreLabels($labels);
			
			$sales_rule->save();

			$template = Mage::getStoreConfig('newsletter/subscribecupon/emailtext');
			try{
				$this->sendEmail($email, $template, $cupon_code, $cupon_value);
				$session->addSuccess('The cupon sent to ' . $email);
			}
			catch (Exception $e)
			{
				$session->addException('The cupon code can not be send');
				Mage::log('Email subscrime cupon is not sent' . PHP_EOL
				. 'Cupon code: ' . $cupon_code . PHP_EOL
				. 'to: ' . $email . PHP_EOL, 'newsletter_cupons.log');
			}

			return $cupon_code;
		}
	}

	public function sendEmail($email, $template, $cupon_code, $cupon_value = null) {

        $store = Mage::app()->getStore()->getName();
        $subject = Mage::getStoreConfig('newsletter/subscribecupon/emailsubject');

        $email_template  = Mage::getModel('core/email_template')
            ->loadDefault('subscribecupon_email_template');

        $codes = array('{cupon_code}','{cupon_value}','{store}');
        $values = array($cupon_code,$cupon_value,$store);
        $template = str_replace($codes, $values, $template);

        $sender_name = Mage::getStoreConfig(Mage_Core_Model_Store::XML_PATH_STORE_STORE_NAME);
        $sender_email = Mage::getStoreConfig('trans_email/ident_general/email');
        $email_template->setSenderName($sender_name);
        $email_template->setSenderEmail($sender_email);
        $email_template->send($email, $email, array('subject' => $subject,'content' => $template));
    }
}