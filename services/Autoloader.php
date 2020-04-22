<?php
namespace App\services;

class Autoloader
{
    private $dirs = [
        'models', 'services'
    ];

    public function loadClass($className)
    {
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $file = dirname(__DIR__) . '/'  . substr($className,4) . '.php';
        include $file;
    }
}