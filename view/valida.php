<?php

include("../libs/connect.php");


$nome = $_POST['name'];
$password = $_POST['password'];

$consulta = $pdo->query("SELECT nome, senha FROM login;");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    if ($linha['nome'] == $nome && $linha['senha'] == $password) {
        echo 'achou usuario cadastrado, ou seja, pode logar';
        $_SESSION["name"] = $linha["name"];
        header('Location: admin.php');
    } else {
        echo "Login ou Senha inválidos";
    }
}
?>