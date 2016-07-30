<?php

namespace LavaMVC\Registries;

use LavaMVC\Registry;

class Request extends Registry {

    protected function __construct() {
        $this->_items = $_REQUEST;
    }

}