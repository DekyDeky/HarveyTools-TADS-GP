<?php

namespace App\Model\User;

use App\Helpers\Consult;
use App\Helpers\UploadFile;
use Exception;
use App\Helpers\Validations;

class UserServiceModel {
    private array $errors = [];

    public function getErrors(){
        return $this->errors;
    }

    public function validacao(array $data, array $file, \PDO $pdo){

        if(empty($data)){
            $this->errors['geral'] = "array vazio";
            return;
        }

        $this->errors = [];

        $userEmail = trim(htmlspecialchars($data['userEmail'], ENT_QUOTES, 'UTF-8'));
        $userName = trim(htmlspecialchars($data['userNome'], ENT_QUOTES, 'UTF-8'));

        if(Validations::checkEmpty($userName)) $this->errors['nome'] = "está vazio";
        if(Validations::checkEmpty($userEmail)) $this->errors['email'] = "está vazio";
        if(Validations::checkEmpty($data['userSenha'])) $this->errors['senha'] = "está vazio";
        if(Validations::checkEmpty($data['userSenhaConf'])) $this->errors['senhaConf'] = "está vazio";

        if(Validations::checkStrSize($userName, 50) && !isset($this->errors['nome'])) $this->errors['nome'] = "é muito grande";
        if(Validations::checkStrSize($userEmail, 235) && !isset($this->errors['email'])) $this->errors['email'] = "é muito grande";
        if(Validations::checkStrSize($data['userSenha'], 100) && !isset($this->errors['senha'])) $this->errors['senha'] = "é muito grande";
        if(Validations::checkStrSize($data['userSenhaConf'], 100) && !isset($this->errors['senhaConf'])) $this->errors['senha'] = "é muito grande";

        if(Validations::checkEmailExists($pdo, $data['userEmail']) && !isset($this->errors['senhaConf'])) $this->errors['email'] = "Já está cadastrado!";

        if(!empty($file['name'])){
            if(Validations::checkExtFile($file, ['jpg', 'png', 'webp'])) $this->errors['foto'] = "é inválida";
        }

        if($data['userSenha'] !== $data['userSenhaConf'] && !isset($this->errors['senha']) && !isset($this->errors['senhaConf'])) $this->errors['senha'] = "s não são iguais.";

        if(!empty($this->errors)) return True;
        else return False;

    }

    public function cadastrar(\PDO $pdo, array $data, array $file){
        try {

            if($this->validacao($data, $file['userFoto'], $pdo)){
                throw new Exception(JSON_ENCODE($this->getErrors()));
            } 
                
            $dateTime = date('Y-m-d H:i:s');

            if(!empty($file['userFoto']['name'])){  
                $uploadPicture = UploadFile::upload('userArquivos/' . $data['userNome'], $file['userFoto']);
            }
            

            if(isset($uploadPicture['tipo'])){
                throw new Exception(JSON_ENCODE($uploadPicture));
            }

            $sqlUsuario = "INSERT INTO usuarios
                            (nome, email, senha, foto_perfil, criado_em)
                            VALUES
                            (:nome, :email, :senha, :foto_perfil, :criado_em)";

            $stmt = $pdo->prepare($sqlUsuario);
            $stmt->execute([
                ':nome' => $data['userNome'],
                ':email' => $data['userEmail'],
                ':senha' => password_hash($data['userSenha'], PASSWORD_DEFAULT),
                ':foto_perfil' => $uploadPicture ?? null,
                ':criado_em' => $dateTime
            ]);

            

            return [
                'tipo' => 'sucesso'
            ];

        }catch (\Throwable $e){
            return [
                'tipo' => 'excessao',
                'sessao' => 'UsuarioService',
                'mensagem' => $e->getMessage()
            ];
        }

    }

    public function login(\PDO $pdo, array $data){

        try {

            $getLogin = Consult::read($pdo, 'usuarios', ['idUsuario', 'senha'], ['eq' => ['email' => $data['userEmail']]]);
            
            if(is_array(reset($getLogin)) || empty($getLogin)){
                throw new Exception("Falha ao identificar conta");
            }

            if(password_verify($data['userPassword'], $getLogin['senha'])) {
                $_SERVER['idUser'] = $getLogin['idUsuario'];
                return ['type' => 'success'];
            }
            else {
                throw new Exception("Senha incorreta");
            }            

            
            
        }catch (Exception $e){
            return [
                'type' => 'exception',
                'section' => 'login',
                'message' => $e->getMessage()
            ];
        }

    }
}