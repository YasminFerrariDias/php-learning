<?php
// Busca um usuário pelo nome em usuarios.txt e exibe o resultado da pesquisa.
if (isset($_GET['nomeBuscado'])) {
    $nomeBuscado = $_GET['nomeBuscado'];
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $encontrado = false;

    foreach ($usuarios as $linha) {
        list($user, ) = explode(":", $linha);
        if (stripos($user, $nomeBuscado) !== false) {
            echo "Usuário encontrado: $user<br>";
            $encontrado = true;
        }
    }

    if (!$encontrado) {
        echo "Usuário não encontrado.";
    }
}
?>
