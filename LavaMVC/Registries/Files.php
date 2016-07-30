<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Files extends Registry {

    protected function __construct() {
        $this->_items = $_FILES;
    }

}