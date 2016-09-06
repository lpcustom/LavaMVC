<?php

namespace LavaMVC;

abstract class AbstractDatabase {
    protected $_pdo;
    protected $_type;
    const TYPE_READ  = 'read';
    const TYPE_WRITE = 'write';
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