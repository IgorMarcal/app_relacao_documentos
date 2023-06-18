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

  <body>

    <div class="container">   

            <? if(isset($_GET['cadastro']) && $_GET['cadastro']=='success'){?>
                <div id="modal" class="show.bs.modal " tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-success">Sucesso no cadastro</h5>
                        <button type="button" class="close" data-dismiss="show.bs.modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Usuario cadastrado com sucesso no sistema</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="show.bs.modal" onClick="parent.location='tela_cadastro.php'" >Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            <?}?>
            <div class="card-login mt-3">
            <div class="card">
                <div class="card-header">
                Novo cadastro
                </div>
                
                <div class="card-body ">
                    <form action="controlador.php?acao=inserir" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nome Completo:</label>
                            <div class="col-sm-9">
                                <input name="nome" type="text" class="form-control" placeholder="Nome"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" placeholder="E-mail"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Senha:</label> 
                            <div class="col-sm-10">
                                <input name="senha" type="password" class="form-control" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-group custom-control custom-radio" >
                            <input type="radio" id="radio_adm" name="tipo_user" class="custom-control-input"  value="1">
                            <label class="custom-control-label" for="radio_adm"> Administrador</label>
                        </div>
                        <div class="form-group custom-control custom-radio" >
                            <input type="radio" id="radio_comum" name="tipo_user" class="custom-control-input" value="2">
                            <label class="custom-control-label" for="radio_comum"> Comum</label>
                        </div>

                        <button class="btn btn-lg btn-success btn-block" type="submit">Cadastrar</button>
                    </form>

                    <a href="home.php" class="btn btn-lg btn-danger btn-block" type="submit">Voltar</a>
                </div>
            </div>
        
    </div>
  </body>
</html>