<?php

namespace Amir\WebFramework;

class Router
{
    protected $routes = [];

    private Request $request;
    private Response $response;

    public function __construct()
    {
        $this->request = Application::$app->request;
        $this->response = Application::$app->response;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        $callback = $this->routes[$method][$url] ?? null;

        if (is_null($callback)) {
            $this->response->setStatusCode(404);
            return $this->renderView('errors._404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView(string $view, array $params = [])
    {
        $layout = $this->renderLayout();
        $content = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $content, $layout);
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        $path = str_replace('.', '/', $view);
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$path.php";
        return ob_get_clean();
    }
    protected function renderLayout()
    {
        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/main.php';
        return ob_get_clean();
    }
}
