<?php

/**
 * Exemple du design pattern "Facade"
 *
 * Ce design pattern permet de cacher la complexité du code derrière un appel statique
 * PS : Si on a besoin de plusieurs instance, il ne faut pas utiliser cet exemple
 */

require_once 'Form/Form.php';
require_once 'Facades/Facade.php';
require_once 'Facades/Form.php';

use Form\Form;
use Facades\Form as FormFacade;

// Exemple sans Facade
$form = new Form();
var_dump($form->open());

// Exemple avec Facade
var_dump(FormFacade::open());
