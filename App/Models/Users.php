<?php

namespace App\Models;

use LavaMVC\Models\AbstractSQLTable;
use LavaMVC\Factories\Database;
use LavaMVC\Config;

class Users extends AbstractSQLTable {

    public function __construct($database = null) {
        if(!isset($database)) {
            $config     = new Config();
            $default    = $config->databases->default;
            $db         = Database::getInstance($default);
        } else {
            $db = $database;
        }
        parent::__construct('users', 'id', $db);
        return $this;
    }

}