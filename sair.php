<?php
    //Inicializando a sessão
    session_start();
    //Destruindo a sessão e as variáveis
    session_destroy();
    //Redirecionando para a página de login
    header('Location: index.php?mess=logout');
?>