<?php


namespace App\services;


class Request
{
    private $queryString;
    private $controllerName;
    private $actionName;
    private $params;
    private $id;

    public function __construct()
    {
        $this->queryString = $_SERVER['REQUEST_URI'];
        $this->prepareRequest();


    }

    public function getError()
    {
        if ($this->id) {
            return;
        }

        throw new ErrorTest('Что-то пошло не так', 777);
    }

    protected function prepareRequest()
    {
        $this->params = [
            'post' => $_POST,
            'get' => $_GET,
        ];

        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->queryString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        } else {
            $this->controllerName = 'Good';
        }

        if (!empty($_GET['id'])) {
            $this->id = (int)$_GET['id'];
        }
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}