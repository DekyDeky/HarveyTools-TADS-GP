<?php
namespace app\model;

use app\config\db;
use PDO;
use PDOException;

class CampaignService {
    private PDO $pdo;

    // Construtor da conexão com o banco de dados.
    public function __construct() {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    // Método para criar uma nova campanha.
    public function createCampaign(array $data, int $masterId): array {
        try {
            $sql = "INSERT INTO campaigns 
                    (nome_campanha, senha_campanha, id_mestre, status_campanha, sessoes_count) 
                    VALUES (:nome, :senha, :id_mestre, :status, :sessoes)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $data['campaignName'],
                ':senha' => password_hash($data['campaignPassword'], PASSWORD_DEFAULT),
                ':id_mestre' => $masterId,
                ':status' => 'Active',
                ':sessoes' => $data['sessionsCount']
            ]);

            return ['tipo' => 'sucesso', 'mensagem' => 'Campanha foi criada!'];
        } catch (PDOException $e) {
            return ['tipo' => 'erro', 'mensagem' => 'Erro ao criar campanha: ' . $e->getMessage()];
        }
    }
    
    // Get que retorna as campanhas associadas a um mestre.
    public function getCampaignsByMaster(int $masterId): array {
        $sql = "SELECT * FROM campaigns WHERE id_mestre = :id_mestre";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_mestre' => $masterId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get para buscar os jogadores de uma campanha específica
    public function getCampaignPlayers(int $campaignId): array {
        $sql = "SELECT p.id, p.nome, p.email FROM jogadores p 
                JOIN arquivos a ON p.id = a.arqJog 
                WHERE a.arqCamp = :campaign_id"; 
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':campaign_id' => $campaignId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para convidar um jogador para a campanha.
    public function invitePlayer(int $campaignId, string $playerEmail): array {
        try {
            $sql = "INSERT INTO campaign_invites (campaign_id, player_email, status) VALUES (:campaign_id, :player_email, 'pending')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':campaign_id' => $campaignId,
                ':player_email' => $playerEmail
            ]);
            return ['tipo' => 'sucesso', 'mensagem' => 'Convite enviado.'];
        } catch (PDOException $e) {
            return ['tipo' => 'erro', 'mensagem' => 'Erro ao enviar convite: ' . $e->getMessage()];
        }
    }
}