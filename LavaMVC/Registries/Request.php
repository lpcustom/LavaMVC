<?php

namespace LavaMVC\Registries;

use LavaMVC\Registry;

class Request extends Registry {

    public function __construct() {
        $this->_items = (object) $_REQUEST;
    }

}