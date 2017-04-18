<?php

/**
 * Observer
 */

require_once 'File/Observers/ObserverInterface.php';
require_once 'File/Observers/AudioObserver.php';
require_once 'File/Observers/ImageObserver.php';
require_once 'File/Observers/VideoObserver.php';
require_once 'File/File.php';

use File\File;
use File\Observers\AudioObserver;
use File\Observers\ImageObserver;
use File\Observers\VideoObserver;


// On instancie les Observers
$audioObserver = new AudioObserver();
$imageObserver = new ImageObserver();
$videoObserver = new VideoObserver();

// On instancie un fichier
$file = new File();

// On attache des Observers
$file->attach($audioObserver);
$file->attach($imageObserver);
$file->attach($videoObserver);

// On détache un Observer
$file->dettach($audioObserver);

// On modifie le nom d'un fichier
// Ceci va automatiquement notifier les Observer
$file->setName('Fichier 1');