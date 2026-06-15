<?php

namespace App\Controllers;

use App\Helpers\Consult;
use App\Model\Bestiary\BeastModel;
use App\Model\CampaignModel;
use App\Model\CharacterModel;

class BestiaryController {

    private \PDO $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    public function index(){
        session_start();

        $result = Consult::read($this->pdo, 'campanhas', ['campID', 'nomeCamp']);
        if(isset($result['campID'])){
            $result = [$result];
        }
        

        include __DIR__ . '/../view/bestiary/selCampaing.php';
    }

    public function bestiaryGET(){
        session_start();

        $idBestiary = $_GET['id'];
        
        $result = Consult::read($this->pdo, 'bestiario', ['*'], ['eq' => ['bestaCampID' => $idBestiary]]);
        $campResult = Consult::read($this->pdo, 'campanhas', ['nomeCamp'], ['eq' => ['campID' => $idBestiary]]);

        $campaignModel = new CampaignModel($this->pdo);
        $campaigns = $campaignModel->getAll();

        $characters = [];

        $charModel = new CharacterModel($this->pdo);
        $characters = $charModel->getByCampaign($idBestiary);

        include __DIR__ . '/../view/bestiary/viewBeastiary.php';
    }
    
    public function createBeastGET(){
        session_start();

        $resultCamp = Consult::read($this->pdo, 'campanhas', ['campID', 'nomeCamp']);

        if(isset($resultCamp['campID'])){
            $resultCamp = [$resultCamp];
        }

        include __DIR__ . '/../view/bestiary/beast.php';
    }

    public function createBeastPOST(){
        session_start();

        $data = $_POST;

        $result = BeastModel::insertBeast($this->pdo, $data);

        header('Content-Type: application/json; charset=utf-8');

        if($result['type'] === 'success'){
            echo json_encode([
                'type' => 'success',
                'link' => '/campanha?id='.$data['bestaCampID']
            ]);
        }else {
            echo json_encode($result);
        }
    }

    public function editBestiaryGET(){
        session_start();

        $id = (int)$_GET['id'];

        $besta = Consult::read($this->pdo, 'bestiario', ['*'], ['eq' => ['bestaID' => $id]]);

        $resultCamp = Consult::read($this->pdo, 'campanhas', ['campID', 'nomeCamp']);

        if(isset($resultCamp['campID'])){
            $resultCamp = [$resultCamp];
        }

        include __DIR__ . '/../view/bestiary/editBestiary.php';
    }

    public function editBestiaryPOST(){
        session_start();

        $data = $_POST;

        $result = BeastModel::updateBeast($this->pdo, $data);

        header('Content-Type: application/json; charset=utf-8');

        if($result['type'] === 'success'){
            echo json_encode([
                'type' => 'success',
                'link' => '/campanha?id='.$data['bestaCampID']
            ]);
        }else {
            echo json_encode($result);
        }
    }

    public function deleteBeastPOST(){
        session_start();

        $data = json_decode(file_get_contents('php://input'), true);

        $result = BeastModel::deleteBeast($this->pdo, $data['idBeast']);

        if($result['type'] === 'success'){
            echo json_encode([
                'type' => 'success'
            ]);
        }else {
            echo json_encode($result);
        }
    }



}