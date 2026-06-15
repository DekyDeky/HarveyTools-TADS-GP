<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Personagem</title>
</head>
<body>
    <h1>Adicionar Novo Personagem</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?action=create">
        <p>
            <label for="campID">Campanha:</label><br>
            <select name="campID" id="campID" required>
                <option value="">Selecione uma campanha</option>
                <?php foreach ($campaigns as $camp): ?>
                    <option value="<?= $camp['campID'] ?>"><?= htmlspecialchars($camp['nomeCamp']) ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="nome">Nome do Personagem:</label><br>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="classe">Classe:</label><br>
            <input type="text" name="classe" id="classe" required>
        </p>
        <p>
            <label for="atributos">Atributos</label><br>
            <input type="text" name="atributos" id="atributos" required placeholder="Ex: For 10, Des 12">
        </p>
        <p>
            <label for="defesa">Defesa:</label><br>
            <input type="number" name="defesa" id="defesa" required>
        </p>
        <p>
            <label for="pontos_vida">Pontos de Vida:</label><br>
            <input type="number" name="pontos_vida" id="pontos_vida" required>
        </p>
        <p>
            <label for="recurso">Recurso:</label><br>
            <input type="number" name="recurso" id="recurso" required>
        </p>
        <p>
            <label for="inventario">Inventário:</label><br>
            <textarea name="inventario" id="inventario" rows="4" cols="50"></textarea>
        </p>
        <p>
            <label for="talentos_magias">Talentos e Magias:</label><br>
            <textarea name="talentos_magias" id="talentos_magias" rows="4" cols="50"></textarea>
        </p>
        
        <button type="submit">Adicionar Personagem</button>
    </form>

    <p><a href="index.php?action=list">Ver Personagens por Campanha</a></p>
</body>
</html>
