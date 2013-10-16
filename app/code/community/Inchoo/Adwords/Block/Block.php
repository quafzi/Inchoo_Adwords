<?php
/**
 *
 * @category   Inchoo
 * @package    Inchoo Google Adwords
 * @author     Domagoj Potkoc, Inchoo Team <domagoj.potkoc@surgeworks.com>
 */
class Inchoo_Adwords_Block_Block extends Mage_Core_Block_Abstract
{

	public function __construct()
    {
    	parent::__construct();
    	$this->setGoogleConversionId(Mage::getStoreConfig('adwordsmodule/inchoad/google_conversion_id'));
    	$this->setGoogleConversionLanguage(Mage::getStoreConfig('adwordsmodule/inchoad/google_conversion_language'));
    	$this->setGoogleConversionFormat(Mage::getStoreConfig('adwordsmodule/inchoad/google_conversion_format'));
    	$this->setGoogleConversionColor(Mage::getStoreConfig('adwordsmodule/inchoad/google_conversion_color'));
    	$this->setGoogleConversionLabel(Mage::getStoreConfig('adwordsmodule/inchoad/google_conversion_label'));
    }
	
	
	protected function _toHtml()
   {
   	$html = "";
   	
   	if(Mage::helper('inchoo_adwords')->isTrackingAllowed()){
   		
   	$this->setAmount(Mage::helper('inchoo_adwords')->getOrderTotal());
   	$html .= '
   	<!-- Google Code for Purchase Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = '.$this->getGoogleConversionId().';
	var google_conversion_language = "'.$this->getGoogleConversionLanguage().'";
	var google_conversion_format = "'.$this->getGoogleConversionFormat().'";
	var google_conversion_color = "'.$this->getGoogleConversionColor().'";
	var google_conversion_label = "'.$this->getGoogleConversionLabel().'";
	var google_conversion_value = 0;
	if ('.$this->getAmount().') {
  	google_conversion_value = '.$this->getAmount().';
	}
	/* ]]> */
	</script>
	<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/'.$this->getGoogleConversionId().'/?value='.$this->getAmount().'&amp;label='.$this->getGoogleConversionLabel().'&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>';
   	}
   	
   	return $html;
   }
}
