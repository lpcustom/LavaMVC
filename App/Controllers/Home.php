<?php

namespace App\Controllers;

use App\Models\Users;
use LavaMVC\Controller;

class Home extends Controller {

    public function index() {
        echo "Hi from home index\n";
        $user = new Users();
    }
}