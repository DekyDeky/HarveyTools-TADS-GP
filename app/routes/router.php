<?php

namespace App\Routes;

use Exception;
use App\Config\DB;
use App\Helpers\Request;
use App\Helpers\Uri;

class Router {

    const CONTROLLER_NAMESPACE = 'App\\Controllers';

    public static function load(string $controller, string $method){
        try {

            $controllerNamespace = self::CONTROLLER_NAMESPACE.'\\'.$controller;

            if(!class_exists($controllerNamespace)){
                throw new Exception("O Controller {$controller} não existe");
            }

            $db = new DB();
            $pdo = $db->connect();

            $controllerInstance = new $controllerNamespace($pdo);

            if(!method_exists($controllerInstance, $method)) {
                throw new Exception("O método {$method} não existe no Controller {$controller}");
            }

            $controllerInstance->$method();

        }catch (\Throwable $th){
            echo $th->getMessage();
        }
    }

    public static function routes():array {

        return [
            'GET' => [
                '/' => fn () => self::load('UserController', 'index'),
                '/login' => fn () => self::load('UserController', 'index'),
                '/cadastrar' => fn () => self::load('UserController', 'registerGET'),
                '/test' => fn () => self::load('DebugController', 'index') //Para testes apenas!
            ],

            'POST' => [
                '/logarUsuario' => fn () => self::load('UserController', 'loginPOST'),
                '/cadastrarUsuario' => fn () => self::load('UserController', 'registerPOST'),
            ]
        ];

   } 

   public static function execute(){

        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');

            if (!isset($routes[$request])) {          
                throw new Exception('A rota não existe');
            }

            if (!array_key_exists($uri, $routes[$request])) {
                throw new Exception('A rota não existe');
            }

            $router = $routes[$request][$uri];

            /*/ Verifica autenticação
            if (!empty($route['auth']) && !Auth::check()) {
                throw new Exception('Você precisa estar logado');
            }

            // Verifica permissão
            if (!empty($route['role'])) {
                Auth::requireRole($route['role']);
            }*/
            
            if(!is_callable($router)){
                throw new Exception("A rota {$uri} não é chamável!");
            }

            $router();

        } catch (\Throwable $th) {
            $msg = $th->getMessage();
            echo $msg;
        }

   }

}