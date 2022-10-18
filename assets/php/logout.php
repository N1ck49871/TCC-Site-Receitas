<?php
 /**
  * Arquivo para destruir uma sessão assim que o usuario sair do sistema
  */
	session_start();
	 
	$_SESSION['logged_in'] = false;
	 
	session_destroy();
	 
	header('Location: ../../index.php');

?>