<?php

namespace App\Controllers;

use App\Helpers\Validations;
use App\Model\User\UserServiceModel;

class UserController {

    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index(){
        session_start();

        include __DIR__ . '/../view/user/loginView.php';
    }

    public function loginPOST(){
        session_start();

        $service = new UserServiceModel();
        
        $dataUser = $_POST; 

        $login = $service->login($this->pdo, $dataUser);

        header('Content-Type: application/json; charset=utf-8');
        
        if($login['type'] === 'success'){
            echo json_encode([
                'type' => 'success',
                'mensagem' => 'Login efetuado com sucesso!',
                'link' => '/test'
            ]);
        }else {
            echo JSON_ENCODE($login);
        }
    }

    public function registerGET(){ /* Chama a view */ 
        session_start();

        include __DIR__ . '/../view/user/cadastroView.php';
    }

    public function registerPOST(){ /* é chamada quando o botão de cadastrar é clicado. */
        $novoUsuario = $_POST; /* Recebe dados e arquivos da view */ 
        $arquivos = $_FILES;

        

        header('Content-Type: application/json; charset=utf-8');

        $service = new UserServiceModel(); /* Chama a classe de Serviços de Usuário */

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