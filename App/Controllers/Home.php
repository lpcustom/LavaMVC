<?php declare(strict_types=1);

namespace App\Controllers;
use LavaMVC\AbstractController;

class Home extends AbstractController {

    public function index() {
        echo "Hi from home index\n<br />";
    }

    public function foo() {
        echo 'Home::foo!';
    }

    public function landing() {
        echo 'Landing Page';
    }

}