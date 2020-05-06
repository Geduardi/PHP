<?php

use App\services\DB;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoloader.php";
spl_autoload_register([new App\services\Autoloader(), 'loadClass']);

$controllerName = 'user';
if (!empty($_GET['c'])){
    $controllerName = $_GET['c'];
}

$actionName = '';
if (!empty($_GET['a'])){
    $actionName = $_GET['a'];
}

//\App\controllers\UserController

$controllerClass = "\\App\\controllers\\" . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)){
    /**
     * @var \App\controllers\UserController $controller
     */
    $controller = new $controllerClass();
    echo $controller->run($actionName);
}





//$user = new User();
//
//
//$user->id = 1;
//$user->login = 'User_2';
//$user->password = 111;
//$user->fio = 'NaN';
//$user->save();
//$user = User::getOne(3);
//$user->delete();
//$good = new Good($bd);
//var_dump(User::getAll());
//echo '<br>';
//echo $user->getOne(1);
