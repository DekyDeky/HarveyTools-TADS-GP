<?php

namespace App\Model\Usuario;

use Exception;
use App\Helpers\Validadores;
use App\Helpers\UploadArquivo;

class UsuarioService {
    private array $erros = [];

    public function getErrors(){
        return $this->erros;
    }

    public function validacao(array $data, array $arquivo){

        if(empty($data)){
            $this->erros['geral'] = "array vazio";
            return;
        }

        $this->erros = [];

        $userEmail = trim(htmlspecialchars($data['userEmail'], ENT_QUOTES, 'UTF-8'));
        $userNome = trim(htmlspecialchars($data['userNome'], ENT_QUOTES, 'UTF-8'));

        if(Validadores::checkVazio($userNome)) $this->erros['nome'] = "está vazio";
        if(Validadores::checkVazio($userEmail)) $this->erros['email'] = "está vazio";
        if(Validadores::checkVazio($data['userSenha'])) $this->erros['senha'] = "está vazio";
        if(Validadores::checkVazio($data['userSenhaConf'])) $this->erros['senhaConf'] = "está vazio";

        if(Validadores::checkStrTam($userNome, 50) && !isset($this->erros['nome'])) $this->erros['nome'] = "é muito grande";
        if(Validadores::checkStrTam($userEmail, 235) && !isset($this->erros['email'])) $this->erros['email'] = "é muito grande";
        if(Validadores::checkStrTam($data['userSenha'], 100) && !isset($this->erros['senha'])) $this->erros['senha'] = "é muito grande";
        if(Validadores::checkStrTam($data['userSenhaConf'], 100) && !isset($this->erros['senhaConf'])) $this->erros['senha'] = "é muito grande";

        if(!empty($arquivo['name'])){
            if(Validadores::checkExtArquivo($arquivo, ['jpg', 'png', 'webp'])) $this->erros['foto'] = "é inválida";
        }

        if($data['userSenha'] !== $data['userSenhaConf'] && !isset($this->erros['senha']) && !isset($this->erros['senhaConf'])) $this->erros['senha'] = "s não são iguais.";

        if(!empty($this->erros)) return True;
        else return False;

    }

    public function cadastrar(\PDO $pdo, array $data, array $arquivo){


        try {
            if($this->validacao($data, $arquivo['userFoto'])){
                throw new Exception(JSON_ENCODE($this->getErrors()));
            } 
                

            $dataHora = date('Y-m-d H:i:s');

            if(!empty($arquivo['userFoto']['name'])){    
                $uploadFoto = UploadArquivo::upload('userArquivos/' . $data['userNome'], $arquivo['userFoto']);
            }

            if(isset($uploadFoto['tipo'])){
                throw new Exception($uploadFoto);
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
                ':foto_perfil' => $uploadFoto ?? null,
                ':criado_em' => $dataHora
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
}