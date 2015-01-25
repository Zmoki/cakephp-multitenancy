<?php

/**
 * Behavior for multitenancy based on field tenant_id in tables
 *
 * @author Zarema Khalilova
 * @copyright 2015, Zarema Khalilova
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link https://github.com/Zmoki/cakephp-multitenancy
 */
class InTenantBehavior extends ModelBehavior{

    protected $_defaults = array();

    public function setup(Model $Model, $settings = array()){
        if(!isset($this->settings[$Model->alias])){
            $this->settings[$Model->alias] = array();
        }
        $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $this->_defaults, $settings);
    }

    public function beforeSave(Model $Model, $options = array()){
        if(isset($Model->_schema['tenant_id'])){
            $Model->data[$Model->alias]['tenant_id'] = Configure::read('Tenant.id');
        }

        return true;
    }

    public function beforeFind(Model $Model, $query){
        $conditions = array($Model->alias . '.tenant_id' => Configure::read('Tenant.id'));

        $query['conditions'] = isset($query['conditions']) ? array_merge($query['conditions'], $conditions) : $conditions;

        return $query;
    }
}