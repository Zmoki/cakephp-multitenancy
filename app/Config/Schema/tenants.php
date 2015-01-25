<?php
/**
 * Created by PhpStorm.
 * User: Зарема
 * Date: 26.01.2015
 * Time: 2:15
 */

/**
 * This is Tenants Schema file
 *
 * Use it to configure database for multitenancy
 *
 * Using the Schema command line utility
 * cake schema run create Tenants
 *
 * @author Zarema Khalilova
 * @copyright 2015, Zarema Khalilova
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link https://github.com/Zmoki/cakephp-multitenancy
 */
class TenantsSchema extends CakeSchema{

    public $name = 'Tenants';

    /**
     * Before callback.
     *
     * @param array $event Schema object properties
     * @return bool Should process continue
     */
    public function before($event = array()){
        return true;
    }

    /**
     * After callback.
     *
     * @param array $event Schema object properties
     * @return void
     */
    public function after($event = array()){
    }

    public $tenants = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
        'domain' => array('type' => 'string', 'null' => false, 'length' => 255),
        'client_name' => array('type' => 'string', 'null' => false, 'length' => 45),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'Domain' => array('column' => 'domain', 'unique' => 1)
        )
    );

}