<?php // Converte um valor em dólares para reais com base na cotação informada pelo usuário. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Dólar para Real</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Conversão de Dólar para Real</th>
            </tr>
            <tr>
                <td>Qual a cotação do dólar hoje (em reais): </td>
                <td><input type="text" name="cotacao" required></td>
            </tr>
            <tr>
                <td>Quantos dólares você tem: </td>
                <td><input type="text" name="dolar" required></td>
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
        // Sanitização e validação das entradas
        $cotacao = filter_input(INPUT_POST, 'cotacao', FILTER_VALIDATE_FLOAT);
        $dolar = filter_input(INPUT_POST, 'dolar', FILTER_VALIDATE_FLOAT);

        if ($cotacao === false || $cotacao <= 0) {
            echo "<p style='color: red;'>Por favor, insira um valor válido e maior que zero para a cotação do dólar.</p>";
        } elseif ($dolar === false || $dolar < 0) {
            echo "<p style='color: red;'>Por favor, insira um valor válido para a quantidade de dólares.</p>";
        } else {
            // Cálculo da conversão
            $reais = $dolar * $cotacao;
            $reaisFormatado = number_format($reais, 2, ',', '.');

            // Exibição do resultado
            echo "<p>A conversão de <strong>\$$dolar</strong> para reais é: <strong>R\$ $reaisFormatado</strong>.</p>";
        }
    }
    ?>
</body>
</html>
