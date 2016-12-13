<?php
	include ("../html/ExemploSavio.html");
    $action = isset($_POST['enviar']) ? $_POST['enviar'] : "";
    //Se a action enviada for para criar um registro
    if($action=='create'){
      //include database connection
    include ("../libs/connect.php");
	try{
	  //SQL para insert!
	  $query = "INSERT INTO pedidos SET nome = ?, endereco = ?, pedido = ?, quantidade  = ?";
	  $stmt = $con->prepare($query);
	  //Preencher dados na SQL
	  $stmt->bindParam(1, $_POST['nome']);
	  $stmt->bindParam(2, $_POST['endereco']);
	  $stmt->bindParam(3, $_POST['pedido']);
	  $stmt->bindParam(4, $_POST['quantidade']);
	  //Executar a consulta
	  if($stmt->execute()){
	    echo "<div>Registro inserido com sucesso !</div>";
		header('Location:../view/pedidos.php');
	  }else{
	    echo "Não foi posível inserir o registro.";
		header('Location: ../view/pedidos.php');
	  }	
      }catch(PDOException $exception){ 
	  echo "Error: " . $exception->getMessage();
      }
    }
  ?>