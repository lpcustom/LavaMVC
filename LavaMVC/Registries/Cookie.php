<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Cookie extends Registry {

    public function __construct() {
        $this->_items = (object) $_COOKIE;
    }

}