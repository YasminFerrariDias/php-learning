<?php // Calcula um bônus em reais com base nas horas de atividade física informadas pelo usuário. ?>
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
                <th colspan="2"><h3>Vida Saudável</h3></th>
            </tr>
            <tr>
                <th>Quantas horas você tem feito atividade física:</th>
                <td><input type="text" name="horas" required></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" value="Calcular"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se o campo foi preenchido
        if (isset($_POST["horas"])) {
            $horas = $_POST["horas"];

            // Verifica se a entrada é um número válido
            if (is_numeric($horas)) {
                $horas = (float)$horas;

                // Calcula o valor com base nas horas
                if ($horas < 10) {
                    $result = $horas * 2;
                } elseif ($horas >= 10 && $horas <= 20) {
                    $result = $horas * 5;
                } else {
                    $result = $horas * 10;
                }

                // Calcula o bônus
                $total = $result * 0.05;

                // Exibe o resultado formatado
                echo "<p align='center'>Você ganhou R$ " . number_format($total, 2, ',', '.') . ".</p>";
            } else {
                echo "<p align='center'>Por favor, insira um número válido.</p>";
            }
        }
    }
    ?>
</body>
</html>
