<?php
/**
 * @category   MagePsycho
 * @package    MagePsycho_Localeselector
 * @author     magepsycho@gmail.com
 * @website    http://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MagePsycho_Localeselector_Model_System_Config_Source_Locales
{
    public function toOptionArray()
    {
		$locales = Mage::app()->getLocale()->getTranslatedOptionLocales();
        return $locales;
    }
}