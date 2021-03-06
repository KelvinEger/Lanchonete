<?php
session_start();
require_once'init.php';

//if (empty($_SESSION['nome'])) {
//		return header('location: index.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Lanchonete - Painel</title>

        <!-- Bootstrap -->
        <!--<link href="../css/bootstrap.min.css" rel="stylesheet">-->
        <link href="../css/Estilo.css" rel="stylesheet">
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
    	<nav style="background-color:#4db6ac; margin-top:-15px;">
    		<div class="nav-wrapper">
      					<ul id="nav-mobile" class="right hide-on-med-and-down">
                           	<li><a href="edit_cardapio.php">Editar Cardápido</a></li>
                            <li class="active"><a href="pedidos.php">Pedidos</a></li>
                        	<li><a href="logout.php">&nbsp;Sair&nbsp;</a></li>
      					</ul>
                        <p class="center">Bem-vindo ao seu painel, <strong class="user"><b><?php echo  $_SESSION['usuario']; ?></b></strong></p>
    			</div>
 	 		</nav><!-- Fim do nav -->
</header>
<div class="card-panel teal lighten-2" style="margin-top:0px;">
<center>
  <h3>Lanchonete Sem Nome <br /><small class="subtitle">Frase de abordagem</small></h3>
  </center>
</div>
<br />
<script type="text/javascript">
        $(document).ready(function () {
            lista();
        });

        function lista() {
            $.ajax({
                url: 'listaPedidos.php',
                success: function (data) {
                    $(".lista").html(data);
                    $('.modal-trigger').leanModal();
                }
            });
        }

        function exclui(id) {
            var info = {"id": id};
            $.ajax({
                type: 'post',
                url: 'excluirpedidos.php',
                data: info,
            }).done(function (data) {
                Materialize.toast(data, 2000);
                lista();
            });
        }

        function envia() {
            var nome = $("input[name=produto]").val();
            var descri = $("input[name=componente]").val();
            var preco = $("input[name=preco]").val();
            var info = {"produto": nome, "componente": descri, "preco": preco};
            $.ajax({
                type: 'post',
                url: 'cadastraCardapio.php',
                data: info,
            }).done(function (data) {
                Materialize.toast(data, 2000);
                lista();
            });
        }
        function altera() {
            var form =  	 $('#frm_altera');
            var id = 		 $("input[name=id]", form).val();
            var nome = 		 $("input[name=nome]", form).val();
            var endereco =   $("input[name=endereco]", form).val();
            var pedido = 	 $("input[name=pedido]", form).val();
			var quantidade = $("input[name=quantidade]", form).val();
            var info = {"id": id, "nome": nome, "endereco": endereco, "pedido": pedido, "quantidade": quantidade};
            $.ajax({
            type: 'post',
            url: 'alteraPedidos.php',
            data: info,
            success: function (data) {
            Materialize.toast(data, 2000);
            lista();
             }
             });
             }

        function modalAltera(id, nome, endereco, pedido, quantidade) {
            var form = $('#modal1 form').get(0);
            $(form.id).attr('value', id);
            $(form.nome).attr('placeholder', nome);
            $(form.endereco).attr('placeholder', endereco);
            $(form.pedido).attr('placeholder', pedido);
			$(form.quantidade).attr('placeholder', quantidade);
            lista();
        }
    </script>
    <div class="lista">
      </div>
        <div class="resposta container">
        <h5></h5>
    </div>
<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <form id="frm_altera">
                <div class="container">
                <h4>Alterar Item <i class="material-icons">mode_edit</i></h4><br />
                	Código: <input disabled type="text" id="disable" type="text" name="id" value="" class="validate"/>
                    <label for="disabled"></label>
                    <label>Nome: <input type="text" name="nome" required/></label>
                    <label>Endereço: <input type="text" name="endereco" required/></label>
                    <label>Pedido: <input type="text" name="pedido" required/></label>
                    <label>Quantidade: <input type="text" name="quantidade" required/></label>
                    <center><br />
                    <a onclick="altera()" class="waves-effect waves-light btn">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="modal-action modal-close waves-effect waves-green btn-flat red">Cancelar</a>
                    </center>
                </div>
            </form>
  	</div><!-- Modal1 -->
 </div><!-- Modal Content -->
 <br />
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
</body>
</html>