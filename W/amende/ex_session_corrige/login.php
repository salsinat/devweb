<?php
  session_start();
  $identifiants['login']  = $identifiants['motDePasse'] = "";
  $message = "";
  $identifiants['login']        = isset($_POST['login'])?$_POST['login']:null;
  $identifiants['motDePasse']   = isset($_POST['motDePasse'])?$_POST['motDePasse']:null;

  function existeUtilisateur (array $identifiants) : bool {
      $ok     = false;
      $login  = $identifiants['login'];
      $mdp    = $identifiants['motDePasse'];     
/*
      require_once 'connexion.php';
      $db   = new Connexion();
      $req  = "SELECT nom, prenom, login
                FROM  user
                WHERE login = :login
                AND   mdp = :mdp";
      $res  = $db->execSQL($req, [':login'=>$login, ':mdp'=>$mdp]);
	  if (isset($res[0])) { $ok = true; }
*/	  
	  if ($login = 'bougdira' && $mdp = 'toto') { $ok = true; }
	  
      return $ok;
  }

  if (isset($_POST['Connexion'])){
    if (existeUtilisateur($identifiants)){
      $_SESSION['login'] = $identifiants['login'];
      //$message = "Identification OK : login". $identifiants['login'] .' mdp : '.$identifiants['motDePasse'] ;
      header('location: accueil.php');
    }
    else
      $message = "Identification incorrecte. Essayez de nouveau.";
  }
 require_once('./login.view.php')
 ?>


