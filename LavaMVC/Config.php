<?php

namespace LavaMVC;
/**
 * Class Config
 * @package LavaMVC
 * @property \stdClass $routes
 * @property \stdClass $databases
 * @property \stdClass $general
 */
class Config extends AbstractRegistry {

    public function __construct() {
        parent::__construct();
        $files = scandir(ROOT . DIRECTORY_SEPARATOR . 'Config');
        if(!empty($files)) {
            foreach($files as $f) {
                if(strpos(strtolower($f), '.json')) {
                    try {
                        // config objects are called via their relative name in the json
                        $itemName = substr($f, 0, strlen($f) - 5);
                        $this->_items->$itemName = json_decode(file_get_contents(ROOT . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . $f));
                        if(!isset($this->_items->$itemName)) {
                            throw new \Exception($itemName . ".json may contain an error.");
                        }
                    } catch (\Exception $ex) {
                        throw $ex;
                    }
                }
            }
        }
    }
}