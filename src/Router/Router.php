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

        if (is_null($callback)) {
            return  "Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }


    private function renderView(string $view)
    {
        $viewContent = $this->getView($view);
        
        $layoutContent = $this->getView('layouts.main');
       
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function getView(string $view)
    {
        $view = str_replace('.', '/', $view);

        ob_start();
        include_once  __DIR__ . "/../../views/$view.html";
        return ob_get_clean();
    }
}
