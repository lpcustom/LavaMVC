<?php declare(strict_types=1);

namespace LavaMVC\Registries;
use LavaMVC\AbstractRegistry;

class Post extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_POST;
    }

}