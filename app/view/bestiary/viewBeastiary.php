<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bestiary</title>
</head>
<body>

<h1>Bestiary</h1>

<?php if (empty($result)) { ?>
    <p>Nenhum dado foi carregado.</p>
<?php } else { ?>

    <?php foreach($result as $monster): ?>

        <h2><?= $monster['bestaNome'] ?></h2>

        Patamar: <?= $monster['bestaPatamar'] ?><br>
        ND: <?= $monster['bestaND'] ?><br>
        Attack: <?= $monster['bestaAtaque'] ?><br>
        Damage: <?= $monster['bestaDano'] ?><br>
        Defense: <?= $monster['bestaDefesa'] ?><br>
        HP: <?= $monster['bestaPV'] ?><br>
        Pericia: <?= $monster['bestaPericia'] ?><br>
        CD: <?= $monster['bestaCD'] ?><br>

        <a href="/editar-bestiario?id=<?= $monster['bestaID'] ?>"><button type="button">Edit</button></a>
        <button data-id="<?=$monster['bestaID']?>" id="deleteCreature" class="deleteCreate">Delete</button>

        <hr>

    <?php endforeach; ?>

    

<?php } ?>

<br>

<a href="/bestiarios">
    <button type="button">Voltar para Campanhas</button>
</a>
<br>

<a href="/criar-besta" href="beast.php">
    <button type="button">Criar Nova Besta</button>
</a>

<script type="module" src="/scripts/Bestiary/bestiaryActions.js" defer></script>

</body>
</html>