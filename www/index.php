<?php

session_start();

define("DOCUMENT_ROOT", __DIR__);
define("ROOT", dirname(__DIR__));

$loader = require ROOT . '/vendor/autoload.php';

