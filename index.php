<?php 
    
    require_once "config.php";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Fundação CEFETMINAS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="controlador.php?acao=recuperar" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <? if(isset($_GET['login']) && $_GET['login'] == 'incorreto'){?>

                <div class="text-danger">Usuario ou senha inválido(s) </div>

                <? } ?>

                <? if(isset($_GET['login']) && $_GET['login'] == 'acessoNegado'){?>

                <div class="text-danger">Realize o Login</div>

                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                
              </form>
              <!--<a href="tela_cadastro.php" class="mx-auto">Cadastrar funcionário</a>-->
            </div>
          </div>
        </div>
    </div>
  </body>
</html>