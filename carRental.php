<?php // Calcula o valor do aluguel de carro (popular ou luxo) com base nos dias e quilômetros rodados. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="" method="post">
        <table align="center" border="1">
            <tr>
                <th colspan="2"><h3>Aluguel de carros</h3></th>
            </tr>
            <tr>
                <th>Qual carro (1 - Popular, 2 - Luxo):</th>
                <td><input type="text" name="carro" required></td>
            </tr>
            <tr>
                <th>Quantos dias será alugado:</th>
                <td><input type="text" name="dias" required></td>
            </tr>
            <tr>
                <th>Quantos km foram utilizados:</th>
                <td><input type="text" name="km" required></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Calcular">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os campos estão definidos e não estão vazios
        if (isset($_POST["carro"]) && isset($_POST["dias"]) && isset($_POST["km"])) {
            $carro = $_POST["carro"];
            $dias = $_POST["dias"];
            $km = $_POST["km"];

            // Verifica se as entradas são números válidos
            if (is_numeric($carro) && is_numeric($dias) && is_numeric($km)) {
                $carro = (int)$carro;
                $dias = (int)$dias;
                $km = (float)$km;

                if ($carro == 1) {
                    $aluguel = $dias * 90;
                    $kmm = $km <= 100 ? $km * 0.2 : $km * 0.1;
                    $result = $aluguel + $kmm;
                    echo "<p align='center'>O valor a ser pago é de R$ " . number_format($result, 2, ',', '.') . ".</p>";
                } elseif ($carro == 2) {
                    $aluguel = $dias * 150;
                    $kmm = $km <= 200 ? $km * 0.3 : $km * 0.25;
                    $result = $aluguel + $kmm;
                    echo "<p align='center'>O valor a ser pago é de R$ " . number_format($result, 2, ',', '.') . ".</p>";
                } else {
                    echo "<p align='center'>Número inválido! Digite '1' para Popular ou '2' para Luxo.</p>";
                }
            } else {
                echo "<p align='center'>Por favor, insira valores numéricos válidos.</p>";
            }
        }
    }
    ?>
</body>
</html>
