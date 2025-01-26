<?php

class Router
{
    protected $routes = [];

    /**
     * Register a route
     *
     * @param string $method
     * @param string $uri
     * @param string $controller
    */
    public function registerRoute(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function get(string $uri, string $controller)
    {
       $this->registerRoute('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Load error page
     *
     * @param int $httpCode
    */
    public function error(int $httpCode = 404)
    {
        http_response_code($httpCode);
        loadView('error/'.$httpCode);
        exit;
    }

    /**
     * Route the request
     *
     * @param string $uri
     * @param string $method
     * @return void
    */
    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require $route['controller'];
                return;
            }
        }
        $this->error();
    }
}