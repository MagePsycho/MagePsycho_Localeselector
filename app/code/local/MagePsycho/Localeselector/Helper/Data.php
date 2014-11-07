<?php
/**
 * @category   MagePsycho
 * @package    MagePsycho_Localeselector
 * @author     magepsycho@gmail.com
 * @website    http://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MagePsycho_Localeselector_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getConfig($field, $default = null){
        $value = Mage::getStoreConfig('localeselector/option/'.$field);
        if(!isset($value) or trim($value) == ''){
            return $default;
        }else{
            return $value;
        }
	}

    public function log($data){
        if(is_array($data) || is_object($data)){
            $data = print_r($data, true);
        }
        Mage::log($data, null, 'localeselector.log');
	}

    public function getLanguageSelect()
    {
        $default_locale = '';
        if(Mage::app()->getCookie()->get('magepsycho_localeselector')){
            $default_locale = Mage::app()->getCookie()->get('magepsycho_localeselector');
        }else{
            $default_locale = Mage::app()->getLocale()->getLocaleCode();
        }

		$locales = $alocales = Mage::app()->getLocale()->getTranslatedOptionLocales();
		if($this->getConfig('lallowspecific') == 1){
			$locales			= array();
			$specificLocales	= explode(',', $this->getConfig('specificlocale'));
			foreach($alocales as $_locale){
				foreach ($specificLocales as $_slocale){
					if($_locale['value'] == $_slocale){
						$locales[] = array('value' => $_locale['value'], 'label' => $_locale['label']);
					}
				}
			}
		}

        $html = Mage::app()->getLayout()->createBlock('adminhtml/html_select')
            ->setName('locale')
            ->setId('interface_locale')
            ->setTitle(Mage::helper('page')->__('Select Locale'))
            ->setExtraParams('style="width:231px"')
            ->setValue($default_locale)
            ->setOptions($locales)
            ->getHtml();
        return $html;
    }


}