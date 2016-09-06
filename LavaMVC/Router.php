<?php

namespace LavaMVC;

class Router extends AbstractRegistry {

    private $_controller;
    private $_action;

    public function __construct(\stdClass $routes) {
        $this->_items = $routes;
    }

    public function setControllerAction($request, $method) {
        $route1 = "_default";
        $route2 = "_default";

        if(isset($request->_params)) {
            $params = explode('/', $request->_params);
            if(count($params) > 0) {
                $route1 = $params[0];
            }
            if(count($params) > 1) {
                $route2 = $params[1];
            }
        }

        if($this->_checkRouteExists($method, $route1, $route2)) {
            $this->_controller  = 'App\\Controllers\\' . $this->$method->$route1->controller;
            $this->_action      = $this->$method->$route1->actions->$route2;
        } else if($this->_checkRouteExists('ANY', $route1, $route2)) {
            $this->_controller  = 'App\\Controllers\\' . $this->ANY->$route1->controller;
            $this->_action      = $this->ANY->$route1->actions->$route2;
        } else {
            throw new \Exception("Route [" . $route1 . ', ' . $route2 . "] is not set in routes.json.");
        }
    }

    public function getController() {
        return $this->_controller;
    }

    public function getAction() {
        return $this->_action;
    }

    private function _checkRouteExists($method, $route, $action) {
        if(!isset($this->$method->$route->controller)) {
            return false;
        }
        if(!isset($this->$method->$route->actions->$action)) {
            return false;
        }
        return true;
    }



}