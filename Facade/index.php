<?php

require_once 'Form/Form.php';
require_once 'Facades/Facade.php';
require_once 'Facades/Form.php';

use Form\Form;
use Facades\Form as FormFacade;

// Sans Façade
$form = new Form();
var_dump($form->open());

// Avec Façade
var_dump(FormFacade::open());