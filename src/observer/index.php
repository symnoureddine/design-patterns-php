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


$audioObserver = new AudioObserver();

$imageObserver = new ImageObserver();

$videoObserver = new VideoObserver();

$file = new File();
$file->attach($audioObserver);
$file->attach($imageObserver);
$file->attach($videoObserver);
$file->dettach($audioObserver);
$file->setName('Fichier 1');