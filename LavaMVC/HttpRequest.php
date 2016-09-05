<?php

namespace LavaMVC;

class HttpRequest {
    private $_router;
    private $_controllerName;
    private $_actionName;
    private $_urlSegments;

    public function __construct(Config $config) {
        $this->_router = new Router($config->routes);
    }

    public function getController() {
        return $this->_controllerName;
    }

    public function getAction() {
        return $this->_actionName;
    }

    public function processRequest(Registries\Request $request) {
        $controllerName = 'App\\Controllers\\' . $this->_router->_default->controller;
        $actionName     = $this->_router->_default->actions->_default;
        if(isset($request->_params)) {
            $params = explode('/', $request->_params);
            if(count($params) > 0) {
                $route1 = $params[0];
                if(isset($this->_router->$route1)) {
                    $controllerName = 'App\\Controllers\\' . $this->_router->$route1->controller;
                }
            }

            if(count($params) > 1) {
                $route2 = $params[1];
                if(isset($this->_router->$route1->actions->$route2)) {
                    $actionName = $this->_router->$route1->actions->$route2;
                }
            }

            if(count($params) > 2) {
                $this->_urlSegments = array_splice($params, 2);
            }
        }

        if(class_exists($controllerName)) {
            $this->_controllerName = $controllerName;
        } else {
            throw new \Exception('Controller ' . $controllerName . ' does not exist.');
        }

        if(in_array($actionName, get_class_methods($controllerName))) {
            $this->_actionName = $actionName;
        } else {
            throw new \Exception('Controller ' . $controllerName . ' action ' . $actionName . ' does not exist in the controller');
        }

    }

    /**
     * @param int $i
     * @return string
     */
    public function getSegment($i) {
        return isset($this->_urlSegments[$i]) ? $this->_urlSegments[$i] : null;
    }

}