<?php
/**
 * @category   MagePsycho
 * @package    MagePsycho_Localeselector
 * @author     magepsycho@gmail.com
 * @website    http://www.magepsycho.com 
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
require_once 'Mage/Adminhtml/controllers/IndexController.php';
class MagePsycho_Localeselector_IndexController extends Mage_Adminhtml_IndexController
{
    public function loginAction()
    {
        if (Mage::getSingleton('admin/session')->isLoggedIn()) {
            $this->_redirect('*');
            return;
        }
        $loginData = $this->getRequest()->getParam('login');
        $data = array();

        if( is_array($loginData) && array_key_exists('username', $loginData) ) {
            $data['username'] = $loginData['username'];
        } else {
            $data['username'] = null;
        }
        $template = '';
        if(Mage::helper('localeselector')->getConfig('active')){
            $template = 'localeselector/';
        }
        $this->_outTemplate($template . 'login', $data);
    }
}