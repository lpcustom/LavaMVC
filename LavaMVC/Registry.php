<?php

namespace LavaMVC;

abstract class Registry extends Singleton {

    protected $_items;

    public function getAll() {
        return $this->_items;
    }

    public function __get($key) {
        if(isset($this->_items[$key])) {
            return $this->_items[$key];
        } else {
            return null;
        }
    }

    public function __set($key, $value) {
        $this->_items[$key] = $value;
    }

    public function __isset($key) {
        if(isset($this->_items[$key])) {
            return true;
        }
        return false;
    }

    public function __unset($key) {
        if(isset($this->_items[$key])) {
            unset($this->_items[$key]);
        }
    }
}


