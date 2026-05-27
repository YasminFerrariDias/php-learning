<?php // Processa a folha de pagamento: calcula INSS, IR, salário líquido, 13° e férias proporcionais, salvando na sessão. ?>
<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sal = floatval($_POST['sal']);
    $mes = intval($_POST['mes']);

    // DESCONTO INSS
    if ($sal <= 1518.00) {
        $inss = $sal * 0.075;
    } elseif ($sal <= 2793.88) {
        $inss = $sal * 0.09;
    } elseif ($sal <= 4190.83) {
        $inss = $sal * 0.12;
    } elseif ($sal <= 8157.41) {
        $inss = $sal * 0.14;
    } else {
        echo "Insira valores válidos.";
        $inss = 0;
    }

    // DESCONTO IRRF
    if ($sal <= 2259.21) {
        $irrf = 0; // Isento
    } elseif ($sal <= 2826.65) {
        $irrf = $sal * 0.075 - 169.44;
    } elseif ($sal <= 3751.05) {
        $irrf = $sal * 0.15 - 381.44;
    } elseif ($sal <= 4664.68) {
        $irrf = $sal * 0.225 - 662.77;
    } else {
        $irrf = $sal * 0.275 - 896.00;
    }

    // SALÁRIO LÍQUIDO
    $sl = $sal - $inss - $irrf;

    // 13° SALÁRIO (Proporcional se < 12 meses)
    $dt = ($sal * $mes) / 12;

    // FÉRIAS (Proporcional se < 12 meses)
    $fer = ($sal * 1.3333) / 12 * $mes;

    // Salvar valores na sessão
    $_SESSION['nome'] = $nome;
    $_SESSION['sal'] = number_format($sal, 2, ',', '.');
    $_SESSION['mes'] = $mes;
    $_SESSION['inss'] = number_format($inss, 2, ',', '.');
    $_SESSION['irrf'] = number_format($irrf, 2, ',', '.');
    $_SESSION['sl'] = number_format($sl, 2, ',', '.');
    $_SESSION['dt'] = number_format($dt, 2, ',', '.');
    $_SESSION['fer'] = number_format($fer, 2, ',', '.');

    header("Location: resposta.php");
    exit();
} 
?>
