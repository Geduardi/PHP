<?php

use App\services\DB;
use App\models\User;
use App\models\Good;
use App\services\renderers\TmplRenderer;
use App\services\renderers\TwigRender;

//include dirname(__DIR__) . "/services/Autoloader.php";
//spl_autoload_register([new App\services\Autoloader(), 'loadClass']);
include dirname(__DIR__) . "/vendor/autoload.php";
$request = new \App\services\Request();



$controllerName = $request->getControllerName();
$actionName = $request->getActionName();


$controllerClass = "\\App\\controllers\\" . ucfirst($controllerName) . 'Controller';
$renderer = new TwigRender();
if (class_exists($controllerClass)){
//    $renderer = new TmplRenderer();
    $controller = new $controllerClass($renderer);
    echo $controller->run($actionName);
} else {
    echo $renderer->render('404');
}
