<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - HarveyTools</title>
    <link rel="stylesheet" href="/styles/user/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="login d-flex justify-content-center align-items-center">
        <form method="POST" class="d-flex flex-column gap-3 align-items-center justify-content-center" id="cadastroForm" enctype="multipart/form-data">
            <h2 class="text-center">Harvey Tools</h2>

            <div class="login-input-groups w-100">

                <div class="login-group">
                    <label for="userNome" class="login-label">Nome de Usuário</label>
                    <input type="text" class="login-input" id="userNome" name="userNome">
                </div>

                <div class="login-group">
                    <label for="userEmail" class="login-label">Email</label>
                    <input type="text" class="login-input" id="userEmail" name="userEmail">
                </div>

                <div class="login-group">
                    <label for="userSenha" class="login-label">Senha</label>
                    <input type="password" class="login-input" id="userSenha" name="userSenha">
                </div>

                <div class="login-group">
                    <label for="userSenhaConf" class="login-label">Confirmar Senha</label>
                    <input type="password" class="login-input" id="userSenhaConf" name="userSenhaConf">
                </div>

                <div class="login-group">
                    <label for="userFoto" class="login-label">Foto de Perfil</label>
                    <input type="file" class="login-input" id="userFoto" name="userFoto" accept="image/png, image/jpeg, image/webp">
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

            <a class="login-link" href="/login">Fazer Login</a>
        </form>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script type="module" src="/scripts/Usuario/cadastroUsuario.js" defer></script>
</html>