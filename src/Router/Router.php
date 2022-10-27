<?php

namespace Top\Router;

use Top\Request\Request;
use Top\Response\Response;
use Top\View\View;

class Router
{
    private array $routes = [];

    private Request $request;
    private View $view;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    public function get(string $url, $callback)
    {
        $this->routes[$this->request->getMethod()][$url] = $callback;
    }    
    
    public function post(string $url, $callback)
    {
        $this->routes[$this->request->getMethod()][$url] = $callback;
    }

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getUrl()];

        if (is_null($callback)) {
            Response::withStatusCode(Response::HTTP_NOT_FOUND);
            return  $this->view->render('errors.not_found');
        }

        if (is_string($callback)) {
            return $this->view->render($callback);
        }

        if(is_array($callback)){
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }
}
