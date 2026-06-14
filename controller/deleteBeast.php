<?php

include("connectionBD.php");
include("BeastModel.php");

if (!isset($_GET['id'])) {
    echo "ID inválido";
    exit;
}

$id = (int) $_GET['id'];

$result = deleteBeast($conn, $id);

if ($result) {
    header("Location: selCampaing.php?deletado=1");
    exit();
} else {
    echo "Erro ao deletar besta.";
}