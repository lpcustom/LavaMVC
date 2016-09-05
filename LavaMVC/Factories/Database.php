<?php

namespace LavaMVC\Factories;
use LavaMVC\Databases\MySQL;

class Database {

    public static function getInstance(\stdClass $config) {

        switch (strtolower($config->driver)) {
            case 'mysql':
                return new MySQL($config);
                break;
        }
    }
}
