<?php

namespace Amir\WebFramework;

class Application
{
    public static string $ROOT_DIR; 
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;

    public function __construct(string $rootPath)
    {
        static::$app = $this;

        static::$ROOT_DIR = dirname($rootPath   );
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();

    }

    public function run()
    {
        echo $this->router->resolve();
    }
}