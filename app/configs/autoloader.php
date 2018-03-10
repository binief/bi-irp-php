<?php

spl_autoload_register(function ($class)
{
    
    $controllerDir = '../controllers/';
    $modelDir = '../models/';
    $servicesDir = '../services/';
    $configsDir = '../configs/';
    $myclass ='';
    if (strpos($class, 'controller') !== false)
    {
        $myclass = $controllerDir . $class . '.php';
    }
    else if(strpos($class, 'model') !== false)
    {
        $myclass = $modelDir . $class . '.php';
    }
        else if(strpos($class, 'service') !== false)
    {
        $myclass = $servicesDir . $class . '.php';
    }
    else if(strpos($class, 'config') !== false)
    {
        $myclass = $configsDir . $class . '.php';
    }
    require_once($myclass);
});

?>