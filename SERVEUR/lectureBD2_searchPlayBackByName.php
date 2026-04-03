
<?php  
//Resulat(affiché sur lectureBD2.php) de la recherche effectuée sur la page d'accueil: Une table en une seule ligne et 7 colonnes(en haut à droite)
//"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.
    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; //acte
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);

	/**
	 *
	 *  Pas besoin de reconnection dans un fichier include si la page source est connectée
	 *
	 *  require_once teste la connection, si elle est là, elle connecte pas inutilement
     *  require_once 'SERVEUR/connection_mysqli.php';
	 *
	 */
   
//1. Requête (SQL): On récupère tout le contenu de la table liste)   
      //$requete = "SELECT * FROM liste WHERE acte=".$num." OR  nom=$nom'";
      $requete = "SELECT * FROM liste WHERE   nom='".ltrim($nom)."'" ;	  	
	  $result = mysqli_query($conn,$requete);    
//2. Stockage dans une variable(PHP): $donnees = $reponse->fetch(); 
     
//3.Affichage 
     //if($result){

	 $table='<table  class="resultat_moteur couleurPoliceTableResultat" style="left:42.11%; top:18%;"  >';
	 $table.= '<tr ><th>ID</th><th>Nom </th><th> Prenom </th><th>Acte numero</th><th style="color:transparent;">Edit</th><th style="color:transparent;">Imprimer</th><th style="color:transparent;">Afficher</th></tr>';
	 while ($donnees = mysqli_fetch_array($result) )  	 	 
	 { 
        /***
           showActe('.$donnees["ID"].') n'arrive pas à afficher->( affichage dans 1 PANEL)
           Je vais donc le remplacer par popup_lectureBD2() -> ( affichage dans 1 POPUP)  
        */
       $table.='<tr ><td>'.$donnees["ID"].'</td><td>'.$donnees["nom"].'</td><td>'.$donnees["prenom"].'</td><td>'.$donnees["acte"].'</td>  <td> <a href=" modifier_.php? n='.$donnees["ID"].'  &  nom_='.$donnees["nom"].'   &  prenom_='.$donnees["prenom"].'   &   acte_='.$donnees["acte"].' ">Modifier</a> </td>  <td> <a href="imprimer.php?n='.$donnees["ID"].'">Imprimer</a> </td> <td> <a id="lien"  href="#" onclick="popup_lectureBD2();">Afficher</a> </td></tr>';
	   $_SESSION['identifiant']= $donnees['ID']; // Où est-ce qu'on utilise cette variable session?
	 } 
     $table.='</table>'; 
     echo $table;
	 //}
	 
	  mysqli_close($conn);
	 
   
	 
	 /***************************************************************************************************
require_once  'connection_PDO.php';
   
//1. Requête (SQL): On récupère tout le contenu de la table liste)
     $reponse = $conn->query("SELECT * FROM liste WHERE acte=".$num." OR  nom='". ltrim($nom)."'"  );
    
	 //2. Stockage dans une variable(PHP): de stockage des donnees recuperees à la ligne38
     /* $donnees = $reponse->fetch(); //$donnee=mysql_fetch_array($reponse): On presente chaque entrée une à une
     	 $table='<table  class="resultat_moteur"  >';
	 $table.= '<tr ><th>ID</th><th>Nom </th><th> Prenom </th><th>Acte numero</th><th>Edit</th><th>Imprimer</th><th>Afficher</th></tr>';
	 while ($donnees = $reponse->fetch() ) 	 
	 
	 ________________________________
	 //1.Connexion
require_once  'connection_mysql.php';
//2.Récupération des données de la base(par construction d'une variables php de stockage tampon)  
$R=mysql_query("SELECT * FROM  liste WHERE prefecture='".$p."' ") or exit(mysql_error( ));
//3.Affichage
//3.1 On construit un tableau de présentation des données
$table='<table >'; 
$table.='<tr ><th>Nom </th><th> Prenom </th><th> Numero </th><th> Prefecture </th><th>  </th> <tr>';
while($ligne=mysql_fetch_array($R))
	 nom='".$nom."'
	 Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[42000]: 
			Syntax error or access violation: 1064
			You have an error in your SQL syntax; 
			check the manual that corresponds to your MySQL server version 
			for the right syntax to use near '' at line 1' in lectureBD2_searchPlayBack.php:11 
	 ***********************************************************************************************
	 nom=".$nom."
	 near '\'Ali\' OR acte='    at line 1
	 
	 ****************************************************************************************
	 nom="'.$nom.'"
	 
	 near '' at line 1
	 ________________________
	 
	   near 'Ali' '
	 ***/

?>















