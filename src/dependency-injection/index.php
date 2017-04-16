<?php

/**
 * L’injection de dépendances fournit un composant avec ses dépendances que ce soit via un constructeur,
 * des appels de méthodes ou la configuration de propriétés.
 *
 * Nos dépendances doivent se faire sur des interfaces/contrats ou encore sur des classes abstraites plutôt que sur des classes "concrètes".
 *
 * On sépare les dépendances en les contrôlant et en les instanciant ailleurs dans le système.
 *
 * L’injection de dépendances nous permet d'injecter uniquement les dépendances dont nous avons besoin,
 * quand nous avons besoin et ceux sans avoir à écrire en dur quelques dépendances que ce soit.
 */

use Mailing\SendMail;
use Mailing\Mailers\SwiftMailer;
use Mailing\Mailers\PHPMailer;

require_once 'Mailing/Contracts/MailerInterface.php';
require_once 'Mailing/Mailers/SwiftMailer.php';
require_once 'Mailing/Mailers/PHPMailer.php';
require_once 'Mailing/SendMail.php';

$swiftMailer = new SwiftMailer();

$phpMailer = new PHPMailer();

$sendMail = new SendMail($swiftMailer);
var_dump($sendMail->sendMessage());

$sendMail = new SendMail($phpMailer);
var_dump($sendMail->sendMessage());
