<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Relação de Documentos</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">



</head>
<body>
    <div class="container">
        <h1 class="mt-4">Relação de Documentos</h1>
        <a href="home.php" class="btn btn-outline-success btn-sm">Voltar</a>
        <h2 class="mt-4">Documentos Disponíveis:</h2>
        <? if(isset($_GET['exclusao']) && $_GET['exclusao']=='0'){?>
                <div id="modal" class="show.bs.modal " tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger">Erro</h5>
                        <button type="button" class="close" data-dismiss="show.bs.modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Não é possível remover usuário logado</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="show.bs.modal" onClick="parent.location='remove_funcionario.php'" >Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
            <?}else if(isset($_GET['exclusao']) && $_GET['exclusao']=='1'){?>
                
                <div id="modal" class="show.bs.modal " tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-success">Sucesso</h5>
                        <button type="button" class="close" data-dismiss="show.bs.modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Usuário e documentos removidos</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="show.bs.modal" onClick="parent.location='remove_funcionario.php'" >Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
            
            <?}?>
        <table class="list-group mt-3 d-flex" >
            <thead class="">
                <tr class="d-flex justify-content-between">
                    <th class="d-flex col-4">Nome Funcionario:</th>
                    <th class="d-flex col-4">Email do Funcionario:</th>
                    <th class="d-flex col-3">Permissao Funcionario:</th>
                    <th class="d-flex col-1">Remover Funcionario:</th>
                </tr>
            <thead>
            <?php
            require_once "cadastro_usuarios.php";
            require_once "validador_acesso.php";

            
            $conexao = new Conexao();

            $CadastrarDoc = new CadastrarFunc('','','', '', $conexao);
            $id_usuario = $_SESSION['id_usuario'];
            $consulta = $CadastrarDoc->recuperar('');
            ?>

            <?php
            foreach ($consulta as $usuario) {
                $id = $usuario->id;
                $nome_usuario = $usuario->nome;
                $email_usuario = $usuario->email;
                if($usuario->tipo_usuario == '1'){
                    $tipo_usuario = "Administrador";
                }else{
                    $tipo_usuario = "Comum";
                }

            ?>
            
                <tbody>
                    <tr class="d-flex ">
                        <td class="col-4">
                            <p class="text-uppercase "><?php echo $nome_usuario; ?></p>
                        <td>
                        <td class="col-4 ">
                            <p class="text-uppercase "><?php echo $email_usuario;?></p>
                        <td>
                        <td class="col-3 ">
                            <p class="text-uppercase "><?php echo $tipo_usuario;?></p>
                        <td>
                        <td class="col-1 text-end ">
                            <a href="controlador.php?acao=excluir&tipo=func&id=<?= $id; ?>" class="btn btn-danger ml-auto" >
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <tbody>
             
            <?php
            }
            ?>        
        </table>
    </div>

 
</body>
</html>
