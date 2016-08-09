<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Files extends Registry {

    public function __construct() {
        $this->_items = (object) $_FILES;
    }

}