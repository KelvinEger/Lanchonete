<?php

include ("../libs/connect.php");
        
		$id    		= $_POST['id'];
		$nome 		= $_POST['produto'];
		$componente = $_POST['componente'];
		$preco 		= $_POST['preco'];

          $query = "UPDATE cardapio SET produto = :produto, componente = :componente, preco = :preco where id = :id";

	  $stmt = $con->prepare($query);
	  //Preencher dados na SQL
	  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
	  $stmt->bindParam(':produto', $nome, PDO::PARAM_STR);
	  $stmt->bindParam(':componente', $componente, PDO::PARAM_STR);
	  $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
		if($stmt->execute()){
    	echo 'Editado com sucesso';
		}else{
    	echo 'Erro ao editar';
		}
?>