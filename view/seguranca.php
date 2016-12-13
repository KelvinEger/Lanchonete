<?php
/* 
 * Funcao que verifica se o  ususario está logado
 * caso sim, mostra mensagem, caso nao, redireciona para o login
 */
function validaUsu() {
    if ($_SESSION["name"]) {
        echo 'olha '. $_SESSION["name"];
    }else{
        header('Location: login.php');
    }
}
