<?php
// Recebe os dados do formulário, faz o hash da senha e salva o usuário em usuarios.txt.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    file_put_contents("usuarios.txt", "$usuario:$senha\n", FILE_APPEND);
    
    echo "Usuário cadastrado com sucesso! <a href='login.php'>Faça login</a>.";
}
?>
