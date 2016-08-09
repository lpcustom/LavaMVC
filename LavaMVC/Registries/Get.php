<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Get extends Registry {

    public function __construct() {
        $this->_items = (object) $_GET;
    }

}