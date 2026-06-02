<!-- Formulário de busca de usuário por nome, envia os dados para searchProcess.php via GET. -->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar Usuário</title>
    </head>
    <body>
        <h1>Buscar Usuário</h1>
        <form action="searchProcess.php" method="GET">
            <label for="nomeBuscado">Nome:</label>
            <input type="text" id="nomeBuscado" name="nomeBuscado" required>
            <button type="submit">Buscar</button>
        </form>
    </body>
</html>
