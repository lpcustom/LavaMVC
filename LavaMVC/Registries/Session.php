<?php declare(strict_types=1);

namespace LavaMVC\Registries;
use LavaMVC\AbstractRegistry;

class Session extends AbstractRegistry {

    private $_flash;

    public function __construct() {
        if($_SESSION) {
            $this->_items = (object) $_SESSION;
            if(isset($this->_items->_flash)) {
                $this->_flash = $this->_items->_flash;
                unset($this->_items->_flash);
                $this->save();
            }
        } else {
            $this->_items = new \stdClass();
        }
    }

    protected function save() {
        $_SESSION = $this->_items;
    }

    public function __set($key, $value) {
        parent::__set($key, $value);
        $this->save();
    }

    public function __unset($key) {
        parent::__unset($key);
        $this->save();
    }

    public function setFlash($key, $value) {
        if(null === $this->_flash) {
            $this->_flash = array();
        }
        $this->_flash->$key = $value;
        if(null === $this->_items->_flash) {
            $this->_items->_flash = array();
        }
        $this->_items->_flash->$key = $value;
        $this->save();
    }

    public function getFlash($key) {
        if(isset($this->_flash->$key)) {
            return $this->_flash->$key;
        }
        return null;
    }

    public function issetFlash($key) {
        return isset($this->_flash->$key);
    }

    public function destroy() {
        session_destroy();
    }
}