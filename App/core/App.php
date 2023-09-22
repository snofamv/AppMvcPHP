<?php
namespace App\Core;

use FastRoute\RouteCollector;
use FastRoute;
use App\Controllers\ErrorController;

class App
{

    function __construct()
    {
        $dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $router) {
            // Define una ruta para el método GET
            // Define rutas con controladores basados en namespaces
            $router->addRoute('GET', '/', 'App\Controllers\LoginController@Index');
            $router->addRoute('GET', '/login', 'App\Controllers\LoginController@Index');
            $router->addRoute('POST', '/verify-access', 'App\Controllers\LoginController@Login');
            $router->addRoute('GET', '/home', 'App\Controllers\HomeController@Index');
            // $router->addRoute('POST', '/login/{usuario}/{clave}', 'App\Controllers\LoginController@verify');
            // $router->addRoute('GET', '/login/{id:\d+}', 'App\Controllers\UserController@show');
        });

        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                error_log("error 404");
                $error = new ErrorController();
                $error->Index(["error"=>"404", "msg"=>"Pagina no encontrada.!"]);
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                error_log("error 405");
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                $error = new ErrorController();
                $error->Index(["error"=>"405", "msg"=>"Metodo no permitido!. => [$allowedMethods]"]);
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                // Obtener el controlador y la acción
                list($controller, $action) = explode('@', $handler);
                #error_log("CONTROLADOR:". $controller);
                // Llamar al controlador y la acción
                $instanceController = new $controller;
                $instanceController->$action($vars);
                // call_user_func([new $controller, $action]);
                break;
        }
    }
}
