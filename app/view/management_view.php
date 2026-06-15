<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Campanhas</title>
</head>
<body>
    <h1>Painel do Mestre - Minhas Campanhas</h1>
    
    <section>
        <h2>Campanhas Ativas</h2>
        <ul>
            <?php foreach ($campaigns as $campaign): ?>
                <li>
                    <strong><?= htmlspecialchars($campaign['nome_campanha']) ?></strong> 
                    (Sessões: <?= htmlspecialchars($campaign['sessoes_count'] ?? 0) ?>)
                    <br>
                    <a href="/campaign/tracker?id=<?= htmlspecialchars($campaign['id']) ?>">=> Abrir Tracker de Iniciativa</a>
                    
                    <h4>Jogadores na Campanha:</h4>
                    <ul>
                        <?php if(!empty($campaign['players'])): ?>
                            <?php foreach ($campaign['players'] as $player): ?>
                                <li><?= htmlspecialchars($player['nome']) ?> (<?= htmlspecialchars($player['email']) ?>)</li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Nenhum jogador na campanha ainda.</li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <hr>

    <section>
        <h2>Criar Nova Campanha</h2>
        <form action="/campaign/create" method="POST">
            <label for="campaignName">Nome da Campanha:</label>
            <input type="text" name="campaignName" id="campaignName" required><br><br>

            <label for="campaignPassword">Senha da Campanha:</label>
            <input type="password" name="campaignPassword" id="campaignPassword" required><br><br>

            <label for="sessionsCount">Número de Sessões Iniciais:</label>
            <input type="number" name="sessionsCount" id="sessionsCount" value="0"><br><br>

            <button type="submit">Criar Campanha</button>
        </form>
    </section>
    <hr>

    <section>
        <h2>Convidar Jogador</h2>
        <form action="/campaign/invite" method="POST">
            <label for="campaignId">ID da Campanha:</label>
            <input type="number" name="campaignId" id="campaignId" required><br><br>

            <label for="playerEmail">Email do Jogador:</label>
            <input type="email" name="playerEmail" id="playerEmail" required><br><br>

            <button type="submit">Enviar Convite</button>
        </form>
    </section>
</body>
</html>