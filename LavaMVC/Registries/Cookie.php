<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Cookie extends Registry {

    protected function __construct() {
        $this->_items = $_COOKIE;
    }

}