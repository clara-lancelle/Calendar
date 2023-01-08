<?php

require 'autoloader.php';

if (count($_GET) > 0) {
    $params = $_GET['params']; // given by the URL

    $arguments = explode('/', $params);
    $controller = $arguments[0] ?? null;
} else {
    $controller = 'calendar';
}

$controllerNamespace = 'src\\Controller\\' . ucfirst($controller) . 'Controller';

if (class_exists($controllerNamespace)) {
    $instance = new $controllerNamespace();
    $instance->generate();
    
}
