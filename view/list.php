<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Personagens</title>
</head>
<body>
    <h1>Visualizar Personagens por Campanha</h1>

    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="list">
        <label for="campID">Selecione a Campanha:</label>
        <select name="campID" id="campID" onchange="this.form.submit()">
            <option value="">-- Selecione --</option>
            <?php foreach ($campaigns as $camp): ?>
                <option value="<?= $camp['campID'] ?>" <?= $selectedCampaignId == $camp['campID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($camp['nomeCamp']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Visualizar</button>
    </form>

    <p><a href="index.php?action=create">Criar Novo Personagem</a></p>

    <?php if ($selectedCampaignId): ?>
        <h2>Personagens na Campanha Selecionada</h2>
        <?php if (empty($characters)): ?>
            <p>Nenhum personagem cadastrado nesta campanha.</p>
        <?php else: ?>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Classe</th>
                        <th>Atributos</th>
                        <th>Defesa</th>
                        <th>Pontos de Vida</th>
                        <th>Recurso</th>
                        <th>Inventário</th>
                        <th>Talentos e Magias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($characters as $char): ?>
                        <tr>
                            <td><?= htmlspecialchars($char['nome']) ?></td>
                            <td><?= htmlspecialchars($char['classe']) ?></td>
                            <td><?= htmlspecialchars($char['atributos']) ?></td>
                            <td><?= htmlspecialchars($char['defesa']) ?></td>
                            <td><?= htmlspecialchars($char['pontos_vida']) ?></td>
                            <td><?= htmlspecialchars($char['recurso']) ?></td>
                            <td><?= nl2br(htmlspecialchars($char['inventario'])) ?></td>
                            <td><?= nl2br(htmlspecialchars($char['talentos_magias'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
