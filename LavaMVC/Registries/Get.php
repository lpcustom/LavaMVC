<?php

namespace LavaMVC\Registries;
use LavaMVC\AbstractRegistry;

class Get extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_GET;
    }

}