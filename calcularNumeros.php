//Faça um algoritmo que receba dois números e ao final mostre a soma, subtração, multiplicação e a divisão dos números lidos.
//Já postado no github
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular números</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Calcular números</th>
            </tr>
            <tr>
                <td>Coloque o primeiro número: </td>
                <td><input type="text" name="n1" required></td>
            </tr>
            <tr>
                <td>Coloque o segundo número: </td>
                <td><input type="text" name="n2" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Calcular">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitização e validação
        $n1 = filter_input(INPUT_POST, 'n1', FILTER_VALIDATE_FLOAT);
        $n2 = filter_input(INPUT_POST, 'n2', FILTER_VALIDATE_FLOAT);

        if ($n1 === false || $n2 === false) {
            echo "<p style='color: red;'>Por favor, insira números válidos.</p>";
        } else {
            // Cálculos
            $soma = $n1 + $n2;
            $subtracao = $n1 - $n2;
            $multiplicacao = $n1 * $n2;

            // Tratamento para divisão por zero
            if ($n2 != 0) {
                $divisao = $n1 / $n2;
                echo "<p>Os resultados são:</p>";
                echo "<ul>
                        <li>Soma: $soma</li>
                        <li>Subtração: $subtracao</li>
                        <li>Multiplicação: $multiplicacao</li>
                        <li>Divisão: $divisao</li>
                      </ul>";
            } else {
                echo "<p>Os resultados são:</p>";
                echo "<ul>
                        <li>Soma: $soma</li>
                        <li>Subtração: $subtracao</li>
                        <li>Multiplicação: $multiplicacao</li>
                        <li>Divisão: Não é possível dividir por zero.</li>
                      </ul>";
            }
        }
    }
    ?>
</body>
</html>
