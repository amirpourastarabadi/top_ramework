<?php

namespace Top\Request;

class Request
{

    public string $method;

    public string $url;

    public function __construct()
    {
        $this->setMethod();
        $this->setUrl();
    }

    private function setMethod()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function setUrl()
    {
        $this->url = explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {
        return $this->url;
    }
}
