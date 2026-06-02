<!-- Formulário de cadastro de novo usuário, envia os dados para registerProcess.php via POST. -->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
    </head>
    <body>
        <h1>Cadastro de Usuário</h1>
        <form action="registerProcess.php" method="POST">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>
