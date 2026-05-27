<?php // Formulário de login simples que valida se usuário e senha possuem ao menos 8 caracteres. ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Simples</title>
</head>
<body>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <th colspan="2">Login Simples</th>
            </tr>
            <tr>
                <th>Usuário:</th>
                <th><input type="text" name="usu"></th>
            </tr>
            <tr>
                <th>Senha:</th>
                <th><input type="password" name="sen"></th>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="bt" value="LOGIN"></th>
            </tr>
        </table>
        <br>
    </form>
</body>
<style type="text/css">
    body {
        background-color: green;
        color: blue;
    }

    table {
        background-color: greenyellow;
    }

    input {
        color: blue;
    }
</style>
</html>

<?php
    if (isset($_POST['bt'])) {
        $usu = $_POST['usu'];
        $sen = $_POST['sen'];

        function valUsu($usu) {
            return strlen($usu) >= 8;
        }

        function valSen($sen) {
            return strlen($sen) >= 8;
        }

        if (valUsu($usu) || valSen($sen)) {
            echo"Usúario e senha válidos";
        } else {
            echo"Usúario e/ou senha inválidos";
        }
    } 
?>