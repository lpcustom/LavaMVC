<?php

namespace App\Controllers;
use LavaMVC\AbstractController;
class Test extends AbstractController {

    public function test() {
        echo "Hello from " . get_class($this) . " test.";
    }

    public function index() {
        $response               = new \stdClass();
        $response->success      = true;
        $response->timestamp    = time();
        $response->message      = "hi";
        header("Content-type: application/json");
        echo json_encode($response);

    }

    public function bar() {
        echo "From Bar";
    }
}
