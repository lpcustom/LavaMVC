<?php

namespace LavaMVC\Registries;

use LavaMVC\AbstractRegistry;

class Request extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_REQUEST;
    }

}