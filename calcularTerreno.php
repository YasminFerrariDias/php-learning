<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo da Área do Terreno</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Cálculo da Área do Terreno</th>
            </tr>
            <tr>
                <td>Qual a largura do terreno (em metros): </td>
                <td><input type="text" name="largura" required></td>
            </tr>
            <tr>
                <td>Qual o comprimento do terreno (em metros): </td>
                <td><input type="text" name="comprimento" required></td>
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
        // Validação e sanitização dos valores de entrada
        $largura = filter_input(INPUT_POST, 'largura', FILTER_VALIDATE_FLOAT);
        $comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_VALIDATE_FLOAT);

        if ($largura === false || $largura <= 0 || $comprimento === false || $comprimento <= 0) {
            echo "<p style='color: red;'>Por favor, insira valores válidos e maiores que zero para largura e comprimento.</p>";
        } else {
            // Cálculo da área do terreno
            $metros = $largura * $comprimento;

            // Classificação do terreno
            if ($metros < 100) {
                $categoria = "popular";
            } elseif ($metros >= 100 && $metros <= 500) {
                $categoria = "master";
            } else {
                $categoria = "vip";
            }

            // Exibição do resultado
            echo "<p>A área do terreno é de <strong>$metros m²</strong>. O terreno é classificado como <strong>$categoria</strong>.</p>";
        }
    }
    ?>
</body>
</html>
