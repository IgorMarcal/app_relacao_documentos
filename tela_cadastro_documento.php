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
                        <p>Documento cadastrado com sucesso no sistema</p>
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
                Novo cadastro de documento
                </div>
                
                <div class="card-body ">
                    <form action="controlador.php?acao=inserir&tipo=doc" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nome do arquivo</label>
                            <div class="col-sm-9">
                                <input name="nome" type="text" class="form-control" placeholder="Nome"> 
                            </div>
 
                            <div class="input-group mt-3 col-12">
                                <label class="input-group-text" for="inputGroupFile01">Enviar</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                        </div>
                    

                        <button class="btn btn-lg btn-success btn-block" type="submit">Cadastrar</button>
                    </form>

                    <a href="home.php" class="btn btn-lg btn-danger btn-block" type="submit">Voltar</a>
                </div>
            </div>
        
    </div>
  </body>
</html>