<?php
    require_once "cadastro_documentos.php";
    require_once "validador_acesso.php";

    
    $conexao = new Conexao();

    $CadastrarDoc = new CadastrarDoc('', '', $conexao);
    if (isset($_GET['id'])) {
        $id_documento = $_GET['id'];
        
        echo "<pre>";
        var_dump($documento = $CadastrarDoc->exibeDocumento($id_documento));
        echo "</pre>";
        $pdfResource = $documento->pdf;

        if ($documento) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="documento.pdf"');

            fpassthru($pdfResource);
            
            exit; 
        }
    }

    
    header('Location: erro.php');
    exit;
?>
