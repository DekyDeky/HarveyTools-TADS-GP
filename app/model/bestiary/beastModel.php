<?php

namespace App\Model\Bestiary;

use Exception;

class BeastModel{


    public static function insertBeast(\PDO $pdo, $data)
    {

        try {

            $sql = "INSERT INTO bestiario 
            (bestaNome, bestaPatamar, bestaND, bestaAtaque, bestaDano, bestaDefesa, bestaPV, bestaPericia, bestaCD, bestaCampID)
            VALUES 
            (:bestaNome, :bestaPatamar, :bestaND, :bestaAtaque, :bestaDano, :bestaDefesa, :bestaPV, :bestaPericia, :bestaCD, :bestaCampID)
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':bestaNome' => $data['bestaNome'],
                ':bestaPatamar' => $data['bestaPatamar'],
                ':bestaND' => $data['bestaND'],
                ':bestaAtaque' => $data['bestaAtaque'],
                ':bestaDano' => $data['bestaDano'],
                ':bestaDefesa' => $data['bestaDefesa'],
                ':bestaPV' => $data['bestaPV'],
                ':bestaPericia' => $data['bestaPericia'],
                ':bestaCD' => $data['bestaCD'],
                ':bestaCampID' => $data['bestaCampID'],
            ]);

            return ['type' => 'success'];


        }catch (Exception $e){
            return [
                'type' => 'exception',
                'section' => 'insertBeast',
                'message' => $e->getMessage()
            ];
        }
        
    }

    public static function updateBeast(\pdo $pdo, $data)
    {

        try {

            $sql = "UPDATE bestiario SET 
                bestaNome = :bestaNome, 
                bestaPatamar = :bestaPatamar,
                bestaND = :bestaND, 
                bestaAtaque = :bestaAtaque,
                bestaDano = :bestaDano,
                bestaDefesa = :bestaDefesa,
                bestaPV = :bestaPV,
                bestaPericia = :bestaPericia,
                bestaCD = :bestaCD, 
                bestaCampID = :bestaCampID
                WHERE
                bestaID = :bestaID
                ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':bestaNome' => $data['bestaNome'],
                ':bestaPatamar' => $data['bestaPatamar'],
                ':bestaND' => $data['bestaND'],
                ':bestaAtaque' => $data['bestaAtaque'],
                ':bestaDano' => $data['bestaDano'],
                ':bestaDefesa' => $data['bestaDefesa'],
                ':bestaPV' => $data['bestaPV'],
                ':bestaPericia' => $data['bestaPericia'],
                ':bestaCD' => $data['bestaCD'],
                ':bestaCampID' => $data['bestaCampID'],
                ':bestaID' => $data['bestaID']
            ]);

        return ['type' => 'success'];

        }catch (Exception $e){
            return [
                'type' => 'exception',
                'section' => 'updateBeast',
                'message' => $e->getMessage()
            ];
        }

        return mysqli_query($conn, $sql);
    }

    public static function deleteBeast(\PDO $pdo, $id)
    {
        $sql = "DELETE FROM bestiario WHERE bestaID = :id";

        try {

            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            return ['type' => 'success'];

        }catch (Exception $e){
            return [
                'type' => 'exception',
                'section' => 'deleteBeast',
                'message' => $e->getMessage()
            ];
        }

        //return mysqli_query($conn, $sql);
    }
}