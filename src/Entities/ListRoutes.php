<?php

namespace I9w3b\ListRoutes\Entities;

use Route;

class ListRoutes
{

    public $hideMatching;
    public $hideMethods;
    public $methodColours;
    public $middlewareClosure;
    public $routes;
    public $count;

    public function __construct()
    {
        $this->hideMatching = $this->arrayHideMatching();
        $this->hideMethods = $this->arrayHideMethods();
        $this->methodColours = $this->arrayMethodcolours();
        $this->middlewareClosure = $this->getMiddlewareClosure();
        $this->routes = $this->arrayRoutes();
        $this->count = count($this->routes);
    }

    public function arrayHideMatching()
    {
        return config("listroutes.hidematching");
    }

    public function arrayHideMethods()
    {
        return config("listroutes.hidemethods");
    }

    public function arrayMethodcolours()
    {
        return config("listroutes.methodcolours");
    }

    public function getMiddlewareClosure()
    {
      return $this->middlewareClosure = function ($middleware) {
          return $middleware instanceof Closure ? 'Closure' : $middleware;
      };
    }

    public function arrayRegexHideMatching($varRoutes)
    {
      foreach ($this->arrayHideMatching() as $regex) {
          $varRoutes = $varRoutes->filter(function ($value, $key) use ($regex) {
              return !preg_match($regex, $value->uri());
          });
      }
      return $varRoutes;
    }

    public function arrayRoutes()
    {
        return $this->arrayRegexHideMatching($this->getRoutesOrder());
    }

    public function getRoutesCollect()
    {
        return collect(Route::getRoutes());
    }

    public function getRoutesOrder()
    {
        return $this->getRoutesCollect()->sort();
    }

}
