<?php declare(strict_types=1);

namespace LavaMVC\Factories;
use LavaMVC\Databases\MySQL;

class Database {

    /**
     * @param \stdClass $config
     * @return AbstractDatabase|null
     */
    public static function getInstance(\stdClass $config) {
        switch (strtolower($config->driver)) {
            case 'mysql':
                return new MySQL($config);
                break;
            case 'mssql':
                break;
            case 'oracle':
                break;
            case 'postgre';
                break;
            case 'nosql';
                break;
            default:
                return new MySQL($config);
        }
        return null;
    }
}
