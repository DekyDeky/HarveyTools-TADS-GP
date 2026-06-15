<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Beast - Harvey Tools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/bestiary/createBeast.css">
</head>

<body>

<?php include __DIR__ . '/../components/header.php'; ?>

<section class="create-beast">

    <h1>Create Beast</h1>

    <form method="POST" id="beastForm" enctype="multipart/form-data">

        <div class="input-container-group">
            <div class="input-container">
                <label>Nome:</label>
                <input type="text" name="bestaNome" required>
            </div>
        </div>

        <div class="input-container-group">

            <div class="input-container">
                <label>Patamar:</label>
                <input type="text" name="bestaPatamar" required>
            </div>
            

            <div class="input-container">
                <label>ND:</label>
                <input type="number" name="bestaND" required>
            </div>

        </div>

        <div class="input-container-group">

            <div class="input-container">
                <label>Attack:</label>
                <input type="text" name="bestaAtaque" required>
            </div class="input-container">

            <div class="input-container">
                <label>Damage:</label>
                <input type="text" name="bestaDano" required>
            </div class="input-container">

            <div class="input-container">
                <label>DC:</label>
                <input type="number" name="bestaCD" required>
            </div>

        </div>

        <div class="input-container-group">

            <div class="input-container">
                <label>HP:</label>
                <input type="number" name="bestaPV" required>
            </div>
            
            <div class="input-container">
                <label>Defense:</label>
                <input type="number" name="bestaDefesa" required>
            </div>

        </div>

        <div class="input-container-group">

            <div class="input-container">
                <label>Pericia:</label>
                <input type="text" name="bestaPericia" required>
            </div>

        </div>

        
        <div class="input-container-group">

            <div class="input-container">
                <label>Campanha:</label>
                <select name="bestaCampID" required>
                    <option value="">Select Campaign</option>
                    
                    <?php foreach($resultCamp as $row) { ?>
                    <option value="<?= $row['campID'] ?>">
                        <?= $row['nomeCamp'] ?>
                    </option>
                    <?php } ?>
                    
                </select>
            </div>

        </div>

        <button type="submit" class="btn input-btn">Save Beast</button>

    </form>
</section>

<script type="module" src="/scripts/Bestiary/createBeast.js" defer></script>
</body>
</html>