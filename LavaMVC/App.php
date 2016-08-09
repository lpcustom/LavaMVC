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
            $this->httpRequest  = new HttpRequest($this->config);
            $this->httpRequest->processRequest($this->request);
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }


        $cName = $this->httpRequest->getController();
        $aName = $this->httpRequest->getAction();
        $cont = new $cName($this);
        $cont->$aName();
    }
}