<?php
/**
 * Created by PhpStorm.
 * User: Зарема
 * Date: 24.01.2015
 * Time: 0:50
 */

App::uses('Component', 'Controller');
App::uses('Tenant', 'Model');

/**
 * Component for multitenancy based on domain
 *
 * @author Zarema Khalilova
 * @copyright 2015, Zarema Khalilova
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link https://github.com/Zmoki/cakephp-multitenancy
 */
class TenancyComponent extends Component{

    protected $_cache_config = 'default';

    public function __construct(ComponentCollection $collection, $settings = array()){
        if(!empty($settings['cache_config'])){
            $this->_cache_config = $settings['cache_config'];
        }
    }

    public function initialize(Controller $controller){
        if(Configure::check('Tenant.id')){
            return;
        }

        $domain = explode('//', FULL_BASE_URL)[1];

        $tenant = Cache::read($domain, $this->_cache_config);

        if(!isset($tenant['Tenant'])){
            $this->Tenant = new Tenant();

            $tenant = $this->Tenant->find('first', array(
                'conditions' => compact('domain')
            ));

            if(!isset($tenant['Tenant'])){
                throw new NotFoundException(__('Relevant tenant specified domain is not found'));
            }

            Cache::write($domain, $tenant, $this->_cache_config);
        }

        Configure::write('Tenant', $tenant['Tenant']);
    }
}