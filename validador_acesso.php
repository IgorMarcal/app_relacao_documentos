<?php 
  
  session_start();
  //verifica se o user esta autenticado
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: index.php?login=acessoNegado');
  }

?>  