<?php

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
                throw new \Exception("Controller \"" . $controllerName . "\" does not exist.");
            }

            if(!in_array($actionName, get_class_methods($controllerName))) {
                throw new \Exception("Action \"" . $actionName . "\" does not exist on controller \"" . $controllerName . "\"");
            }


            $controller = new $controllerName($this);
            $controller->beforeAction($actionName);
            $controller->$actionName();
            $controller->afterAction($actionName);
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }
    }
}