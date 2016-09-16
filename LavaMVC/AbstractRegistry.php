<?php declare(strict_types=1);

namespace LavaMVC;

/**
 * Class AbstractRegistry
 * @package LavaMVC
 * @param \stdClass $_items
 */

abstract class AbstractRegistry {

    protected $_items;

    public function getAll() {
        return $this->_items;
    }

    public function getCount() {
        return count($this->_items);
    }

    /**
     * @param $key
     * @return null|mixed
     */
    public function __get($key) {
        if(isset($this->_items->$key)) {
            return $this->_items->$key;
        } else {
            return null;
        }
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function __set($key, $value) {
        $this->_items->$key = $value;
    }

    public function __isset($key) {
        if(isset($this->_items->$key)) {
            return true;
        }
        return false;
    }

    public function __unset($key) {
        if(isset($this->_items->$key)) {
            unset($this->_items->$key);
        }
    }
}


