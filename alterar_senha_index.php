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

            <? if(isset($_GET['status']) && $_GET['status']=='atualizado'){?>
                <div id="modal" class="show.bs.modal " tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-success">Sucesso</h5>
                        <button type="button" class="close" data-dismiss="show.bs.modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Senha atualida com sucesso no sistema</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="show.bs.modal" onClick="parent.location='alterar_senha_index.php'" >Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            <?}?>
            <div class="card-login mt-3">
            <div class="card">
                <div class="card-header">
                Alterar senha
                </div>
                
                <div class="card-body ">
                    <form action="controlador.php?acao=atualizar&tipo=usu&tela=index" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" placeholder="E-mail"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Senha atual:</label> 
                            <div class="col-sm-10">
                                <input name="senha_atual" type="password" class="form-control" placeholder="Senha Atual">
                                <? if(isset($_GET['senha_atual']) && $_GET['senha_atual'] == 'incorreto'){?>
                                    <div class="text-danger">Senha incorreta</div>
                                <?}?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nova senha:</label> 
                            <div class="col-sm-10">
                                <input name="senha_nova" type="password" class="form-control" placeholder="Nova Senha">
                            </div>
                        </div><div class="form-group row">
                            <label class="col-sm-2 col-form-label">Confirme senha:</label> 
                            <div class="col-sm-10">
                                <input name="senha_nova_confirma" type="password" class="form-control" placeholder="Confirme Nova Senha ">
                                <? if(isset($_GET['senha_nova']) && $_GET['senha_nova'] == 'incorreto'){?>
                                    <div class="text-danger">Senhas não conferem</div>
                                <?}?>
                            </div>
                        </div>

                       
                        
                        <button class="btn btn-lg btn-success btn-block" type="submit">Atualizar</button>
                    </form>

                    <a href="index.php" class="btn btn-lg btn-danger btn-block" type="submit">Voltar</a>
                </div>
            </div>
        
    </div>
  </body>
</html>