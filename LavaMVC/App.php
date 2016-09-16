<?php declare(strict_types=1);

namespace LavaMVC;

use LavaMVC\Registries;

class App {

    public $cookie;
    public $files;
    public $get;
    public $post;
    public $request;
    public $server;
    public $session;
    public $config;
    public $httpRequest;

    /**
     * App constructor.
     * @throws \UnexpectedValueException
     */
    public function __construct() {
        $this->cookie       = new Registries\Cookie();
        $this->files        = new Registries\Files();
        $this->get          = new Registries\Get();
        $this->post         = new Registries\Post();
        $this->request      = new Registries\Request();
        $this->server       = new Registries\Server();
        $this->session      = new Registries\Session();
        try {
            $this->config       = new Config();
            $this->httpRequest  = new HttpRequest($this->config, $this->server->REQUEST_METHOD);

            $controllerName = $this->httpRequest->getController();
            $actionName     = $this->httpRequest->getAction();

            if(!class_exists($controllerName)) {
                throw new \UnexpectedValueException("Controller \"" . $controllerName . "\" does not exist.");
            }

            if((null !== $actionName) && !in_array($actionName, get_class_methods($controllerName), false)) {
                throw new \UnexpectedValueException("Action \"" . $actionName . "\" does not exist on controller \"" . $controllerName . "\"");
            }

            $controller = new $controllerName($this);
            /** @noinspection PhpUndefinedMethodInspection */
            $controller->beforeAction($actionName);
            $controller->$actionName();
            /** @noinspection PhpUndefinedMethodInspection */
            $controller->afterAction($actionName);
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }
    }
}