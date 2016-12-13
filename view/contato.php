<!doctype html>
<html>
<head>
<title>Lanchonete - Contato</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
    <!--<link rel="stylesheet" href="../css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/galeria.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</head>

<body>
<header>
    <nav style="background-color:#4db6ac;">
    		<div class="nav-wrapper">
      			<a href="#" class="brand-logo">Logo</a>
      				<ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../view/index.php">Início</a></li>
        				<li><a href="../view/galeria.php">Galeria</a></li>
        				<li class="active"><a href="../view/contato.php">Contato</a></li>
      				</ul>
    		</div>
 	 	</nav>
	</header><!-- Fim do nav -->
<div class="card-panel teal lighten-2" style="margin-top:0px;">
  <style type="text/css">
  #btn-edit-card{
	  margin-left:90%;
  }
  .card-panel{
	  color:#FFFFFF;
  }
  </style>
<center>
  <h3>Lanchonete Sem Nome <br /><small class="subtitle">Frase de abordagem</small></h3>
  </center>
</div>
<section class="card-panel" style="width:540px; margin-left:400px;">
<div class="container">
	<div class="row">
    <form class="col s7 push-s5" style="left:0px;">
     <div class="row" style="width:350px;">
        <div class="input-field col s12">
          <i class="material-icons prefix">person_pin</i>
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Nome Completo</label>
        </div>
      </div>
      <div class="row" style="width:350px;">
      <div class="input-field col s12">
        <i class="material-icons prefix">location_on</i>
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Endereço</label>
        </div>
      </div>  
      <div class="row" style="width:350px;">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row" style="width:350px;">
        <div class="input-field col s12">
          <i class="material-icons prefix">message</i>
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Descrição</label>
        </div>
      </div>
      <a class="waves-effect waves-light btn" style="margin-left:120px;">Enviar</a>
    </form>
  </div>
  </div>
</section>
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