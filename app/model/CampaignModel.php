<?php

namespace App\Model;

class CampaignModel {
    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM campanhas");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
