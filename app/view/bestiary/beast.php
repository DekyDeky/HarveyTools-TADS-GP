<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Beast</title>
</head>

<body>

<h1>Create Beast</h1>

<form method="POST" id="beastForm" enctype="multipart/form-data">

    <label>Nome:</label><br>
    <input type="text" name="bestaNome" required><br><br>

    <label>Patamar:</label><br>
    <input type="text" name="bestaPatamar" required><br><br>

    <label>ND:</label><br>
    <input type="number" name="bestaND" required><br><br>

    <label>Attack:</label><br>
    <input type="text" name="bestaAtaque" required><br><br>

    <label>Damage:</label><br>
    <input type="text" name="bestaDano" required><br><br>

    <label>Defense:</label><br>
    <input type="number" name="bestaDefesa" required><br><br>

    <label>HP:</label><br>
    <input type="number" name="bestaPV" required><br><br>

    <label>Pericia:</label><br>
    <input type="text" name="bestaPericia" required><br><br>

    <label>DC:</label><br>
    <input type="number" name="bestaCD" required><br><br>

    <label>Campanha:</label><br>

    <select name="bestaCampID" required>
        <option value="">Select Campaign</option>

        <?php foreach($resultCamp as $row) { ?>
            <option value="<?= $row['campID'] ?>">
                <?= $row['nomeCamp'] ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <button type="submit">Save Beast</button>

</form>

<script type="module" src="/scripts/Bestiary/createBeast.js" defer></script>
</body>
</html>