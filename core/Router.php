<?php
namespace core;

class Router
{
    private $controller = 'UrlBuilder';
    private $method = 'home';
    private $param = [];

    public function __construct()
    {
        $router = $this->url();

        if (!empty($router[0]) && file_exists('app/controllers/' . ucfirst($router[0]) . 'Controller.php')) {
            $this->controller = $router[0];
            unset($router[0]);
        }

        $class = "\\app\\controllers\\" . ucfirst($this->controller) . "Controller";
        $object = new $class;

        if (isset($router[1]) && method_exists($object, $router[1])) {
            $this->method = $router[1];
            unset($router[1]);
        }

        $this->param = $router ? array_values($router) : [0];

        call_user_func_array([$object, $this->method], $this->param);
    }

    private function url()
    {
        $url = filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL);
        if ($url !== null) {
            $parse_url = explode("/", $url);
        } else {
            $parse_url = [];
        }
        return $parse_url;
    }
}
