<?php
/**
 * @category   MagePsycho
 * @package    MagePsycho_Localeselector
 * @author     magepsycho@gmail.com
 * @website    http://www.magepsycho.com 
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MagePsycho_Localeselector_Model_Observer
{
	public function setLocaleSetting($observer = null)
	{        
        $locale = Mage::app()->getRequest()->getPost('locale');
        if ($locale) {
            Mage::getSingleton('adminhtml/session')->setLocale($locale);
            Mage::app()->getCookie()->set('magepsycho_localeselector', $locale);
            #Mage::helper('localeselector')->log('admin-login-success:' . $locale);
        }
    }
}