<?php

namespace LavaMVC;

use LavaMVC\Registries\Request;

class HttpRequest {
    private $_router;
    private $_controllerName;
    private $_actionName;
    private $_urlSegments;

    public function __construct(Config $config, $requestMethod) {
        $this->_router = new Router($config->routes);
        $request = new Request();
        $this->_router->setControllerAction($request, $requestMethod);

        $this->_controllerName  = $this->_router->getController();
        $this->_actionName      = $this->_router->getAction();
        $temp                   = $request->_params;
        $params                 = explode('/', $temp);
        $this->_urlSegments     = array_slice($params,2);
    }

    /**
     * @param int $i
     * @return string
     */
    public function getSegment($i) {
        return isset($this->_urlSegments[$i]) ? $this->_urlSegments[$i] : null;
    }

    public function getController() {
        return $this->_controllerName;
    }

    public function getAction() {
        return $this->_actionName;
    }

}