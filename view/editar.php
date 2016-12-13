<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap -->
    <title>Editar</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/Estilo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="?acao_enviar">
     				<div class="input-group col-md-6">
  						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
  						<input type="text" class="form-control" value="<?php echo $nome; ?>" aria-describedby="basic-addon1" name="nome" required>
					</div><br /><br />
     				<div class="input-group col-md-6">
  						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
  						<input type="text" class="form-control" value="<?php echo $endereco; ?>" aria-describedby="basic-addon1" name="endereco" required>
					</div><br /><br />
                    <div class="input-group col-md-6">
  						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
  						<textarea type="text" rows="4" class="form-control" value="<?php echo $pedido; ?>" aria-describedby="basic-addon1" name="pedido"></textarea>
					</div><br /><br />
                    <div class="input-group col-md-6">
  						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-shopping-cart"></i></span>
  						<input type="number" class="form-control" value="<?php echo $quatidade; ?>" aria-describedby="basic-addon1" name="quantidade" required>
					</div><br /><br />
     				<div class="form-group">   
     				</div>
                    <div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="submit" class="btn btn-primary" name="enviar" value="action">Enviar</button>
      				</div>
				</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
    //include database connection
    include ("../libs/connect.php");
    
    $action = isset( $_POST['enviar'] ) ? $_POST['enviar'] : "";
    //Se foi enviado update
    if($action == "update"){
      try{
	  //SQL para atualização. bindParam para substitur texto por valor
	  $query = "update pedidos set nome = :nome, endereco = :endereco, pedido = :pedido, quantidade  = :quantidade where id = :id";
	  $stmt = $con->prepare($query);
	  $stmt->bindParam(':firstname', $_POST['nome']);
	  $stmt->bindParam(':lastname', $_POST['endereco']);
	  $stmt->bindParam(':username', $_POST['pedido']);
	  $stmt->bindParam(':password', $_POST['quantidade']);
	  $stmt->bindParam(':id', $_POST['id']);	
	  // Executar a query
	  if($stmt->execute()){
	      echo "Registro atualizado com sucesso!";
	  }else{
	      die('Não foi possível atualizar o registro');
	  }
      }catch(PDOException $exception){ //to handle error
	  echo "Error: " . $exception->getMessage();
      }
    }
  
    try {
	//Obter dados do registro com id
	$query = "select id, nome, endereco, pedido, quantidade from pedidos where id = ? limit 0,1";
	$stmt = $con->prepare( $query );
	//Substitui a primeira marcação ? 
	$stmt->bindParam(1, $_REQUEST['id']);
	$stmt->execute();
	//Obter dados do banco
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	//Adicionar cada campo em uma var
	$id = $row['id'];
	$nome = $row['nome'];
	$endereco = $row['endereco'];
	$pedido = $row['pedido'];
	$quantidade = $row['quantidade'];
    }catch(PDOException $exception){ 
	echo "Error: " . $exception->getMessage();
    } 
?>
</body>
</html>
