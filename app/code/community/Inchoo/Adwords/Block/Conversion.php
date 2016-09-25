<?php
/**
 * @category   Google
 * @package    Inchoo_Adwords
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Inchoo_Adwords_Block_Conversion extends Mage_Core_Block_Template
{

    public function isTrackingEnabled()
    {
        return (bool)(int)$this->getConfig('conversion_tracking_enabled');
    }

    public function getConversionId()
    {
        return $this->getConfig('conversion_id');
    }

    public function getLanguage()
    {
        return $this->getConfig('conversion_language');
    }

    public function getFormat()
    {
        return $this->getConfig('conversion_format');
    }

    public function getColor()
    {
        return $this->getConfig('conversion_color');
    }

    public function getLabel()
    {
        return $this->getConfig('conversion_label');
    }

    public function getRemarketingOnly()
    {
        return $this->getConfig('conversion_remarketing_only')
            ? 'true'
            : 'false';
    }

    protected function getConfig($key)
    {
        return Mage::getStoreConfig('google/analytics/' . $key);
    }

    public function getOrderTotal()
    {
        $orderId = (int) Mage::getSingleton('checkout/session')
            ->getLastOrderId();
        if ($orderId) {
	        $order = Mage::getModel('sales/order')->load($orderId);
    	    if ($order->getId()) {
        	    return round($order->getGrandTotal(), 2);
        	}
        }
        return 0;
    }

    public function getOrderCurrency()
    {
        $orderId = (int) Mage::getSingleton('checkout/session')
            ->getLastOrderId();
        if ($orderId) {
        	$order = Mage::getModel('sales/order')->load($orderId);
        	if ($order->getId()) {
	            return $order->getOrderCurrencyCode();
    	    }
    	}
        return '';
    }
}
