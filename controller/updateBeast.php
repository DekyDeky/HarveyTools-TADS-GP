<?php

include("connectionBD.php");
include("BeastModel.php");

$data = [
    "id" => (int) $_POST['bestaID'],
    "nome" => mysqli_real_escape_string($conn, $_POST['bestaNome']),
    "patamar" => mysqli_real_escape_string($conn, $_POST['bestaPatamar']),
    "nd" => (int) $_POST['bestaND'],
    "ataque" => mysqli_real_escape_string($conn, $_POST['bestaAtaque']),
    "dano" => mysqli_real_escape_string($conn, $_POST['bestaDano']),
    "defesa" => (int) $_POST['bestaDefesa'],
    "pv" => (int) $_POST['bestaPV'],
    "pericia" => mysqli_real_escape_string($conn, $_POST['bestaPericia']),
    "cd" => (int) $_POST['bestaCD'],
    "campID" => (int) $_POST['bestaCampID']
];

$result = updateBeast($conn, $data);

if ($result) {
    header("Location: selCampaing.php?editado=1");
    exit();
} else {
    echo "Erro ao atualizar besta.";
}