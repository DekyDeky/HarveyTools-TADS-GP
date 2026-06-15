<?php

namespace App\Controllers;

use App\Model\CharacterModel;
use App\Model\CampaignModel;

class CharacterController {

    private \PDO $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * LISTAR PERSONAGENS
     * GET /fichas
     */
    public function index() {
        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        $selectedCampaignId = isset($_GET['campID'])
            ? (int) $_GET['campID']
            : null;

        $characters = [];

        if ($selectedCampaignId) {
            $charModel = new CharacterModel($this->pdo);
            $characters = $charModel->getByCampaign($selectedCampaignId);
        }

        include __DIR__ . '/../view/list.php';
    }

    /**
     * MOSTRAR FORMULÁRIO
     * GET /fichas/criar
     */
    public function createGET() {
        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        include __DIR__ . '/../view/sheets/form.php';
    }

    /**
     * SALVAR PERSONAGEM
     * POST /fichas/criar
     */
    public function createPOST() {
        $charModel = new CharacterModel($this->pdo);

        if ($charModel->create($_POST)) {
            header("Location: /fichas?campID=" . $_POST['campID']);
            exit;
        }

        $error = "Erro ao cadastrar personagem.";

        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        include __DIR__ . '/../view/sheets/form.php';
    }
}