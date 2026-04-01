<?php
/******************
*
*author: Andjib
*date: 16/05/2018
*
******************/

	$BD_serveur = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse = "";// Ce mot de passe est enregistré dans la table "user" de la base "mysql" du serveur Mysql. Pour le modifier (en ligne de commande) aller dans la base mysql(table user): update user set Password="" where Host="localhost"; Puis verifier en faisant select User, Password, Host from user;
    $BD_base = "etatcivil";
	$message='';
	
	$conn = mysqli_connect($BD_serveur,$BD_utilisateur,'',$BD_base)or die('Erreur de connection :'.mysqli_error());
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