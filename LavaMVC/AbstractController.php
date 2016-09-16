<?php declare(strict_types=1);

namespace LavaMVC;

abstract class AbstractController {

    public $app;

    public function __construct(App $app) {
        $this->app = $app;
    }

    abstract public function index();
    public function beforeAction($action)   {}
    public function afterAction($action)    {}
}