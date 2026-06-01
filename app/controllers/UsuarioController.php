<?php

namespace App\Controllers;

use App\Model\Usuario\UsuarioService;

class UsuarioController {

    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index(){
        session_start();

        include __DIR__ . '/../view/user/login_view.php';
    }

    public function cadastrarGET(){
        session_start();

        include __DIR__ . '/../view/user/cadastro_view.php';
    }

    public function cadastrarPOST(){
        $novoUsuario = $_POST;
        $arquivos = $_FILES;

        header('Content-Type: application/json; charset=utf-8');

        $service = new UsuarioService();

        $cadastro = $service->cadastrar($this->pdo, $novoUsuario, $arquivos);

        if($cadastro['tipo'] === 'sucesso'){
            
            echo json_encode([
                'tipo' => 'sucesso',
                'mensagem' => 'sucesso ao criar usuário',
                'link' => '/login'
            ]);
        }else {
            echo JSON_ENCODE($cadastro);
        }
    }

}