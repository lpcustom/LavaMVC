<?php
session_start();

define("DOCUMENT_ROOT", __DIR__);
define("ROOT", dirname(__DIR__));

$loader = require ROOT . '/vendor/autoload.php';

// Instantiate LavaMVCApp and start it.
try {
    $app = new LavaMVC\App();
} catch(\Exception $ex) {
    die("<br ><h3>" . $ex->getMessage() . "</h3><br/>");
}
