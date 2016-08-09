<?php

namespace App\Models;

use LavaMVC\Models\SQLTable;

class Users extends SQLTable {

    public function __construct($database = null) {
        if(!isset($database)) {
            $config  = new \LavaMVC\Config();
            $default = $config->database->default;
            $db = \LavaMVC\Factories\Database::getInstance($default);
        }
        parent::__construct('users', 'id', $db);
    }
}