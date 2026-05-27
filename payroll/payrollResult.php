<?php // Exibe a folha de pagamento completa com os dados calculados e salvos na sessão pelo payrollProcess.php. ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
            <th colspan="2">Folha de Pagamento</th>
        </tr>
        <tr>
            <th>Nome</th>
            <th><?php echo $_SESSION['nome']; ?></th>
        </tr>
        <tr>
            <th>Salário bruto:</th>
            <th>R$ <?php echo $_SESSION['sal']; ?></th>
        </tr>
        <tr>
            <th>Meses trabalhado:</th>
            <th><?php echo $_SESSION['mes']; ?></th>
        </tr>
        <tr>
            <th>Desconto INSS:</th>
            <th>R$ <?php echo $_SESSION['inss']; ?></th>
        </tr>
        <tr>
            <th>Desconto IR:</th>
            <th>R$ <?php echo $_SESSION['irrf']; ?></th>
        </tr>
        <tr>
            <th>Salário líquido:</th>
            <th>R$ <?php echo $_SESSION['sl']; ?></th>
        </tr>
        <tr>
            <th>Décimo terceiro:</th>
            <th>R$ <?php echo $_SESSION['dt']; ?></th>
        </tr>
        <tr>
            <th>Férias:</th>
            <th>R$ <?php echo $_SESSION['fer']; ?></th>
        </tr>
    </table>
    <style type="text/css">
        body {
            background-color: pink;
            margin-top: 150px;
            color: white;
        }

        table {
            background-color: lightskyblue;
            padding: 10px;
        }

        th {
            padding: 10px;
        }
    </style>
</body>
</html>