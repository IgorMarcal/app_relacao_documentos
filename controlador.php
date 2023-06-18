<?php

    require "cadastro_usuarios.php";
    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : $tipo;

    
    if($acao == 'inserir' ) {
        $conexao = new Conexao();

        $cadastro = new CadastrarFunc($nome, $email, $senha, $tipo_user, $conexao);

        if($tipo == 'doc'){


           
            header('Location: tela_cadastro.php?cadastro=success');
            
        }

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo_user = $_POST['tipo_user'];



		$cadastro->inserir();
        header('Location: tela_cadastro.php?cadastro=success');
	
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
		$consulta = $cadastro->recuperar();

        foreach($consulta as $usuario){       
            if($usuario->email == $email && $usuario->senha == $senha){
                $nome_logado = $usuario->nome;
                $email_logado = $usuario->email;
                $senha_logado = $usuario->senha;
                $tipo_usuario_logado = $usuario->tipo_usuario;
                $usuario_autenticado = true;
                break;
            }
        }

        if ($usuario_autenticado) {	
            $_SESSION['nome_logado'] = $nome_logado;
            $_SESSION['email_logado'] = $email_logado;
            $_SESSION['email_logado'] = $email_logado;
            //$_SESSION['email_logado'] = $senha_logado;
            $_SESSION['tipo_usuario_logado'] = $tipo_usuario_logado;

            $_SESSION['autenticado'] = 'SIM';
            header('Location: home.php');
            
        }else{
            header('Location: index.php?login=incorreto');
            $_SESSION['autenticado'] = 'NAO';
        }
        
	
	}


?>