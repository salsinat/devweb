<?php 
 session_start();
  
  if (isset($_SESSION['login'])) { $message = "Bienvenue {$_SESSION['login']}"; }
	else header('location: login.php');  
?>