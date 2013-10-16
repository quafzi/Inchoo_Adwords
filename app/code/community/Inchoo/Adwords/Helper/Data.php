<?php
/**
 *
 * @category   Inchoo
 * @package    Inchoo Google Adwords
 * @author     Domagoj Potkoc, Inchoo Team <domagoj.potkoc@surgeworks.com>
 */
class Inchoo_Adwords_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	
	
	
	public function getOrderTotal()
	{
		$orderId = (int) Mage::getSingleton('checkout/session')->getLastOrderId();
    	
        $resurce = Mage::getModel('sales/order')->getResource();
        $select = $resurce->getReadConnection()->select()
            ->from(array('o' => $resurce->getTable('sales/order')), 'subtotal')
            ->where('o.entity_id=?', $orderId)
        ;
        
        $result = $resurce->getReadConnection()->fetchRow($select);
        
    	if($result['subtotal'] > 0)
        return round($result['subtotal'],2);
        else 
        return 1;
	}
	
	
	public function isTrackingAllowed()
    {
        return Mage::getStoreConfigFlag('adwordsmodule/inchoad/enabled');
    }


}