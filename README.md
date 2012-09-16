#Primal.Environment

Created and Copyright 2012 by Jarvis Badgley, chiper at chipersoft dot com.

Environment is a very simple data storage class for saving and retrieving environmental configuration variables, such as would be defined in a project's config file.

* Any value can be stored or retrieved by calling a function with the name, prefixed by get or set.
* Example:  `$env->setConvertPath('/path/to/convert')` or `$env->getConvertPath()`
* Values can also be set or retrieved directly by name: `$env->convertPath`
* Set functions return $this to allow chaining
* Any undefined value will retrieve as `null`

##Example:

```php
//config.php
Environment::Singleton()
    ->setName('development')
    ->setDBName('PrimalTest')
    ->setDBUser('php')
    ->setDBPassword('Ornare856')
    ->setDebug(true)
;
```