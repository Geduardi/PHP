<?php


namespace App\controllers;


abstract class Controller
{
    protected $defaultAction = 'all';

    public function run($actionName)
    {
        $action = $this->defaultAction;
        if (!empty($actionName)){
            if (method_exists($this, $action . 'Action')){
                $action = $actionName;
            }
        }
        $action .= 'Action';
        return $this->$action();
    }
    protected function render($template, $params = [])
    {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main',['content'=>$content]);
    }

    protected function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}