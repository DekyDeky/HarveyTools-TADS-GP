<?php

namespace App\Config;

class DB {

    /* Credenciais */
    private string $host        = 'localhost';
    private string $user        = 'root';
    private string $password    = '';
    private string $db          = 'harvey';
    private string $porta       = '3306';
    private ?\PDO $conn         = null;

    /* Conexão ao banco de dados */
    public function connect(): ?\PDO {
        if($this->conn !== null) {
                return $this->conn;
            }

            try {
                $this->conn = new \PDO("mysql:host=$this->host;port=$this->porta;dbname=$this->db;charset=utf8", $this->user, $this->password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]);

                return $this->conn;

            } catch (\PDOException $e) {
                error_log("Erro de conexão ao banco: " . $e->getMessage());

                die("Falha ao conectar ao banco de dados. Tente novamente mais tarde.");

            }
    }
}