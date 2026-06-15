<?php

namespace App\Model;

class CharacterModel {
    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(array $data): bool {
        $sql = "INSERT INTO personagens 
                (campID, nome, classe, atributos, defesa, pontos_vida, recurso, inventario, talentos_magias) 
                VALUES 
                (:campID, :nome, :classe, :atributos, :defesa, :pontos_vida, :recurso, :inventario, :talentos_magias)";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':campID' => (int) $data['campID'],
            ':nome' => htmlspecialchars($data['nome']),
            ':classe' => htmlspecialchars($data['classe']),
            ':atributos' => htmlspecialchars($data['atributos']),
            ':defesa' => (int) $data['defesa'],
            ':pontos_vida' => (int) $data['pontos_vida'],
            ':recurso' => (int) $data['recurso'],
            ':inventario' => htmlspecialchars($data['inventario'] ?? ''),
            ':talentos_magias' => htmlspecialchars($data['talentos_magias'] ?? '')
        ]);
    }

    public function getByCampaign(int $campID): array {
        $sql = "SELECT * FROM personagens WHERE campID = :campID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':campID' => $campID]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
