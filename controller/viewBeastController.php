<?php

include("connectionBD.php");
include("BeastModel.php");

if (!isset($_GET['campID'])) {
    echo "Dados inválidos";
    exit;
}

$campID = (int) $_GET['campID'];

$result = getBeastsByCamp($conn, $campID);

include("viewBeastiary.php");