<?php

namespace App\Controllers;
use LavaMVC\Controller;
class Test extends Controller {

    public function test() {
        echo "Hello from " . get_class($this);
    }

    public function index() {
        echo "Hello From Test->index()";
    }

    public function bar() {
        echo "From Bar";
    }
}
