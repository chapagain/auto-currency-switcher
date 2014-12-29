<?php
/**
 * Used in creating options config value selection
 *
 * @category   Chapagain
 * @package    Chapagain_AutoCurrency
 * @version    0.2.0
 * @author     Mukesh Chapagain <mukesh.chapagain@gmail.com> 
 * @link 	   http://blog.chapagain.com.np/category/magento/
 */
class Chapagain_AutoCurrency_Model_System_Config_Source_Database
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'ip2country', 'label'=>Mage::helper('autocurrency')->__('IP to Country')),
            array('value' => 'maxmind', 'label'=>Mage::helper('autocurrency')->__('Max Mind')),            
        );
    }

	/**
	 * Get options in "key-value" format
	 *
	 * @return array
	 */
	public function toArray()
	{
		return array(
			'ip2country' => Mage::helper('autocurrency')->__('IP to Country'),
			'maxmind' => Mage::helper('autocurrency')->__('Max Mind'),			
		);
	}
}
