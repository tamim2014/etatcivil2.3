<?php

session_start();

  require_once 'SERVEUR/connection_mysqli.php';
    	
  if(isset($_POST['pseudo_']))  $login = $_POST['pseudo_'];
  if(isset($_POST['motdepasse_']))  $mdp = $_POST['motdepasse_'];
	
	$message = 'Veuillez vous identifier dans les deux champs ci-dessus';
	
	// Le login est-il rempli ?
    if(empty($login) && isset($_POST["envoie"]) ) {$message = 'Veuillez indiquer votre nom svp !';}
   // Le mot de passe est-il rempli ?
    if(empty($mdp) && isset($_POST["envoie"]) ){$message = '  Veuillez aussi indiquer,  votre mot de passe SVP !';}
	
	if (!empty($login) && !empty($mdp)){

		$sql = "SELECT * 
				FROM listeofficiers 
				WHERE motdepasse = '". mysqli_real_escape_string($conn , $_POST['motdepasse_']) . "' 
				AND pseudo = '" . mysqli_real_escape_string($conn , $_POST['pseudo_']) . "'";

		$req = mysqli_query($conn ,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($conn));
        // User management
		if ($login == "usermanagement" && $mdp == "8888") {
			header("Location: userManagement.php");
			exit;
		}

		
		
        // Utilisateurs officiers d'état civil
		$row = mysqli_fetch_assoc($req);

		if (!$row) {
			$message = 'Veuillez saisir vos identifiants';
		} else {

			$_SESSION["pseudo"] = $row["pseudo"]; //🎁
			$_SESSION["user_role"] = $row["roles"];//🎁 Gestion des droits(1.3 👉 colonne_rectifier.php, colonne_supprimer.php)  

			header("Location: accueil.php");
			exit;
		}
	}


?>