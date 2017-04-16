<?php

/**
 * Exemple du design pattern "Singleton"
 *
 * Ce design pattern permet de retourner qu'une seule instance d'une classe dans toute une application
 * PS : On utilise généralement ce design pattern si plusieurs instance d'un classe poserai problème(s)
 */

require_once 'Routing/Router.php';

use Routing\Router;


// On instancie le Router
$router = Router::getInstance();

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// Retourne bien les 2 routes
var_dump($router->getRoutes());


// On instancie de nouveau le Router
$router2 = Router::getInstance();
$router2->add('page3', 'page@get3');

// Retourne bien les 3 routes
var_dump($router->getRoutes());

// Retourne bien les 3 routes
var_dump($router2->getRoutes());