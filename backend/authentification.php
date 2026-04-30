<?php

session_start();

    require_once 'backend/connection_mysqli.php';
    
    // On recuper les login/passwd saisis	
    if(isset($_POST['pseudo_']))  $login = $_POST['pseudo_'];
    if(isset($_POST['motdepasse_']))  $mdp = $_POST['motdepasse_'];
	
	$message = 'Veuillez vous identifier dans les deux champs ci-dessus';
	
	// login/psswd sont-ils remplis ?
    if(empty($login) && isset($_POST["envoie"]) ) {$message = 'Veuillez indiquer votre nom svp !';}
    if(empty($mdp) && isset($_POST["envoie"]) ){$message = '  Veuillez aussi indiquer,  votre mot de passe SVP !';}

	// Alors on on les recupere dans la base(s'ils sont bons) pour faire les redirection
	if (!empty($login) && !empty($mdp)){
		$sql = "SELECT * 
				FROM listeofficiers 
				WHERE motdepasse = '". mysqli_real_escape_string($conn , $_POST['motdepasse_']) . "' 
				AND pseudo = '" . mysqli_real_escape_string($conn , $_POST['pseudo_']) . "'";
		$req = mysqli_query($conn ,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($conn));
		$row = mysqli_fetch_assoc($req);
		if (isset($row)){ $roles= $row["roles"]; }
		
		// ✅ 1.Login/Redirection vers usermanagement.php
		if ($row && $roles == "usermanagement") {
			header("Location: userManagement.php");
			exit;
		}
		
		/* 
		 * ✅ 2.Login/redirection vers  accueil.php
		 *
		 * Si le SELECT login/motdepasse saisis est réussi:
	     *  => On stocke le pseudo dans $_SESSION["pseudo"] pour le message d'alert
		 *  => On stocke le role dans $_SESSION["user_role"] pour les droits sur Supprimer/Modifier
		 * Et on redirige vers l'accueil
		 *
         */		 
		if (!$row) {
			$message = 'Veuillez saisir vos identifiants';
		} else {
			$_SESSION["pseudo"] = $row["pseudo"]; //🎁 pour les message d'avertissement
			$_SESSION["user_role"] = $row["roles"];//🎁 Gestion des droits(1.3 👉 colonne_rectifier.php, colonne_supprimer.php)  
			header("Location: accueil.php");
			exit;
		}
	}
?>


 