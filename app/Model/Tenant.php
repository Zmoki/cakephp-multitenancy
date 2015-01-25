<?php
/**
 * Created by PhpStorm.
 * User: Зарема
 * Date: 24.01.2015
 * Time: 3:39
 */

App::uses('AppModel', 'Model');

class Tenant extends AppModel{

    public $validate = array(
        'domain' => 'isUnique',
        'client_name' => 'notempty'
    );

    public function __construct($id = false, $table = null, $ds = null){
        parent::__construct($id, $table, $ds);

        if($this->Behaviors->loaded('InTenant')){
            $this->Behaviors->unload('InTenant');
        }
    }
}