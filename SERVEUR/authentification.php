<?php
/*
	try{$conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', ''); }
	catch(Exception $e){die('Erreur de connexion à la base de données: '.$e->getMessage());}
	
	$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
	$donnees = $reponse->fetch();
	
*/
session_start();
    /*
    $BD_serveur = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse = "";
    $BD_base = "etatcivil";
	$message='';
	

	$conn = mysqli_connect($BD_serveur,$BD_utilisateur,'',$BD_base)or die('Erreur de connection :'.mysqli_error());
	$conn->set_charset("utf8");
	*/
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

		$row = mysqli_fetch_assoc($req);

		if (!$row) {
			$message = 'Connexion échouée, veuillez réessayer SVP !';
		} else {

			$_SESSION["pseudo"] = $row["pseudo"]; //🎁
			$_SESSION["user_role"] = $row["user"];//🎁 Gestion des droits(1.3 👉 colonne_rectifier.php, colonne_supprimer.php)  

			header("Location: accueil.php");
			exit;
		}
	}


?>