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
        <a href="home.php" class="btn btn-outline-success btn-sm">Voltar</a>
        <h2 class="mt-4">Documentos Disponíveis:</h2>
        <table class="list-group mt-3 d-flex" >
            <thead class="">
                <tr class="d-flex justify-content-between">
                    <th class="d-flex">Nome Funcionario:</th>
                    <th class="d-flex">Nome Documento:</th>
                    <th class="d-flex">Remover Documento:</th>
                </tr>
            <thead>
            <?php
            require_once "cadastro_documentos.php";
            require_once "validador_acesso.php";

            
            $conexao = new Conexao();

            $CadastrarDoc = new CadastrarDoc('', '', $conexao);
            $id_usuario = $_SESSION['id_usuario'];
            $consulta = $CadastrarDoc->recuperarDocumentos($id_usuario);
            $consulta2 = $CadastrarDoc->recuperarTodosDocumentos();
            ?>


                

            <?php
            foreach ($consulta2 as $documento) {
                $id = $documento->id;
                $nome_usuario = $documento->nome;
                $nome_doc = $documento->nome_documento;

            ?>
            
                <tbody>
                    <tr class="d-flex ">
                        <td class="col-5">
                            <p class="text-uppercase "><?php echo $nome_usuario; ?></p>
                        <td>
                        <td class="col-5 ">
                            <p class="text-uppercase "><?php echo $nome_doc;?></p>
                        <td>
                        <td class="col-2 text-end ">
                            <a href="controlador.php?acao=excluir&tipo=doc&id_doc=<?= $id; ?>" class="btn btn-danger ml-auto" >
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
