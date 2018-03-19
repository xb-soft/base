### Base
base env of xbsoft

 - install
 
```
composer require "xbsoft/base"
```

 - example
 
```
<?php
/*
 * entry file
 */
require_once 'xxxxx/vendor/xbsoft/base/Xb.php';
...
$application->run();
?>

<?php
namespace 'your namespace';

use xb;

/*
 * singleton
 */
Xb::createObject('xxxx\\xxxx\\ClassName');

/*
 * inject args
 */
Xb::createObject('xxxx\\xxxx\\ClassName', true, $args1, $args2, $args3);
//or this
$args = [
	'a', 'b', 'c', 'd',
];
Xb::createObject('xxxx\\xxxx\\ClassName', true, ...$args);

/*
 * callable
 */
Xb::createObject(function () {
	return new ClassName;
}, ...);