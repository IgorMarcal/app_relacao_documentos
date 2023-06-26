<?php

    require_once "cadastro_usuarios.php";
    require_once "cadastro_documentos.php";

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : $tipo;


    
    if($acao == 'inserir' ) {
 
        $conexao = new Conexao();

        if ($tipo == 'doc') {
            $nome_arquivo = $_POST['nome_documento'];
            $arquivo = $_FILES['pdf']['tmp_name'];
            echo $nome_func = $_POST['nome_funcionario'];
            $dados_arquivo = file_get_contents($arquivo);
            $cadastro = new CadastrarFunc('', '', '', '', $conexao);
            $id = $cadastro->recuperar($nome_func);

            $cadastroDoc = new CadastrarDoc('', '', $conexao);
            $cadastroDoc->inserir($nome_arquivo, $dados_arquivo, $id);
            header('Location: tela_cadastro_documento.php?cadastro=success');
        } else if($tipo == 'usu'){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $tipo_user = $_POST['tipo_user'];
            $tela = isset($_GET['tela']) ? $_GET['tela'] : $tela;


            $cadastro = new CadastrarFunc($nome, $email, $senha, $tipo_user, $conexao);
            $cadastro->inserir();
            if($tela === 'index'){
                header('Location: tela_cadastro_funcionario_index.php?cadastro=success');
            }else{
                header('Location: tela_cadastro_funcionario.php?cadastro=success');

            }
        }
        
	
	}else if($acao == 'recuperar' ) {
        $nome = '';
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo_usuario = '';

        $conexao = new Conexao();

        $cadastro = new CadastrarFunc($nome, $email, $senha, $tipo_usuario, $conexao);
		$consulta = $cadastro->recuperar('');

        foreach($consulta as $usuario){       
            if($usuario->email == $email && $usuario->senha == $senha){
                $nome_logado = $usuario->nome;
                $email_logado = $usuario->email;
                $senha_logado = $usuario->senha;
                $id_usuario = $usuario->id;
                $tipo_usuario_logado = $usuario->tipo_usuario;
                $usuario_autenticado = true;
                break;
            }
        }

        if ($usuario_autenticado) {	
            $_SESSION['nome_logado'] = $nome_logado;
            $_SESSION['email_logado'] = $email_logado;
            $_SESSION['senha_logado'] = $senha_logado;
            $_SESSION['id_usuario'] = $id_usuario;


            $_SESSION['tipo_usuario_logado'] = $tipo_usuario_logado;

            $_SESSION['autenticado'] = 'SIM';
            header('Location: home.php');
            
        }else{
            header('Location: index.php?login=incorreto');
            $_SESSION['autenticado'] = 'NAO';
        }
        
	
	}else if($acao == 'excluir'){

        if($tipo=='doc'){

            $id_doc = $_GET['id_doc'];
            $conexao = new Conexao();
            $cadastroDoc = new CadastrarDoc('', '', $conexao);
            $cadastroDoc->excluir($id_doc);

            header('Location: remove_documento.php?exclusao=1');
            
        }else if($tipo=='func'){

            $id = $_GET['id'];
            $conexao = new Conexao();
            $remove = new CadastrarFunc('', '','','', $conexao);
            $consulta = new CadastrarFunc('', '','','', $conexao);
            $id_logado = $_SESSION['id_usuario'];
        

            if($id == $id_logado){   
                header('Location: remove_funcionario.php?exclusao=0');
            }else{
                $remove->excluir($id);
                header('Location: remove_funcionario.php?exclusao=1');
            }
            

            
            
        }
        
    }else if($acao == 'atualizar'){

        $email = $_POST['email'];
        $senhaAtual = $_POST['senha_atual'];
        $senhaNova = $_POST['senha_nova'];
        $senhaNovaConfirma = $_POST['senha_nova_confirma'];


        if ($senhaNova !== $senhaNovaConfirma) {
            header('Location: alterar_senha.php?senha_nova=incorreto');
            exit;
        }


        $conexao = new Conexao();
        $cadastroFuncionarios = new CadastrarFunc('', '', '', '', $conexao);


        $consulta = $cadastroFuncionarios->recuperarPorEmail($email);
        $senhaAtualBanco = $consulta->senha;


        if ($senhaAtual === $senhaAtualBanco) {
            $cadastroFuncionarios->updateSenha($email, $senhaNova);
            $tela = isset($_GET['tela']) ? $_GET['tela'] : $tela;

            if($tela === 'index'){  
                header('Location: alterar_senha_index.php?status=atualizado');
            }else{
                header('Location: alterar_senha.php?status=atualizado');
            }
            exit;
        } else {
            if($tela === 'index'){
                header('Location: alterar_senha_index.php?senha_atual=incorreto');
            }else{
                header('Location: alterar_senha.php?senha_atual=incorreto');
            }
            
            exit;
        }
    }


?>