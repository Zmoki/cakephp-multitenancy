# CakePHP Multitenancy

1. Create `tenants` table in DB: in console run `cake schema run create Tenants` or use **app\Schema\tenants.sql**
2. Add in **bootstrap.php** cache configuration. Sample:

```php
Cache::config('tenants', array('engine' => 'File', 'path' => CACHE . 'tenants' . DS));
```

3. Add component in **AppController.php**

```php
public $components = array(
    'Tenancy' => array(
        'cache_config' => 'tenants'
    )
);
```

4. Add InTenant behavior in **AppModel.php**:

```php
public $actsAs = array('InTenant');
```

5. Add field `tenant_id` in tables
