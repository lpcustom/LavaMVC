<?php

namespace App\Controllers\Api;

class Test {
    public function test() {
        echo "Hello from " . get_class($this) . " test.";
    }

    public function index() {
        echo "Hello from " . get_class($this) . " index.";
    }
}