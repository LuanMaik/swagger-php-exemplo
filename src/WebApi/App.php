<?php

namespace App\WebAPI;

use App\WebAPI\Middlewares\CorsMiddleware;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

#[OA\Info(title: "My First API", version: "0.1")]
#[OA\Server(url: "http://127.0.0.1:8080")]
class App
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->router->middleware(new CorsMiddleware());
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        $routesConfig = [
            ... require __DIR__ . '/Routes/product.php'
        ];

        // CORS
        $this->router->map('OPTIONS', '/{routes:.+}', function () : ResponseInterface {
            return new Response();
        });

        foreach ($routesConfig as $routeConfig) {
            $this->router->map($routeConfig['method'], $routeConfig['path'], $routeConfig['handler']);
        }
    }

    public function run(?ServerRequest $request = null)
    {
        $request = $request ?? ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );

        $response = $this->router->dispatch($request);

        // send the response to the browser
        (new SapiEmitter)->emit($response);
    }
}