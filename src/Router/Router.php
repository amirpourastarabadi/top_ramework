<?php

namespace Top\Router;

use Top\Request\Request;

class Router
{
    private array $routes = [];

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $url, $callback)
    {
        $this->routes[$this->request->getMethod()][$url] = $callback;  
    }

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getUrl()];
        
        if(is_null($callback)){
            echo "Not Found";
        }

        call_user_func($callback);
    }
}
