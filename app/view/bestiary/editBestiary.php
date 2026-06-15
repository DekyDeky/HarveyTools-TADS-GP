<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Besta</title>
</head>
<body>

<h1>Editar Besta</h1>

<form method="POST" id="beastEditForm" enctype="multipart/form-data">

    <input type="hidden" name="bestaID" value="<?= $besta['bestaID'] ?>">

    <label>Nome:</label><br>
    <input type="text" name="bestaNome"
           value="<?= $besta['bestaNome'] ?>" required>
    <br><br>

    <label>Patamar:</label><br>
    <input type="text" name="bestaPatamar"
           value="<?= $besta['bestaPatamar'] ?>" required>
    <br><br>

    <label>ND:</label><br>
    <input type="number" name="bestaND"
           value="<?= $besta['bestaND'] ?>" required>
    <br><br>

    <label>Ataque:</label><br>
    <input type="text" name="bestaAtaque"
           value="<?= $besta['bestaAtaque'] ?>" required>
    <br><br>

    <label>Dano:</label><br>
    <input type="text" name="bestaDano"
           value="<?= $besta['bestaDano'] ?>" required>
    <br><br>

    <label>Defesa:</label><br>
    <input type="number" name="bestaDefesa"
           value="<?= $besta['bestaDefesa'] ?>" required>
    <br><br>

    <label>PV:</label><br>
    <input type="number" name="bestaPV"
           value="<?= $besta['bestaPV'] ?>" required>
    <br><br>

    <label>Perícia:</label><br>
    <input type="text" name="bestaPericia"
           value="<?= $besta['bestaPericia'] ?>" required>
    <br><br>

    <label>CD:</label><br>
    <input type="number" name="bestaCD"
           value="<?= $besta['bestaCD'] ?>" required>
    <br><br>

    <label>Campanha:</label><br>

    <select name="bestaCampID" required>

        <?php foreach($resultCamp as $camp) { ?>

            <option value="<?= $camp['campID'] ?>"
                <?= ($camp['campID'] == $besta['bestaCampID']) ? 'selected' : '' ?>>
                <?= $camp['nomeCamp'] ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    <button type="submit">Atualizar</button>

</form>

<script type="module" src="/scripts/Bestiary/editBeast.js" defer></script>
</body>
</html>