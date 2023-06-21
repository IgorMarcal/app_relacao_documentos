<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Relação de Documentos</title>
    <!-- Incluir os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


</head>
<body>
    <div class="container">
        <h1 class="mt-4">Relação de Documentos</h1>
        <a href="home.php">Voltar</a>
        <h2 class="mt-4">Documentos Disponíveis:</h2>
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

    <!-- Incluir os arquivos JavaScript do Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
