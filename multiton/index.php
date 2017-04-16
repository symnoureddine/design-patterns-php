<?php

/**
 * Exemple du design pattern "Multiton"
 *
 * Ce design pattern ressemble au design pattern "Singleton" à la différence que la on peut effectuer plusieurs instance d'une même classe
 */

require_once 'Routing/Router.php';

use Routing\Router;


// On instancie un Router
$router = Router::getInstance('instance_1');

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// Retourne bien les 2 routes
var_dump($router->getRoutes());


// On instancie de nouveau le Router (retournera la même instance que la 1ère instance du Router)
$router2 = Router::getInstance('instance_1');
$router2->add('page3', 'page@get3');

// Retourne bien les 3 routes
var_dump($router->getRoutes());

// Retourne bien les 3 routes
var_dump($router2->getRoutes());


// On instancie un nouveau Router (retournera une nouvelle instance)
$router3 = Router::getInstance('instance_2');
$router3->add('page3', 'page@get3');

// Retourne bien que les 3 routes de 'instance_1'. La route de 'instance_2' n'a donc pas été prise en compte
var_dump($router->getRoutes());

// Retourne bien qu'une seule router
var_dump($router3->getRoutes());

