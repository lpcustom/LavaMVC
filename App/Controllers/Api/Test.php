<?php declare(strict_types=1);

namespace App\Controllers\Api;
use LavaMVC\AbstractController;

class Test extends AbstractController {

    public function test() {
        $response               = new \stdClass();
        $response->success      = true;
        $response->timestamp    = time();
        $response->message      = 'hi';
        echo json_encode($response);
    }

    public function index() {
        echo 'Hello from ' . get_class($this) . ' index.';
    }
}