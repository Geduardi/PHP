<?php


namespace App\services\renderers;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements IRenderer
{

    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            dirname(__DIR__, 2) . "/views",
            dirname(__DIR__, 2) . "/views/layouts",
        ]);
        $this->twig = new Environment($loader);
    }

//    public function render($template, $params = [])
//    {
//        $content = $this->renderTmpl($template,$params);
//        return $this->renderTmpl('layouts/main',['content'=>$content]);
//    }

    public function render($template, $params = [])
    {
        $template .= ".twig";
        return $this->twig->render($template,$params);
    }
}