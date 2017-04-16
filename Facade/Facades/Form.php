<?php

namespace Facades;

/**
 * Facade pour les helpers de la classe Form
 */
final class Form extends Facade
{
    /**
     * @var Core\Form\Form
     */
    protected static $instance;

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Form\Form';
    }
}
