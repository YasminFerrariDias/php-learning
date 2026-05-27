<?php // Calcula a média de três notas e informa se o aluno foi aprovado, está em recuperação ou reprovado. ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média dos Alunos</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <th colspan="2" align="center">Média dos Alunos</th>
            </tr>
            <tr>
                <td>Nome: </td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td>Nota 1: </td>
                <td><input type="text" name="n1" required></td>
            </tr>
            <tr>
                <td>Nota 2: </td>
                <td><input type="text" name="n2" required></td>
            </tr>
            <tr>
                <td>Nota 3: </td>
                <td><input type="text" name="n3" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Calcular Média">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitização e validação das entradas
        $nome = htmlspecialchars(trim($_POST['nome']));
        $n1 = filter_input(INPUT_POST, 'n1', FILTER_VALIDATE_FLOAT);
        $n2 = filter_input(INPUT_POST, 'n2', FILTER_VALIDATE_FLOAT);
        $n3 = filter_input(INPUT_POST, 'n3', FILTER_VALIDATE_FLOAT);

        if (!$n1 || !$n2 || !$n3) {
            echo "<p style='color: red;'>Por favor, insira apenas números válidos para as notas.</p>";
        } else {
            // Cálculo da média
            $media = ($n1 + $n2 + $n3) / 3;
            $mediaFormatada = number_format($media, 2);

            // Determinação da situação do aluno
            if ($media >= 7) {
                echo "<p style='color: green;'>$nome foi <strong>aprovado</strong>! A média é $mediaFormatada.</p>";
            } elseif ($media >= 5.1 && $media <= 6.9) {
                echo "<p style='color: orange;'>$nome está em <strong>recuperação</strong>. A média é $mediaFormatada.</p>";
            } else {
                echo "<p style='color: red;'>$nome foi <strong>reprovado</strong>. A média é $mediaFormatada.</p>";
            }
        }
    }
    ?>
</body>
</html>

