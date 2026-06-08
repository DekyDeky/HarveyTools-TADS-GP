<?php

include("connectionBD.php");
include("BeastModel.php");

// validação básica (evita erro de campo vazio quebrando o PHP)
if (!isset($_POST['bestaNome'])) {
    echo "Dados inválidos";
    exit;
}

$data = [
    "nome" => mysqli_real_escape_string($conn, $_POST['bestaNome']),
    "patamar" => mysqli_real_escape_string($conn, $_POST['bestaPatamar']),
    "nd" => (int) $_POST['bestaND'],
    "ataque" => mysqli_real_escape_string($conn, $_POST['bestaAtaque']),
    "dano" => mysqli_real_escape_string($conn, $_POST['bestaDano']),
    "defesa" => mysqli_real_escape_string($conn, $_POST['bestaDefesa']),
    "pv" => mysqli_real_escape_string($conn, $_POST['bestaPV']),
    "pericia" => mysqli_real_escape_string($conn, $_POST['bestaPericia']),
    "cd" => mysqli_real_escape_string($conn, $_POST['bestaCD']),
    "campID" => (int) $_POST['bestaCampID']
];

$result = insertBeast($conn, $data);

if ($result) {
    header("Location: selCampaing.php?sucesso=1");
    exit();
} else {
    echo "Erro ao salvar monstro.";
}