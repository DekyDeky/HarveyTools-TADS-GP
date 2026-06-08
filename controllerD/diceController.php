<?php

include("DiceModel.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $qtd = (int) $_POST["qtd"];
    $faces = (int) $_POST["faces"];

    $results = rollDice($qtd, $faces);

    $_SESSION["roll"] = $results;

    header("Location: viewDice.php");
    exit;
}