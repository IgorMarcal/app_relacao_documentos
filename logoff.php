<?php
	session_start();

	//remover a variavel de sessao
	//session_destroy()
	session_destroy();
	
	//forcar redirecionamento
    header('Location: index.php');

?>