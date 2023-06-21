<?php
    require_once "cadastro_documentos.php";
    require_once "validador_acesso.php";

    
    $conexao = new Conexao();

    $CadastrarDoc = new CadastrarDoc('', '', $conexao);
    // Verifica se o parâmetro 'id' está presente na URL
    if (isset($_GET['id'])) {
        $id_documento = $_GET['id'];
        
        // Recupera o documento pelo ID
        echo "<pre>";
        var_dump($documento = $CadastrarDoc->exibeDocumento($id_documento));
        echo "</pre>";
        $pdfResource = $documento->pdf;

        // Ler os dados do fluxo
        $pdfData = stream_get_contents($pdfResource);
        
        // Verifica se o documento foi encontrado
        if ($documento) {
            // Define o tipo de conteúdo como PDF
            header('Content-Type: application/pdf');
            header('Content-Length: ' . strlen($pdfData));
            header('Content-Disposition: inline; filename="documento.pdf"');

            
            // Exibe o documento PDF
            echo $pdfData;
            
            exit; // Termina a execução do script após exibir o documento
        }
    }

    // Se o documento não for encontrado ou o parâmetro 'id' estiver ausente, redireciona para a página de erro
    header('Location: erro.php');
    exit;
?>
