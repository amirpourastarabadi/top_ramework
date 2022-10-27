<?php

namespace Top\Request;

class Request
{

    public string $method;

    public string $url;

    private array $inputs = [];

    public function __construct()
    {
        $this->setMethod();
        $this->setUrl();
        $this->filterInputs();
    }

    public function all()
    {
        return $this->inputs;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {
        return $this->url;
    }

    private function setMethod()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function setUrl()
    {
        $this->url = explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    private function filterInputs()
    {
        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $value){
                $this->inputs[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                $this->inputs[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
    }
}
