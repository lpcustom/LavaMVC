<?php

namespace LavaMVC\Registries;
use LavaMVC\AbstractRegistry;

class Files extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_FILES;
    }

}