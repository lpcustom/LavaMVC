<?php

namespace LavaMVC\Registries;
use LavaMVC\Registry;

class Post extends Registry {

    public function __construct() {
        $this->_items = (object) $_POST;
    }

}