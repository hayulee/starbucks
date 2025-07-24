<?php
namespace Core;

class Router {
    private $routes = [];
    private $pdo;

    public function setPDO(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function get($path, $controller) {
        $this->routes['GET'][$path] = $controller;
    }

    public function post($path, $controller) {
        $this->routes['POST'][$path] = $controller;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (isset($this->routes[$method][$route])) {
            list($controllerName, $action) = explode('@', $this->routes[$method][$route]);
            $controllerClass = "App\\Controllers\\$controllerName";

            require_once __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

            $controller = new $controllerClass($this->pdo);
            $controller->$action();
        } else {
            http_response_code(404);
            echo "Page Not Found";
        }
    }

    // public function dispatch() {
    //     $method = $_SERVER['REQUEST_METHOD'];
    //     $route = $_GET['route'] ?? '';

    //     if (isset($this->routes[$method][$route])) {
    //         list($controllerName, $action) = explode('@', $this->routes[$method][$route]);
    //         $controllerClass = "App\\Controllers\\$controllerName";

    //         require_once __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

    //         $controller = new $controllerClass($this->pdo);
    //         $controller->$action();
    //     } else {
    //         http_response_code(404);
    //         echo "Page Not Found";
    //     }
    // }
}

/*
class Router {
    public function dispatch(string $url) {
        $url = rtrim(filter_var($url, FILTER_SANITIZE_URL), '/');
        $segments = explode('/', $url);

        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]).'Controller' : 'HomeController';
        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        $class = 'App\\Controllers\\' . $controllerName;
        if (!class_exists($class)) return http_response_code(404);

        $c = new $class;
        if (!method_exists($c, $method)) return http_response_code(404);

        call_user_func_array([$c, $method], $params);
    }
}

*/
/* 컴포저 적용 예시
class Router
{
    public function dispatch(string $url)
    {
        $url = $this->sanitizeUrl($url);
        $segments = explode('/', $url);

        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $methodName = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "🚫 컨트롤러 {$controllerClass} 를 찾을 수 없습니다.";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $methodName)) {
            http_response_code(404);
            echo "🚫 메서드 {$methodName} 를 찾을 수 없습니다.";
            return;
        }

        call_user_func_array([$controller, $methodName], $params);
    }

    private function sanitizeUrl($url)
    {
        return rtrim(filter_var($url, FILTER_SANITIZE_URL), '/');
    }
}
    */
// 컴포저 반영 전 코드
// class Router {
//     private $routes = [];
//     public function get($path, $controller) { $this->routes['GET'][$path] = $controller; }
//     public function post($path, $controller) { $this->routes['POST'][$path] = $controller; }
//     public function dispatch() {
//         $method = $_SERVER['REQUEST_METHOD'];
//         $route = $_GET['route'] ?? '';
//         if (isset($this->routes[$method][$route])) {
//             list($controller, $action) = explode('@', $this->routes[$method][$route]);
//             require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';
//             $controller = "App\\Controllers\\$controller";
//             $obj = new $controller();
//             $obj->$action();
//         } else { http_response_code(404); echo "Page Not Found"; }
//     }
// }
?>
