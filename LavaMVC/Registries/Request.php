<?php declare(strict_types=1);

namespace LavaMVC\Registries;

use LavaMVC\AbstractRegistry;

/**
 * @property \stdClass _params
 */
class Request extends AbstractRegistry {

    public function __construct() {
        $this->_items = (object) $_REQUEST;
    }

}