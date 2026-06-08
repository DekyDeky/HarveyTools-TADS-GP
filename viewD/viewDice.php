<?php

session_start();

$results = $_SESSION["roll"] ?? null;

unset($_SESSION["roll"]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dados</title>
</head>

<body>

<h1>Dados</h1>

<form method="POST" action="diceController.php">

    <label>Quantidade de dados:</label>
    <input type="number" name="qtd" min="1" value="1" required>

    <br><br>

    <label>Número de faces:</label>
    <input type="number" name="faces" min="2" value="6" required>

    <br><br>

    <button type="submit">Rolar</button>

</form>

<hr>

<?php if ($results): ?>

    <h2>Resultado</h2>

    Dados: <?= implode(", ", $results["results"]) ?><br>
    Total: <?= $results["total"] ?>

<?php endif; ?>

</body>
</html>