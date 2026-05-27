<?php // Simula um empréstimo imobiliário verificando se a prestação mensal cabe em 30% do salário. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Empréstimo</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Simulação de Empréstimo</th>
            </tr>
            <tr>
                <td>Valor da casa (em reais): </td>
                <td><input type="number" step="0.01" name="casa" required></td>
            </tr>
            <tr>
                <td>Seu salário mensal (em reais): </td>
                <td><input type="number" step="0.01" name="salario" required></td>
            </tr>
            <tr>
                <td>Em quantos anos deseja pagar: </td>
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
        // Recebendo os dados do formulário e validando
        $casa = filter_input(INPUT_POST, 'casa', FILTER_VALIDATE_FLOAT);
        $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
        $anos = filter_input(INPUT_POST, 'anos', FILTER_VALIDATE_INT);

        if ($casa === false || $salario === false || $anos === false || $casa <= 0 || $salario <= 0 || $anos <= 0) {
            echo "<p style='color: red;'>Por favor, insira valores válidos e positivos para todos os campos.</p>";
        } else {
            // Cálculos
            $meses = $anos * 12; // Total de meses para pagamento
            $prestacao = $casa / $meses; // Valor da prestação mensal
            $limite = $salario * 0.3; // 30% do salário

            // Exibindo os resultados
            if ($prestacao > $limite) {
                echo "<p style='color: red;'>Empréstimo NEGADO: A prestação mensal seria de <strong>R$ " . number_format($prestacao, 2, ',', '.') . "</strong>, 
                que excede os 30% do salário (<strong>R$ " . number_format($limite, 2, ',', '.') . "</strong>).</p>";
            } else {
                echo "<p style='color: green;'>Empréstimo APROVADO: A prestação mensal será de <strong>R$ " . number_format($prestacao, 2, ',', '.') . "</strong>, 
                dentro do limite de 30% do salário (<strong>R$ " . number_format($limite, 2, ',', '.') . "</strong>).</p>";
            }
        }
    }
    ?>
</body>
</html>
