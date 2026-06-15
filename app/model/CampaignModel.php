<?php

namespace app\model;

class CampaignModel {
    private int $id;
    private string $campaignName;
    private string $campaignPassword;
    private int $masterId;
    private int $sessionsCount;

    // Construtor do modelo.
    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->campaignName = $data['campaignName'];
        $this->campaignPassword = $data['campaignPassword'];
        $this->masterId = $data['masterId'];
        $this->sessionsCount = $data['sessionsCount'];
    }

    // Getters que retornam informações do modelo.
    public function getCampaignName(): string { 
        return $this->campaignName; 
    }
    
    public function getId(): int { 
        return $this->id; 
    }

    public function getSessionsCount(): int {
        return $this->sessionsCount;
    }
}

?>