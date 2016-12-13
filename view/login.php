<?php
session_start();
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
       <script>
            function envia() {
                var name = $("input[name=name]").val();
                var password = $("input[name=password]").val();
                var info = {"name": name, "password": password};
                $.ajax({
                    type: 'post',
                    url: 'trataLogin.php',
                    data: info,
                }).done(function (data) {
                    Materialize.toast(data, 2000);
                lista();
                });
            }
        </script>
        <section>
            <nav style="background-color:#4db6ac;">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Logo</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="../view/index.php">Início</a></li>
                        <li class="active"><a href="../view/login.php">Login</a></li>
                    </ul>
                </div>
            </nav>
        </section><!-- Fim do nav -->
        <style type="text/css">
            h3{
                color:#FFFFFF;
            }
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }

            body {
                background: #fff;
            }

            .input-field input[type=date]:focus + label,
            .input-field input[type=text]:focus + label,
            .input-field input[type=email]:focus + label,
            .input-field input[type=password]:focus + label {
                color: #5A00A8;
            }

            .input-field input[type=date]:focus,
            .input-field input[type=text]:focus,
            .input-field input[type=email]:focus,
            .input-field input[type=password]:focus {
                border-bottom: 2px solid #5A00A8;
                box-shadow: none;
            }
        </style>
        <div class="card-panel teal lighten-2" style="margin-top:0px;">
            <center>
                <h3>Lanchonete Sem Nome <br /><small class="subtitle">Frase de abordagem</small></h3>
            </center>
        </div>
        <br /><br />
        <section>
        <div class="container">
                <center>
                    <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                        <form class="col s12" method="post" action="#">
                            <div class="row">
                                <div class="col s12">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person_pin</i>
                                    <input class="validate" type="text" name="name" />
                                    <label for="user">Nome de Usuário</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input class="validate" type="password" name="password" />
                                    <label for="senha">Senha</label>
                                </div>
                                <label style="float: right;">
                                    <a class="pink-text" href="#!"><b>Esqueceu sua senha?</b></a>
                                </label>
                            </div>

                            <br />
                            <center>
                                <div class="row">
                                   <a onclick="envia()" class="waves-effect green darken-1t btn  modal-action" type="submit" name="envia">Entrar</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </center>
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