<?php
require_once ("../classes/DAO/usuarioDAO.php");
require_once("../classes/Entidade/usuario.php");

require_once ("../classes/DAO/senhaDAO.php");
require_once("../classes/Entidade/senha.php");


$usuarioDAO = new usuarioDAO();
$senhaDAO = new senhaDAO();

$usuario = new usuario();
$senha = new senha();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lanchonete - Login</title>

    <!-- Bootstrap -->
    <!--<link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/login.css" rel="stylesheet" />
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
  <style type="text/css">
  	h3{
		color:#FFFFFF;
	}
  </style>
    <div class="card-panel teal lighten-2" style="margin-top:0px;">
  <center>
  <h3>Lanchonete Sem Nome <br /><small class="subtitle">Frase de abordagem</small></h3>
  </center>
</div>
<center>
  <div class="container">
	<div class="row">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />-->
            
        <div class="dvCadastro">
            <div class="logoLogin">
                <img src="../img/logo.png" alt="LogSystem" title="logSystem"/>
            </div>

            <br />
            <form method="post" name="frmCadastro">
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="txtNome" placeholder="Miguel Dias" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name="txtEmail" placeholder="email@dominio.com" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td><input onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" type="password" id="txtPass" name="txtPass" placeholder="*********" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td>Confirmar senha:</td>
                        <td><input type="password" onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" id="txtPassAccept" name="txtPassAccept" placeholder="*********" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td>
                            <select multiple name="slSexo">
                                <option value="m">Masculino</option>
                                <option value="f">Feminino</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><p id="resultadoCadastro" style="font-weight: bold;">&nbsp;</p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btnSubmit" value="Cadastrar" class="btnSubmit" /> <a href="index.php">Voltar</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
if (isset($_POST['btnSubmit'])) {
    $usuario->setUs_nome($_POST['txtNome']);
    $usuario->setUs_email($_POST['txtEmail']);
    $usuario->setUs_sexo($_POST['slSexo']);

    if (!$usuarioDAO->consultarEmail($_POST['txtEmail'])) {

        if ($usuarioDAO->cadastrar($usuario)) {

            $codigoUsuario = $usuarioDAO->consultarCodUsuario($_POST['txtEmail']);

            $senha->setSe_senha($_POST['txtPassAccept']);
            $senha->setUs_cod($codigoUsuario);

            if ($senhaDAO->cadastrar($senha)) {
                ?>
                <script type = "text/javascript">
                    document.getElementById("resultadoCadastro").innerHTML = "Cadastrado com sucesso.";
                    document.getElementById("resultadoCadastro").style.color = "green";</script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    document.getElementById("resultadoCadastro").innerHTML = "Erro ao cadastrar.";
                    document.getElementById("resultadoCadastro").style.color = "red";</script>
                <?php
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            document.getElementById("resultadoCadastro").innerHTML = "O E-mail informado jรก esta cadastrado.";
            document.getElementById("resultadoCadastro").style.color = "red";</script>
        <?php
    }
}
?>


        </div><!-- /card-container -->
    </div><!-- /container -->
</center>
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
    <script type="text/javascript">
	 $(document).ready(function() {
    $('select').material_select();
  });
         $('select').material_select('destroy');
	</script>
</body>
</html>