<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bestiary</title>
</head>
<body>

<h1>Bestiary</h1>

<?php if (!isset($result)) { ?>
    <p>Nenhum dado foi carregado.</p>
<?php } else { ?>

    <?php while($monster = mysqli_fetch_assoc($result)) { ?>

        <h2><?= $monster['bestaNome'] ?></h2>

        Patamar: <?= $monster['bestaPatamar'] ?><br>
        ND: <?= $monster['bestaND'] ?><br>
        Attack: <?= $monster['bestaAtaque'] ?><br>
        Damage: <?= $monster['bestaDano'] ?><br>
        Defense: <?= $monster['bestaDefesa'] ?><br>
        HP: <?= $monster['bestaPV'] ?><br>
        Pericia: <?= $monster['bestaPericia'] ?><br>
        CD: <?= $monster['bestaCD'] ?><br>

        <a href="editBestiary.php?id=<?= $monster['bestaID'] ?>"><button type="button">Editar</button></a>
        <a href="deleteBeast.php?id=<?= $monster['bestaID'] ?>"><button type="button">Deletar</button></a>

        <hr>

    <?php } ?>

    

<?php } ?>

<br>

<a href="selCampaing.php">
    <button type="button">Voltar para Campanhas</button>
</a>
<br>

<a href="beast.php">
    <button type="button">Criar Nova Besta</button>
</a>

</body>
</html>