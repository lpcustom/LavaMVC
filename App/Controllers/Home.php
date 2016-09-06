<?php

namespace App\Controllers;

use App\Models\Users;
use LavaMVC\AbstractController;

class Home extends AbstractController {

    public function index() {
        echo "Hi from home index\n<br />";
        $user = new Users();
    }

    public function foo() {
        echo "Home::foo!";
    }

    public function landing() {
        echo "Landing Page";
    }

}