<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Get extends Registry {

    protected function __construct() {
        $this->_items = $_GET;
    }

}