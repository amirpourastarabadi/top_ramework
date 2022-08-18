<?php

namespace Amir\WebFramework;

class Request
{

    private string $url = '';
    private array $params = [];
    private string $method;
    public function __construct()
    {
        $this->setUrl();
        $this->setQueryParams();
        $this->setMethod();
    }

    protected function setMethod()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    protected function setUrl()
    {
        $postition = strpos($_SERVER['REQUEST_URI'], '?');

        $this->url = $postition === false ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, $postition);
    }

    protected function setQueryParams()
    {
        $this->params = [];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {

        return $this->url;
    }

    public function getBody()
    {
        $body = [];

        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
