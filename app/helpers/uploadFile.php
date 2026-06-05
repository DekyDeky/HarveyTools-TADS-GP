<?php

namespace App\Helpers;

use Exception;

class UploadFile {

    public static function renameFile(string $fileName, string $fileType, ?string $additionalId = ""){
        $ext = pathinfo(basename($fileName), PATHINFO_EXTENSION);
        $id = $additionalId !== "" ? $additionalId : uniqid();
        $newName = $id . '_' . $fileType . '.' . $ext;
        return $newName;
    }

    public static function upload(string $filePath, array $file){
        $dir = __DIR__ . '/../../public/storage/' . $filePath . "/";

        try {
            if(empty($file['name'])){
                throw new Exception("Não há arquivo!");
            }
            
            if(!is_dir($dir)){
                mkdir($dir, 0755, true);
            }

            $newName = UploadFile::renameFile($file['name'], 'fotoUsuario');

            if(move_uploaded_file($file['tmp_name'], $dir . $newName)){
                return '/' . $filePath . '/' . $newName;
            }else{
                throw new Exception("Falha no envio do arquivo" . $newName);
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