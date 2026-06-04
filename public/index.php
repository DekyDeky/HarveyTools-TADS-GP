<?php

use App\Routes\Router;

require __DIR__ . '/../vendor/autoload.php'; //Chama o autoload do PHP

//Mostra erros no php_errors.log
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Faz a aplicação seguir o horário de São Paulo
date_default_timezone_set('America/Sao_Paulo');

//Chama o router para links
Router::execute();

