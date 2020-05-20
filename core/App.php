<?php


namespace App\core;


use App\controllers\Controller;
use App\services\BasketServices;
use App\services\DB;
use App\services\renderers\TwigRender;
use App\services\Request;

/**
 * Class App
 * @package App\core
 *
 * @property Request request
 * @property DB db
 * @property BasketServices BasketServices
 */

class App
{
    private $config;
    private $container;

    public function __construct($config)
    {
        $this->config = $config;
        $this->runController();

    }

    public function getContainer()
    {
        if (empty($this->container)){
            $this->container = new Container($this->getConfig('components'));
        }
        return $this->container;

    }

    protected function runController()
    {
        $request = $this->request;

        $controllerName = $request->getControllerName();
        if (empty($controllerName)) {
            $controllerName = 'good';

        }
        $actionName = $request->getActionName();


        $controllerClass = "\\App\\controllers\\" . ucfirst($controllerName) . 'Controller';
        $renderer = new TwigRender();
        if (class_exists($controllerClass)){
            /**
             * @var Controller $controller
             */
//            $renderer = new TmplRenderer();
            $controller = new $controllerClass($renderer, $this);
            echo $controller->run($actionName);
        } else {
            echo $renderer->render('404');
        }
    }

    public function __get($name)
    {
        return $this->getContainer()->$name;
    }

    public function getConfig($name = '')
    {
        if (empty($name)){
            return $this->config;
        }

        if (empty($this->config[$name])){
            return null;
        }

        return $this->config[$name];
    }
}