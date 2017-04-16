<?php

/**
 * Exemple du design pattern "Adapter".
 *
 * Ce design pattern permet d’adapter l’interface d’un objet sans modifier l’objet en lui même.
 *
 * Le but est de faire en sorte que si un jour on a à changer de librairie, qu'on ai juste l'adaptateur à changer
 * sans rien avoir à modifier dans l'application.
 */

require_once 'Mailing/Adapters/AdapterInterface.php';
require_once 'Mailing/MailersLibraries/SwiftMailer.php';
require_once 'Mailing/Adapters/SwiftMailerAdapter.php';
require_once 'Mailing/MailersLibraries/PHPMailer.php';
require_once 'Mailing/Adapters/PHPMailerAdapter.php';

use Mailing\MailersLibraries\SwiftMailer;
use Mailing\Adapters\SwiftMailerAdapter;
use Mailing\MailersLibraries\PHPMailer;
use Mailing\Adapters\PHPMailerAdapter;


// Exemple avec SwiftMailer
$swiftMailer = new SwiftMailer();

$mailer = new SwiftMailerAdapter($swiftMailer);

var_dump($mailer->send());



// Exemple avec PHPMailer
$phpMailer = new PHPMailer();

$mailer2 = new PHPMailerAdapter($phpMailer);

var_dump($mailer2->send());