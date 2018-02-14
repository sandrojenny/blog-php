<?php
include("../init.php");

  $pathInfo = $_SERVER['PATH_INFO'];

  $routes = [
    '/index' => [
      'controller' => 'postController',
      'method' => 'index'
    ],
    '/post' => [
      'controller' => 'postController',
      'method' => 'show'
    ]
  ];

  if (isset($routes[$pathInfo])) {
    $routes = $routes[$pathInfo];
    $controller = $container->make($routes['controller']);
    $method = $routes['method'];
    $controller->$method();
  }

?>
