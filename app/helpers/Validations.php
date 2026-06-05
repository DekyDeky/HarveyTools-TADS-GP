<?php

namespace App\Helpers;

class Validations {

    public static function checkEmpty(String $data){
        $cleanData = trim($data);
        if(empty($cleanData) || $cleanData === ""){
            return True;
        }else {
            return False;
        }
    }

    public static function checkStrSize(string $data, int $size, int $minSize = 0) {
        $cleanData = trim($data);
    
        if(strlen($cleanData) > $size || strlen($cleanData) < $minSize){
            return True;
        } else {
            return False;
        }
        
    }

    public static function checkExtFile(array $file, array $extCheck) {
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

    public static function checkEmailExists(\PDO $pdo, string $email){
        $checkEmail = Consult::read($pdo, 'usuarios', ['idUsuario'], ['eq' => ['email' => $email]]);
        if(count($checkEmail) > 0){
            return True;
        }else {
            return False;
        }
    }

}