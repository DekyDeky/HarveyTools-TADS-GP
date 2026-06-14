<?php

namespace App\Controllers;

use App\Model\CharacterModel;
use App\Model\CampaignModel;

class CharacterController {
    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        $selectedCampaignId = isset($_GET['campID']) ? (int)$_GET['campID'] : null;
        $characters = [];

        if ($selectedCampaignId) {
            $charModel = new CharacterModel($this->pdo);
            $characters = $charModel->getByCampaign($selectedCampaignId);
        }

        include __DIR__ . '/../view/list.php';
    }

    public function create() {
        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $charModel = new CharacterModel($this->pdo);
            if ($charModel->create($_POST)) {
                header("Location: index.php?action=list&campID=" . $_POST['campID']);
                exit;
            } else {
                $error = "Erro ao cadastrar personagem.";
            }
        }

        include __DIR__ . '/../view/form.php';
    }
}
