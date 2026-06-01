<?php

namespace App\Helpers;

class Validadores {

    public static function checkVazio(String $data){
        $cleanData = trim($data);
        if(empty($cleanData) || $cleanData === ""){
            return True;
        }else {
            return False;
        }
    }

    public static function checkStrTam(string $data, int $size, int $minSize = 0) {
        $cleanData = trim($data);
    
        if(strlen($cleanData) > $size || strlen($cleanData) < $minSize){
            return True;
        } else {
            return False;
        }
        
    }

    public static function checkExtArquivo(array $file, array $extCheck) {
        $filename = $file['name'] ?? '';

        if(!$filename){
            return False;
        }

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        foreach($extCheck as $extC){
            if($ext === $extC) return False;
        }

        return True;
    }

}