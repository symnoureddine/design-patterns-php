<?php

/**
 * Dependency injection container (DIC)
 */

require_once 'Core/DIC.php';
require_once 'Mailing/Contracts/Mailers/MailerInterface.php';
require_once 'Mailing/Mailers/SwiftMailer.php';
require_once 'Mailing/Mailers/PHPMailer.php';
require_once 'Mailing/SendMail.php';

use Core\DIC;
use Mailing\SendMail;
use Mailing\Mailers\SwiftMailer;
use Mailing\Mailers\PHPMailer;


/**
 * Dans cette exemple, les Mailers "Mailing\Mailers\SwiftMailer" et "Mailing\Mailers\PHPMailer" implémentents
 * l'interface/contrat "Mailing\Contracts\Mailier\FormatterInterface".
 *
 * La classe "Mailing\SendMail" attend en dépendance dans son constructeur une classe qui
 * implémente l'interface/contrat "Mailing\Contracts\Mailier\FormatterInterface".
 *
 * Et on peut ensuite envoier le message avec la méthode "sendMessage" de la classe "Mailing\SendMail".
 *
 * Dans cette exemple on constate donc qu'on remplacer la dépendance injectée dans le constructeur de "Mailing\SendMail".
 */


$container = new DIC();

// On donne comme valeur une instance de "Mailing\Mailers\SwiftMailer" à la clé SwiftMailer.
// On utilise la méthode "set" car on veut toujours la même instance de "Mailing\Mailers\SwiftMailer".
$container->set('SwiftMailer', function ($container) {
    return new SwiftMailer();
});

// On donne comme valeur une instance de "Mailing\SendMail" à la clé SendMail.
// Et on injecte en dépendance à "Mailing\SendMail" une instance de "Mailing\Mailers\SwiftMailer".
// On utilise la méthode "setFactory" à chaque fois une nouvelle instance de "Mailing\Mailers\SwiftMailer".
// C'est un peu comme un système de Factory mais qui a l'avantage d'être dynamique et d'être bougé au fu et à mesure.
$container->setFactory('SendMail', function ($container) {
    return new SendMail($container->get('SwiftMailer'));
});


// return Mailing\SendMail - Instance de "Mailing\SendMail" qui a "Mailing\Mailers\SwiftMailer" comme dépendance injectée
var_dump($container->get('SendMail'));