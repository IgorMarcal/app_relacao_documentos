<?php  
   
    require_once "validador_acesso.php" ;
    $nome_logado = isset($_SESSION['nome_logado']) ? $_SESSION['nome_logado'] : '';

?>  

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <title>Fundação CEFETMINAS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home{
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

      
      <nav class="d-flex navbar navbar-dark bg-dark">
          <div class="container-fluid">
              <div class="d-flex justify-content-start">
                  <ul class="navbar-nav flex-row">
                      <li class="nav-item p-2">
                          <p class="nav-link text-light">Olá, <?= $nome_logado ?></p>
                      </li>
                      <li class="nav-item p-2">
                          <a class="nav-link text-light" href="alterar_senha.php">Alterar senha</a>
                      </li>
                  </ul>
                  
              </div>
              <ul class="navbar-nav flex-row ml-auto">
                <li class="nav-item p-2">
                    <a class="nav-link text-light" href="logoff.php">Sair</a>
                </li>
              </ul>
          </div>
      </nav>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>

            <?php if($_SESSION['tipo_usuario_logado'] == 1){ ?>
                <div class="card-body justify-content-center">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a  href="relacao_documentos.php">
                                <p class="text-info">Meus documentos</p>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                            <a class="link-success" href="tela_cadastro_documento.php">
                                <p  class= "text-success" >Cadastrar documentos</p>
                            </a>  
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="link-success" href="tela_cadastro_funcionario.php">
                                <p class="mx-auto text-success">Cadastrar funcionário</p>
                            </a>  
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                            <a class="link-danger" href="remove_documento.php">
                                <p class="mx-auto text-danger">Remover Documento</p>
                            </a>  
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="link-danger" href="remove_funcionario.php">
                                <p class="mx-auto text-danger">Remover funcionario</p>
                            </a>  
                        </div>
                        
                    </div>

                </div>
            <?}?>

            <?php if($_SESSION['tipo_usuario_logado'] == 2){ ?>
                <div class="card-body ">
                    <div class="row justify-content-center">
                        <div class=" ">
                            <a href="relacao_documentos.php">
                                <p>Meus documentos</p>
                            </a>

                        </div>
                    </div>
                </div>
            <?}?>

          </div>
        </div>
    </div>
  </body>
</html>