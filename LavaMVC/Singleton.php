<?php

namespace LavaMVC;

abstract class Singleton {
    protected static $_instance = null;

    /**
     * @return static
     */
    public static function getInstance() {
        if(empty(static::$_instance)) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
}