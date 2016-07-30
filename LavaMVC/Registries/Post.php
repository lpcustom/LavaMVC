<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Post extends Registry {

    protected function __construct() {
        $this->_items = $_POST;
    }

}