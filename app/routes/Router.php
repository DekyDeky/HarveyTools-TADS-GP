<?php

namespace App\Routes;

class Router {

    public static function routes(): array {
        return [
            'GET' => [
                '/' => function() { echo "<h1>Página Inicial</h1><a href='/campaigns'>Ver Campanhas</a>"; },
                
                '/campaigns' => fn () => self::load('CampaignController', 'indexGET'),
                '/campaign/tracker' => fn () => self::load('CampaignController', 'trackerGET'),
            ],
            'POST' => [
                '/campaign/create' => fn () => self::load('CampaignController', 'createPOST'),
                '/campaign/invite' => fn () => self::load('CampaignController', 'invitePOST'),
            ]
        ];
    }

    public static function load(string $controller, string $action) {
        $controllerNamespace = "\\App\\Controllers\\" . $controller;
        
        if (class_exists($controllerNamespace)) {
            $controllerInstance = new $controllerNamespace();
            if (method_exists($controllerInstance, $action)) {
                return $controllerInstance->$action();
            } else {
                die("Erro: Função '$action' não encontrada no controlador '$controller'.");
            }
        } else {
            die("Erro: O Controlador '$controller' não existe.");
        }
    }

    public static function execute() {
        $method = $_SERVER['REQUEST_METHOD'];
        
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        $basePath = '/HarveyTools-TADS-GP'; 
        
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        
        if ($uri === '') {
            $uri = '/';
        }

        $routes = self::routes();

        if (isset($routes[$method]) && array_key_exists($uri, $routes[$method])) {
            $action = $routes[$method][$uri];
            $action();
        } else {
            http_response_code(404);
            echo "<h1>Erro 404</h1><p>A página '$uri' não foi encontrada.</p>";
        }
    }
}