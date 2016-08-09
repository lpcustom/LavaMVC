<?php

namespace LavaMVC;

abstract class Database {
    protected $_pdo;
    protected $_type;
    const TYPE_READ  = 0;
    const TYPE_WRITE = 1;
    abstract public function __construct(\stdClass $config);

    public function setType($type) {
        if($type === self::TYPE_READ) {
            $this->_type = self::TYPE_READ;
        } else if($type === self::TYPE_WRITE) {
            $this->_type = self::TYPE_WRITE;
        } else {
            throw new \Exception('Invalid type specified for database.');
        }
    }
}