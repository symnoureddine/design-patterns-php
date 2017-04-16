<?php

namespace Routing;

use Exception;

/**
 * Gestion du Routing
 */
class Router
{
    /**
     * @var Router
     */
    private static $instance;

    /**
     * URI
     *
     * @var string
     */
    private $uri = '';

    /**
     * Routes
     *
     * @var array
     */
    private $routes = [];

    /**
     *  Routerconstructor.
     */
    private function __construct()
    {
        $this->setUri();
    }

    /**
     * Singleton
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Setter de l'URI
     */
    private function setUri()
    {
        if (isset($_GET['uri'])) {
            $this->uri = ltrim($_GET['uri'], '/');

            if (strpos($_SERVER['REQUEST_URI'], '?uri=') !== false) {      
                header('Location: '.$this->uri, true, 301);
                exit();
            }
        }
    }

    /**
     * Ajouter une route
     *
     * @param string $path
     * @param string $action
     */
    public function add(string $path, string $action)
    {
        $this->routes[$path] = $action;
    }

    /**
     * Executer le Routing
     *
     * @return mixed
     */
    public function run()
    {
        foreach ($this->routes as $path => $action) {
            if ($this->uri == $path) {
                return $this->executeAction($action);
            }
        }

        return $this->executeError404();
    }

    /**
     * Executer l'action
     *
     * @param string $action
     * @throws Exception
     * @return mixed
     */
    private function executeAction(string $action)
    {
        list($controller, $method) = explode('@', $action);

        $class = '\App\Controllers\\'.ucfirst($controller).'Controller';

        if (!class_exists($class)) {
            throw new Exception('Class "'.$class.'" not found.');
        }

        $controllerInstantiate = new $class();

        if (!method_exists($controllerInstantiate, $method)) {
            throw new Exception('Method "'.$method.'" not found in '.$class.'.');
        }

        return call_user_func_array([new $controllerInstantiate, $method], []);
    }

    /**
     * Retourner une erreur 404
     *
     * @return mixed
     */
    private function executeError404()
    {
        die('404 Error');
    }

    /**
     * Retourner toute les routes
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
