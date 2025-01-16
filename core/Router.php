<?php

namespace core;

class Router
{
    protected Request $request;
    protected Response $response;
    protected array $routes = [];
    protected array $rout_params = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function add($path, $callback, $method): self
    {
        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = strtoupper($method);
        }
        $this->routes[] = [
            "path" => $path,
            "callback" => $callback,
            'middleware' => [],
            "method" => $method,
            "needCsrfToken" => true
        ];
        return $this;
    }

    public function get($path, $callback): self
    {
        return $this->add($path, $callback, 'GET');
    }

    public function post($path, $callback): self
    {
        return $this->add($path, $callback, 'POST');
    }

    public function ajax($path, $callback): self
    {
        return $this->add($path, $callback, 'AJAX');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    //Այս մեթոդի էությունը կայանում է նրանում, որ ստուգի ընթացիկ զապրոսը համապատասխանում է ցուցակին թե ոչ
    public function dispatch(): mixed
    {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);

        if (false === $route) {
            abort();
        }

        $className = $route['callback'][0];
        $methodName = $route['callback'][1]; // Get the method name

        if (class_exists($className)) {
            $controller = new $className();
            if (method_exists($controller, $methodName)) {
//                $request = new \core\Request($_POST);
//                $request->initialize(); // Populate the request object with POST data or other data

                // Merge $this->rout_params with $request if necessary
               // $routeParams = $this->rout_params;
               return call_user_func([$controller, $methodName], $this->rout_params); // Call the method on the controller
             //   return call_user_func([$controller, $methodName], $request, ...array_values($this->rout_params));
            } else {
                echo "Method $methodName not found in $className!";
            }
        } else {
            echo "Class $className not found!";
        }
        return 'OK';
    }

    protected function matchRoute($path): mixed
    {

        if (empty($path)) {
            $path = '/';
        }
        foreach ($this->routes as $route) {
            $routeRegex = preg_replace('#\{([^}]+)\}#', '([^/]+)', $route['path']);
            $routeRegex = "#^{$routeRegex}$#";

            if (preg_match($routeRegex, $path, $matches) &&
//            if (preg_match("#^{$route['path']}$#", "{$path}", $matches) &&
                ((is_array($route['method']) && in_array($this->request->getMethod(), $route['method']))
                    || $route['method'] == $this->request->getMethod())) {
                if ($route['needCsrfToken'] && !$this->checkCsrfToken()) {
                    if (request()->isPost()) {
                        if (request()->isAjax()) {
                            echo json_encode(
                                [
                                    "status" => "error",
                                    "data" => "Sequrity error"
                                ]);
                            die;
                        } else {
//                        session()->setFlash("error", "Sequrity error");
//                        session()->setFlash("success", "Sequrity success");
                            abort('Page is expired', '419');
                        }
                    }

                }
                if ($route['middleware']) {
                    foreach ($route['middleware'] as $item) {
                        $middleware = MIDDLEWARE[$item] ?? false;
                        if ($middleware) {
                            (new $middleware)->handle();
                        }
                    }
                }

                if (strpos($route['path'], '{id}') !== false) {
                    $matches['id'] = $matches[1];
                }
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $this->rout_params[$k] = $v;
                    }
                }

                return $route;
            }
        }
        return false;
    }


    public function withoutCsrfToken(): self
    {
        $this->routes[array_key_last($this->routes)]['needCsrfToken'] = false;
        return $this;
    }

    public function checkCsrfToken(): bool
    {
        return request()->post('csrf_token') && (request()->post('csrf_token') == session()->get('csrf_token'));
    }

    public function middleware(array $middleware): self
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
        return $this;
    }
}
