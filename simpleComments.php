<?php // Formulário que recebe um comentário e o exibe na tela via POST. ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários Local</title>
</head>
<body>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <th colspan="2">Comentários Local</th>
            </tr>
            <tr>
                <th>Comentário:</th>
                <th><input type="text" name="com"></th>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="bt" value="ENVIAR"></th>
            </tr>
        </table>
        <br>
    </form>
</body>
<style type="text/css">
    body {
        background-color: pink;
        color: blueviolet;
    }

    table {
        background-color: lightcoral;
    }
</style>

</html>

<?php
    if (isset($_POST['bt'])) {
        $com = $_POST['com'];

        echo"$com";
    } 
?>