<?php
// Autentica o usuário comparando as credenciais com os dados salvos em usuarios.txt.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $autenticado = false;

    foreach ($usuarios as $linha) {
        list($user, $hashedSenha) = explode(":", $linha);
        if ($usuario === $user && password_verify($senha, $hashedSenha)) {
            $autenticado = true;
            break;
        }
    }

    if ($autenticado) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        echo "Bem-vindo, $usuario! <a href='home.php'>Início</a>";
    } else {
        echo "Usuário ou senha inválidos. <a href='login.php'>Tente novamente</a>";
    }
}
?>
