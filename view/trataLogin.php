<?php

include("../libs/connect.php");


// Preparando statement
$stmt = $con->prepare("SELECT name, password FROM admin WHERE name = ? AND password = ?");
$stmt->bindparam(1, $_POST['name'], PDO::PARAM_STR);
$stmt->bindparam(2, $_POST['password'], PDO::PARAM_STR);
$stmt->execute();
$obj = $stmt->fetchObject();

// Se a linha existe: indicar que esta logado e encaminhar para outro lugar
if ($obj) {
    $_SESSION["name"] = $obj["name"];
    header('Location: admin.php');
}else{
    echo "Login ou Senha inválidos";
}
?>