<?php // Verifica se um número é maior que 80, menor que 25 ou igual a 40. ?>
//Faça um algoritmo que receba um número e mostre uma mensagem caso este número sege maior que 80, menor
//que 25 ou igual a 40.

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Número</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Verificação de Número</th>
            </tr>
            <tr>
                <td>Digite algum número: </td>
                <td><input type="text" name="num" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Enviar">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitização e validação
        $number = filter_input(INPUT_POST, 'num', FILTER_VALIDATE_FLOAT);

        if ($number === false) {
            echo "<p style='color: red;'>Por favor, insira um número válido.</p>";
        } else {
            // Verificações baseadas no número
            if ($number > 80) {
                echo "<p>O número escolhido: <strong>$number</strong> é maior que 80.</p>";
            } elseif ($number < 25) {
                echo "<p>O número escolhido: <strong>$number</strong> é menor que 25.</p>";
            } elseif ($number == 40) {
                echo "<p>O número escolhido: <strong>$number</strong> é igual a 40.</p>";
            } else {
                echo "<p>O número escolhido: <strong>$number</strong> não se encaixa em nenhuma das condições específicas.</p>";
            }
        }
    }
    ?>
</body>
</html>
