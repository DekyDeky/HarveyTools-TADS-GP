<?php

namespace App\Helpers;

use Exception;

class UploadArquivo {

    public static function renameFile(string $fileName, string $fileType, ?string $additionalId = ""){
        $ext = pathinfo(basename($fileName), PATHINFO_EXTENSION);
        $id = $additionalId !== "" ? $additionalId : uniqid();
        $newName = $id . '_' . $fileType . '.' . $ext;
        return $newName;
    }

    public static function upload(string $arquivoCaminho, array $arquivo){
        $dirAlvo = __DIR__ . '/../../public/storage/' . $arquivoCaminho . "/";

        try {

            if(!empty($arquivo['name'])){
                throw new Exception("Não há arquivo!");
            }
            
            if(!is_dir($dirAlvo)){
                mkdir($dirAlvo, 0755, true);
            }

            $novoNome = UploadArquivo::renameFile($arquivo['name'], 'fotoUsuario');

            if(move_uploaded_file($arquivo['tmp_name'], $dirAlvo . $novoNome)){
                return $dirAlvo . $novoNome;
            }else{
                throw new Exception("Falha no envio do arquivo" . $novoNome);
            }

        }catch (\Throwable $e){
            return [
                'tipo' => 'exceção',
                'secao' => 'UploadFile',
                'mensagem' => $e->getMessage()
            ];
        }

        
    }

}