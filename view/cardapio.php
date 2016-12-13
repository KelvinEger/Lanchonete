<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lanchonete - Cardápio</title>

    <!-- Bootstrap -->
    <!--<link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/Estilo.css" rel="stylesheet">
     <link rel="stylesheet" href="../css/Estilo.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
    	<nav style="background-color:#4db6ac;">
    		<div class="nav-wrapper">
      					<ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="pedidos.php"> Voltar</a></li>
                           	<li class="active"><a href="cardapio.php">Cardápido</a></li>
      					</ul>
    			</div>
 	 		</nav><!-- Fim do nav -->
</header>
  <div class="card-panel teal lighten-2" style="margin-top:0px;">
  <center>
  <h3>Lanchonete Sem Nome <br /><small class="subtitle">Frase de abordagem</small></h3>
  </center>
</div>
<div class="container">
	<div class="row"><br /><br /><br /><br />                 
  							<!-- Table -->
<?php
	//include database connection
  		include ("../libs/connect.php");
  	//Foi enviada alguma action?
 		$action = isset($_GET['enviar']) ? $_GET['enviar'] : "";
  	// Se foi excluido um registro a pagina delete.php redireciona pra index!
  		if($action=='deleted'){ echo "<div>O registro foi excluído com sucesso!</div>"; }
  	//Executar consulta para obter dados de usuarios
  		$query = "SELECT id, produto, componente, preco FROM cardapio";
  		$stmt = $con->prepare( $query );
  		$stmt->execute();
  	//Quantidade de registros retornados
  		$num = $stmt->rowCount();
                  
         if($num > 0){ //Se a consulta retornou registro(s)
    //Inicio da tabela e titulo das colunas
		echo"<table class='bordered striped highlight'>
    		 <tr>
		     <th>N°</th>
   			 <th>Produto</th>
      		 <th>Componentes do Lanche</th>
			 <th>Preço</th>
			 </tr>";
                            
     //Percorrer os registros retornados pela consulta
      		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	 //extract row -> pode usar {$firstname} no lugar de $row['firstname'] 
	  		extract($row);
	//Um registro em cada linha da tabela html
                            
    	echo"	<tr>";
        echo"	<th>{$id}</th>";
      	echo"	<th>{$produto}</th>";
      	echo"	<td colspan='0'>{$componente}</td>";
        echo"	<td>{$preco}</td>";
    	echo"	</tr>";
                }
                echo"</table>";
                }else{
      	        echo "Nenhum item adicionado!";
  		   }
?>
                            
                    </div>
                </div>
                        
             </center>
	</div>
</div><br /><br /><br /><br />
<footer class="page-footer" style="background-color:#4db6ac;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>