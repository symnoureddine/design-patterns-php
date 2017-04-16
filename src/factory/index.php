<?php

/**
 * Exemple du design pattern "Factory".
 *
 * Ce design pattern permet d'instancier une classe via un Factory.
 * La classe exacte de l'objet n'est donc pas connue par l'appelant.
 */

require_once 'Cars/CarFactory.php';
require_once 'Cars/Models/Peugeot.php';
require_once 'Cars/Models/Renault.php';

use Cars\CarFactory;
use Cars\Models\Peugeot;
use Cars\Models\Renault;

$peugeot = CarFactory::create('peugeot');
// return string - Nom du model instancié
var_dump($peugeot->getName());

$renault = CarFactory::create('renault');
// return string - Nom du model instancié
var_dump($renault->getName());