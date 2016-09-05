<?php

namespace LavaMVC;

abstract class Model {

    const RETURN_NONE = 0;
    const RETURN_ONE  = 1;
    const RETURN_MANY = 2;

    protected $_db;

    public function __construct(Database $db) {
        $this->_db = $db;
    }

    public function query($sql, $data = null, $return = self::RETURN_NONE, $cache = null, $database = null, $verbose = false) {
        $sql        = trim(preg_replace('!\s+!', ' ', $sql));
        $output     = array();
        if(!isset($database)) {
            $database = $this->_db;
        }

        $operation  = Database::TYPE_READ;
        switch($return) {
            case self::RETURN_NONE:
                $operation = Database::TYPE_WRITE;
                break;
            case self::RETURN_ONE:
            case self::RETURN_MANY:
                // already set to read
                break;
            default:
                $database->setType($return);
        }

        if($operation === DataBase::TYPE_WRITE) {
            static::beforeWrite($sql, $data);
        } else {
            static::beforeRead($sql, $data);
        }
    }

    public function beforeWrite($sql, $data) {}
    public function beforeRead($sql, $data)  {}
    public function afterWrite($sql, $data)  {}
    public function afterRead($sql, $data)   {}

}