<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Relação de Documentos</title>
    <!-- Incluir os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Relação de Documentos</h1>
        <a href="home.php">Voltar</a>
        <h2 class="mt-4">Documentos Disponíveis:</h2>
        <ul class="list-group mt-3">
            <?php
            require_once "cadastro_documentos.php";
            require_once "validador_acesso.php";

            
            $conexao = new Conexao();

            $CadastrarDoc = new CadastrarDoc('', '', $conexao);
            $id_usuario = $_SESSION['id_usuario'];
            $consulta = $CadastrarDoc->recuperarDocumentos($id_usuario);

            foreach ($consulta as $documento) {
                $id = $documento->id;
                $nome = $documento->nome_documento;
            ?>
                <li class="list-group-item d-flex">
                    <a href="exibir_documento.php?id=<?= $id; ?>" target="_blank"><?php echo $nome; ?></a>
                </li>
                    
            <?php
            }
            ?>
            
        </ul>
    </div>

    <!-- Incluir os arquivos JavaScript do Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
