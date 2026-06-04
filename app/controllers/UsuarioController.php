<?php

namespace App\Controllers;

use App\Model\Usuario\UsuarioServiceModel;

class UsuarioController {

    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index(){
        session_start();

        include __DIR__ . '/../view/user/loginView.php';
    }

    public function cadastrarGET(){ /* Chama a view */ 
        session_start();

        include __DIR__ . '/../view/user/cadastroView.php';
    }

    public function cadastrarPOST(){ /* é chamada quando o botão de cadastrar é clicado. */
        $novoUsuario = $_POST; /* Recebe dados e arquivos da view */ 
        $arquivos = $_FILES;

        header('Content-Type: application/json; charset=utf-8');

        $service = new UsuarioServiceModel(); /* Chama a classe de Serviços de Usuário */

        $cadastro = $service->cadastrar($this->pdo, $novoUsuario, $arquivos); /* Chama a função de cadastrar e passa os dados para ela */

        if($cadastro['tipo'] === 'sucesso'){ /* Retorna o resultado para a view */
            
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