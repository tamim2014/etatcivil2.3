<?php
/******************
*
*author: Andjib
*date: 16/05/2018
*
******************/

	$BD_backend = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse = "";// Ce mot de passe est enregistré dans la table "roles" de la base "mysql" du backend Mysql. Pour le modifier (en ligne de commande) aller dans la base mysql(table roles): update roles set Password="" where Host="localhost"; Puis verifier en faisant select roles, Password, Host from roles;
    $BD_base = "etatcivil";
	$message='';
	
	//🟦Version1: ça marche
	//$conn = mysqli_connect($BD_backend,$BD_utilisateur,'',$BD_base) or die('Erreur de connection :'.mysqli_error());

	
	//🟦Version2: ça marche
	/*
	$conn = mysqli_connect($BD_backend, $BD_utilisateur, '', $BD_base);

	if (!$conn) {
		die("Erreur de connexion à la base de données.");
	}
	*/
	
	//🟦Version3: ça marche
	try{
		$conn = mysqli_connect($BD_backend, $BD_utilisateur, '', $BD_base);
	}
	catch (Exception $e) {
		echo '
		<!DOCTYPE html>
		<html lang="fr">
		<head>
			<meta charset="UTF-8">
			<title>Erreur de connexion</title>
			<style>
				body {
					background: #f2f2f2;
					font-family: Arial, sans-serif;
					margin: 0;
					padding: 0;
				}
				.box {
					width: 350px;
					margin: 100px auto;
					background: white;
					padding: 20px;
					border-radius: 10px;
					box-shadow: 0 0 10px rgba(0,0,0,0.1);
					text-align: center;
				}
				.box h2 {
					color: #c0392b;
				}
			</style>
		</head>
		<body>
			<div class="box">
				<h2>Erreur de connexion</h2>
				<p>Impossible d\'envoyer l\'email.</p>
				<p><b>Veuillez vérifier votre connexion internet<br> puis réessayer.</b></p>
			</div>
		</body>
		</html>
		';

		exit;
	}


	$conn->set_charset("utf8");
/*
$conn=mysql_connect('localhost','root', '') ;
mysql_select_db('etatcivil',$conn) or die('erreur de connexion à la base');
*/
	/*  comparer avec l'interface PDO
	try{$bdd = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', '');}
	catch(Exception $e){die('Erreur de connexion à la base de données: '.$e->getMessage());}
	*/
?>