<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestiary - Harvey Tools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/bestiary/bestiary.css">
    <link rel="stylesheet" href="/styles/sheets/list.css">
</head>
<body>

<?php include __DIR__ . '/../components/header.php'; ?>

<h1 class="text-center"><?=$campResult['nomeCamp']?></h1>
<h2 class="text-center">Bestiary</h2>

<div class="bestiary-btns">
    <a href="/campanhas" type="button" class="btn btn-general">Voltar para Campanhas</a>
    <a href="/criar-besta" type="button" class="btn btn-general">Criar Nova Besta</a>
</div>


<?php if (empty($result)) { ?>
    <p>Nenhum dado foi carregado.</p>
<?php } else { ?>

    <section class="monsters">

    <?php foreach($result as $monster): ?>

        <div class="monster">
     
            <h2 class="monster-name"><?= $monster['bestaNome'] ?></h2>

            <div class="monster-row">
                <div>
                    <span>Patamar:</span>
                    <h4>
                        <?= $monster['bestaPatamar'] ?>
                    </h4>
                </div>
                <div>
                    <span>ND: </span>
                    <h4>
                        <?= $monster['bestaND'] ?>
                    </h4>
                </div>
            </div>
            <div class="monster-row">
                <div>
                    <span>Attack: </span>
                    <h4>
                        <?= $monster['bestaAtaque'] ?>
                    </h4>
                </div>
                <div>
                    <span>Damage:</span>
                    <h4>
                        <?= $monster['bestaDano'] ?>
                    </h4>
                </div>
                <div>
                    <span>CD: </span>
                    <h4>
                        <?= $monster['bestaCD'] ?>
                    </h4>
                </div>
            </div>
            <div class="monster-row">
                <div>
                    <span>HP: </span>
                    <h4>
                        <?= $monster['bestaPV'] ?>
                    </h4>
                </div>
                <div>
                    <span>Defense: </span>
                    <h4>
                        <?= $monster['bestaDefesa'] ?>
                    </h4>
                </div>
            </div>
            <div class="monster-row">
                <div>
                    <span>Pericia: </span>
                    <h4>
                        <?= $monster['bestaPericia'] ?>
                    </h4>
                </div>
            </div>

            <a href="/editar-bestiario?id=<?= $monster['bestaID'] ?>" class="btn btn-general">Edit</a>
            <button data-id="<?=$monster['bestaID']?>" id="deleteCreature" class="deleteCreate btn btn-general">Delete</button>


        </div>

    <?php endforeach; ?>

    </section>

<?php } ?>

<br>

    <h2 class="text-center">Characters</h2>
    <?php if (empty($characters)): ?>
    <p>Nenhum personagem cadastrado nesta campanha.</p>
<?php else: ?>

    <div class="bestiary-btns">
        <a href="/fichas/criar" class="btn btn-general">Criar Novo Personagem</a>
    </div>

    <div class="characters">
    <?php foreach ($characters as $char): ?>

        <div class="character">

            <h2 class="character-name">
                <?= htmlspecialchars($char['nome']) ?>
            </h2>

            <div class="character-row">
                <div>
                    <span>Classe:</span>
                    <h4><?= htmlspecialchars($char['classe']) ?></h4>
                </div>
            </div>

            <div class="character-row">
                <div>
                    <span>Atributos:</span>
                    <h4><?= htmlspecialchars($char['atributos']) ?></h4>
                </div>
            </div>

            <div class="character-row">
                <div>
                    <span>Defesa:</span>
                    <h4><?= htmlspecialchars($char['defesa']) ?></h4>
                </div>

                <div>
                    <span>PV:</span>
                    <h4><?= htmlspecialchars($char['pontos_vida']) ?></h4>
                </div>

                <div>
                    <span>Recurso:</span>
                    <h4><?= htmlspecialchars($char['recurso']) ?></h4>
                </div>
            </div>

            <div class="character-row">
                <div class="character-full">
                    <span>Inventário:</span>
                    <p><?= nl2br(htmlspecialchars($char['inventario'])) ?></p>
                </div>
            </div>

            <div class="character-row">
                <div class="character-full">
                    <span>Talentos e Magias:</span>
                    <p><?= nl2br(htmlspecialchars($char['talentos_magias'])) ?></p>
                </div>
            </div>

            <!-- Exemplo de botões -->
            <!--<a href="/editar-personagem?id=<?= $char['id'] ?>" class="btn btn-general">
                Editar
            </a-->

            <!--button
                data-id="<?= $char['id'] ?>"
                class="deleteCharacter btn btn-general">
                Excluir
            </button-->

        </div>

    <?php endforeach; ?>

    </div>

<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script type="module" src="/scripts/Bestiary/bestiaryActions.js" defer></script>

</body>
</html>