<?php declare(strict_types=1);

namespace LavaMVC;
use LavaMVC\Registries\Request;

/**
 * @property \stdClass ANY
 */
class Router extends AbstractRegistry {

    private $_controller;
    private $_action;

    public function __construct(\stdClass $routes) {
        $this->_items = $routes;
    }

    /**
     * @param Request $request
     * @param $method
     * @throws \UnexpectedValueException
     */
    public function setControllerAction(Request $request, $method) {
        $route1 = '_default';
        $route2 = '_default';

        if(null !== $request->_params && $request->getCount() > 0) {
            $params = explode('/', $request->_params);
            if(!empty($params[0]) && count($params) > 0) {
                $route1 = $params[0];
            }
            if(!empty($params[1]) && count($params) > 1) {
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
            if(isset($this->$method->$route1->controller)) {
                $this->_controller   = 'App\\Controllers\\' . $this->$method->$route1->controller;
            } else if(isset($this->ANY->$route1->controller)) {
                $this->_controller   = "App\\Controllers\\" . $this->ANY->$route1->controller;
            } else {
                throw new \UnexpectedValueException('Route [' . $route1 . '] is not set in routes.json.');
            }
            $this->_action       = $route2;
            if($route2 === '_default') {
                $this->_action = 'index';
            }
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