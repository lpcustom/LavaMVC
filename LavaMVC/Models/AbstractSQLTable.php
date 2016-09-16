<?php declare(strict_types=1);

namespace LavaMVC\Models;

use LavaMVC\AbstractModel;
use LavaMVC\Config;
use LavaMVC\Factories\Database;

abstract class AbstractSQLTable extends AbstractModel {
    protected $_table;
    protected $_primaryKey;

    /**
     * AbstractSQLTable constructor.
     * @param string $table
     * @param string $primaryKey
     * @param string $database
     */
    protected function __construct($table, $primaryKey, $database) {
        $config     = new Config();
        if(null === $database) {

            $default    = $config->databases->default;
            $db         = Database::getInstance($default);
        } else {
            $dbName     = $config->databases->$database;
            $db         = Database::getInstance($dbName);
        }
        parent::__construct($db);
        $this->_table       = $table;
        $this->_primaryKey  = $primaryKey;
    }

}