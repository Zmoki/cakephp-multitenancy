# CakePHP Multitenancy

1. Create `tenants` table in DB:
    1.1 in console `cake schema run create Tenants`
    1.2 or use app\Schema\tenants.sql
2. Add in bootstrap.php cache configuration. Sample: `Cache::config('tenants', array('engine' => 'File', 'path' => CACHE . 'tenants' . DS));`
3. Add component in AppController.php
    ```php
    public $components = array(
        'Tenancy' => array(
            'cache_config' => 'tenants'
        )
    );
    ```
4. Add InTenant Behavior in AppModel:
    ```php
    public $actsAs = array('InTenant');
    ```
5. Add field `tenant_id` in tables
