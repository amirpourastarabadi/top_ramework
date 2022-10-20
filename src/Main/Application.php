<?php

namespace Top\Main;

use Top\Request\Request;
use Top\Router\Router;

class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        $this->request = new Request();

        $this->router = new Router($this->request);
    }

    public function run()
    {
        return $this->router->resolve();
    }
}
