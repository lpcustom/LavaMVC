<?php

namespace LavaMVC\Models;

use LavaMVC\AbstractModel;

abstract class AbstractSQLTable extends AbstractModel {
    protected $_table;
    protected $_primaryKey;

    public function __construct($table, $primaryKey, $database) {
        $this->_table       = $table;
        $this->_primaryKey  = $primaryKey;
        $this->_db          = $database;
    }
}