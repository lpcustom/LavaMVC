<?php declare(strict_types=1);

namespace LavaMVC;

abstract class AbstractDatabase {
    protected $_pdo;
    protected $_type;
    const TYPE_READ  = 'read';
    const TYPE_WRITE = 'write';

    /**
     * @param $type
     * @throws \UnexpectedValueException
     */
    public function setType($type) {
        if($type === self::TYPE_READ) {
            $this->_type = self::TYPE_READ;
        } else if($type === self::TYPE_WRITE) {
            $this->_type = self::TYPE_WRITE;
        } else {
            throw new \UnexpectedValueException('Invalid type specified for database.');
        }
    }
}