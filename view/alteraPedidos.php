<?php

include ("../libs/connect.php");
        
		$id    		= $_POST['id'];
		$nome 		= $_POST['nome'];
		$endereco   = $_POST['endereco'];
		$pedido 	= $_POST['pedido'];
		$quantidade = $_POST['quantidade'];

          $query = "UPDATE pedidos SET nome = :nome, endereco = :endereco, pedido = :pedido, quantidade = :quantidade where id = :id";

	  $stmt = $con->prepare($query);
	  //Preencher dados na SQL
	  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
	  $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
	  $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
	  $stmt->bindParam(':pedido', $pedido, PDO::PARAM_STR);
	  $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
		if($stmt->execute()){
    	echo 'Editado com sucesso';
		}else{
    	echo 'Erro ao editar';
		}
?>