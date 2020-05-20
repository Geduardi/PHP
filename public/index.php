<?php

//phpinfo();exit;
//include dirname(__DIR__) . "/services/Autoloader.php";
//spl_autoload_register([new App\services\Autoloader(), 'loadClass']);
include dirname(__DIR__) . "/vendor/autoload.php";

$config = include dirname(__DIR__) . '/config/main.php';

new \App\core\App($config);
