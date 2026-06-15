<?php

namespace App\Model;

use Exception;
use App\Helpers\Validadores;
use App\Helpers\UploadArquivo;

class UserModel {

    private int $id;
    private String $email;
    private String $senha_hash;
    private String $nome;
    private String $caminhoFotoPerfil;
    

    public function __construct(array $data){
        $this->id = $data['idUsuario'];
        $this->email = $data['email'];
        $this->senha_hash = $data['senha'];
        $this->nome = trim($data['nome']);
        $this->caminhoFotoPerfil = $data['fotoPerfil'];
    }





}