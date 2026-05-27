<?php // Calcula o reajuste salarial de um funcionário com base nos anos de empresa: 3%, 12,5% ou 20%. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Aumento Salarial</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Cálculo de Aumento Salarial</th>
            </tr>
            <tr>
                <td>Nome do funcionário: </td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td>Qual o seu salário atual (em reais): </td>
                <td><input type="number" step="0.01" name="salario" required></td>
            </tr>
            <tr>
                <td>Quantos anos trabalha na empresa: </td>
                <td><input type="number" name="anos" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Calcular">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebendo e validando os valores do formulário
        $nome = htmlspecialchars($_POST['nome']);
        $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
        $anos = filter_input(INPUT_POST, 'anos', FILTER_VALIDATE_INT);

        if ($salario === false || $salario <= 0 || $anos === false || $anos < 0) {
            echo "<p style='color: red;'>Por favor, insira valores válidos para salário e anos de trabalho.</p>";
        } else {
            // Cálculo do aumento
            if ($anos < 3) {
                $percentual = 3;
            } elseif ($anos >= 3 && $anos <= 10) {
                $percentual = 12.5;
            } else {
                $percentual = 20;
            }

            $aumento = ($salario * $percentual) / 100;
            $salario_final = $salario + $aumento;

            // Exibição do resultado
            echo "<p>Funcionário: <strong>$nome</strong></p>";
            echo "<p>Salário inicial: <strong>R$ " . number_format($salario, 2, ',', '.') . "</strong></p>";
            echo "<p>Percentual de aumento: <strong>$percentual%</strong></p>";
            echo "<p>Valor do aumento: <strong>R$ " . number_format($aumento, 2, ',', '.') . "</strong></p>";
            echo "<p>Salário final: <strong>R$ " . number_format($salario_final, 2, ',', '.') . "</strong></p>";
        }
    }
    ?>
</body>
</html>
