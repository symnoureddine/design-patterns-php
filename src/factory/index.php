<?php

/**
 * Exemple du design pattern "Factory".
 *
 * Ce design pattern permet 
 */

require_once 'Cars/CarFactory.php';
require_once 'Cars/Models/Peugeot.php';
require_once 'Cars/Models/Renault.php';

use Cars\CarFactory;
use Cars\Models\Peugeot;
use Cars\Models\Renault;

$peugeot = CarFactory::create('peugeot');
var_dump($peugeot->getName());

$renault = CarFactory::create('renault');
var_dump($renault->getName());