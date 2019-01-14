<?php
/**
 * Rewrites Mage_Core_Model_Store
 * Returns currency code based on visitor's IP Address
 *
 * @category   Chapagain
 * @package    Chapagain_AutoCurrency
 * @version    0.2.0
 * @author     Mukesh Chapagain <mukesh.chapagain@gmail.com> 
 * @link 	   http://blog.chapagain.com.np/category/magento/
 */
 
class Chapagain_AutoCurrency_Model_Store extends Mage_Core_Model_Store
{    	
    /**
     * Update default store currency code
     *
     * @return string
     */
    public function getDefaultCurrencyCode()
    {
		if (Mage::helper('autocurrency')->isEnabled()) {
			$result = $this->getConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_DEFAULT);		
			return $this->getCurrencyCodeByIp($result);
		} else {
			return parent::getDefaultCurrencyCode();
		}
    }
		
	/**
     * Get Currency code by IP Address
     *
     * @return string
     */
	public function getCurrencyCodeByIp($result = '') 
	{		
		$databaseSource = Mage::helper('autocurrency')->getDatabaseSource();
		
		if ($databaseSource == 'maxmind') {		
			$currencyCode = $this->getCurrencyCodeMaxMind();
		} else {
			$currencyCode = $this->getCurrencyCodeIp2Country(); 
		}
				
		// if currencyCode is not present in allowedCurrencies
		// then return the default currency code
		$allowedCurrencies = Mage::getModel('directory/currency')->getConfigAllowCurrencies();		
		if(!in_array($currencyCode, $allowedCurrencies)) {
			return $result;
		}
		
		return $currencyCode;
	}
	
	/**
     * Get Currency code by IP Address
     * Using Ip2Country Database
     *
     * @return string
     */
	public function getCurrencyCodeIp2Country() 
	{
		// load Ip2Country database
		$ipc = Mage::helper('autocurrency')->loadIp2Country();
		
		// get IP Address
		$ipAddress = Mage::helper('autocurrency')->getIpAddress();
				
		// additional valid ip check 
		// because Ip2Country generates error for invalid IP address
		if (!Mage::helper('autocurrency')->checkValidIp($ipAddress)) {
			return null;
		}
		
		$countryCode = $ipc->lookup($ipAddress);
				
		$currencyCode = Mage::helper('autocurrency')->getCurrencyByCountry($countryCode);
		
		return $currencyCode;
	}
	
	/**
     * Get Currency code by IP Address
     * Using MaxMind Database
     *
     * @return string
     */
	public function getCurrencyCodeMaxMind()
	{

        $ipAddress = Mage::helper('autocurrency')->getIpAddress();

        $reader = new \GeoIp2\Database\Reader(BP . '/var/geoip/GeoLite2-Country.mmdb');

        try{
            $countryCode = $reader->country($ipAddress);
            $countryCode = $countryCode->country->isoCode;
        }catch (Exception $e){
            return;
        }

        if(!$countryCode ){
            return;
        }

		// get currency code from country code
		//$currencyCode = geoip_currency_code_by_country_code($geoIp, $countryCode);
		$currencyCode = Mage::helper('autocurrency')->getCurrencyByCountry($countryCode);
		
		// close the geo database  
//		geoip_close($geoIp);
		
		return $currencyCode;
	}
}
