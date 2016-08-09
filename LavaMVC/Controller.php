<?php

namespace LavaMVC;

abstract class Controller {

    public $app;

    public function __construct(App $app) {
        $this->app = $app;
    }

    abstract public function index();
}