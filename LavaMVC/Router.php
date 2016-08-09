<?php

namespace LavaMVC;

class Router extends Registry {

    public function __construct(\stdClass $routes) {
         $this->_items = $routes;
    }
}