<?php

    require_once "cadastro_usuarios.php";
    require_once "cadastro_documentos.php";

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : $tipo;
    $tela = isset($_GET['tela']) ? $_GET['tela'] : $tela;


    
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

            $cadastro = new CadastrarFunc($nome, $email, $senha, $tipo_user, $conexao);
            $cadastro->inserir();
            if($tela=='index'){
            header('Location: tela_cadastro_funcionario_index.php?cadastro=success');

            }
            header('Location: tela_cadastro_funcionario.php?cadastro=success');
        }
        
	
	}else if($acao == 'recuperar' ) {
        $nome = '';
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo_usuario = '';

        //echo $nome ;
        echo $email  ;
        echo $senha  ;
        //echo $tipo_user;

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
           ( $_SESSION['id_usuario'] = $id_usuario);


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
            $remove->excluir($id);

            header('Location: remove_funcionario.php?exclusao=1');
            
        }
        
    }else if($acao == 'atualizar'){
        // Obtém os dados do formulário
        $email = $_POST['email'];
        $senhaAtual = $_POST['senha_atual'];
        $senhaNova = $_POST['senha_nova'];
        $senhaNovaConfirma = $_POST['senha_nova_confirma'];

        // Verifica se as senhas nova e de confirmação correspondem
        if ($senhaNova !== $senhaNovaConfirma) {
            header('Location: alterar_senha.php?senha_nova=incorreto');
            exit;
        }

        // Cria uma instância do objeto de cadastro de funcionários
        $conexao = new Conexao();
        $cadastroFuncionarios = new CadastrarFunc('', '', '', '', $conexao);

        // Recupera a senha atual do funcionário com base no email
        $consulta = $cadastroFuncionarios->recuperarPorEmail($email);
        $senhaAtualBanco = $consulta->senha;

        // Verifica se a senha atual fornecida corresponde à senha do banco de dados
        if ($senhaAtual === $senhaAtualBanco) {
            // Atualiza a senha no banco de dados
            $cadastroFuncionarios->updateSenha($email, $senhaNova);

            header('Location: alterar_senha.php?status=atualizado');
            exit;
        } else {
            header('Location: alterar_senha.php?senha_atual=incorreto');
            exit;
        }
    }


?>