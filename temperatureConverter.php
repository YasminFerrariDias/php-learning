<?php // Converte temperatura de Celsius para Fahrenheit usando a fórmula F = (9C + 160) / 5. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Converter graus Celsius para Fahrenheit</th>
            </tr>
            <tr>
                <td>Qual a temperatura em graus Celsius: </td>
                <td><input type="text" name="graus" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Converter">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitização e validação da entrada
        $grausc = filter_input(INPUT_POST, 'graus', FILTER_VALIDATE_FLOAT);

        if ($grausc === false) {
            echo "<p style='color: red;'>Por favor, insira um valor válido para a temperatura.</p>";
        } else {
            // Cálculo da conversão
            $grausf = (9 * $grausc + 160) / 5;
            $grausfFormatado = number_format($grausf, 2);

            // Exibição do resultado
            echo "<p>A temperatura em Fahrenheit é de <strong>$grausfFormatado°F</strong>.</p>";
        }
    }
    ?>
</body>
</html>