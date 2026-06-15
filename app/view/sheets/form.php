<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/sheets/form.css">
</head>
<body>

    <?php include __DIR__ . '/../components/header.php'; ?>

    <h1 class="text-center">Create new Character</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form class="character-form-container" method="POST" action="/fichas/criar">
       <div class="character-form">

        <div class="character-row">
            <div class="field-full">
                <label for="campID">Campaign</label>
                <select name="campID" id="campID" required>
                    <option value="">Select Campaign</option>
                    <?php foreach ($campaigns as $camp): ?>
                        <option value="<?= $camp['campID'] ?>">
                            <?= htmlspecialchars($camp['nomeCamp']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="character-row">
            <div>
                <label for="nome">Character Name</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="classe">Class</label>
                <input type="text" name="classe" id="classe" required>
            </div>
        </div>

        <div class="character-row">
            <div class="field-full">
                <label for="atributos">Attributes</label>
                <input
                    type="text"
                    name="atributos"
                    id="atributos"
                    required
                    placeholder="Ex: For 10, Des 12"
                >
            </div>
        </div>

        <div class="character-row">
            <div>
                <label for="defesa">Defense</label>
                <input type="number" name="defesa" id="defesa" required>
            </div>

            <div>
                <label for="pontos_vida">Life Points</label>
                <input type="number" name="pontos_vida" id="pontos_vida" required>
            </div>

            <div>
                <label for="recurso">Mana</label>
                <input type="number" name="recurso" id="recurso" required>
            </div>
        </div>

        <div class="character-row">
            <div class="field-full">
                <label for="inventario">Inventory</label>
                <textarea
                    name="inventario"
                    id="inventario"
                    rows="4"
                ></textarea>
            </div>
        </div>

        <div class="character-row">
            <div class="field-full">
                <label for="talentos_magias">Spells and Tricks</label>
                <textarea
                    name="talentos_magias"
                    id="talentos_magias"
                    rows="4"
                ></textarea>
            </div>
    </div>

    <button type="submit" class="btn btn-general">
        Create Character
    </button>

</div>
    </form>

</body>
</html>
