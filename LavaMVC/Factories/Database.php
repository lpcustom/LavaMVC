<?php

namespace LavaMVC\Factories;

class Database {

    public static function getInstance(\stdClass $config) {
        switch (strtolower($config->driver)) {
            case 'mysql':
                return new \LavaMVC\Databases\MySQL($config);
                break;
        }
    }
}
