<?php

include ("../libs/connect.php");

$nome = $_POST['produto'];
$componente = $_POST['componente'];
$preco = $_POST['preco'];

$query = "INSERT INTO cardapio(produto, componente, preco) VALUES (:produto, :componente, :preco)";

	  $stmt = $con->prepare($query);
	  //Preencher dados na SQL
	  $stmt->bindParam(':produto', $nome, PDO::PARAM_STR);
	  $stmt->bindParam(':componente', $componente, PDO::PARAM_STR);
	  $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);


if($stmt->execute()){
    echo 'Cadastrado com sucesso';
}else{
    echo 'nao cadastrado';
}

?>