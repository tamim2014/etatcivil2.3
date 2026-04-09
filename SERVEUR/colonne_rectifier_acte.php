
<?php

session_start();// pour pouvoir recuperer $_SESSION["v"] càd la prefecture séléctionnée

//1.Connexion
//require_once  'connection_PDO.php';
	try{
		 $conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}	
	catch(Exception $e){
		die('Erreur de connexion à la base de données: '.$e->getMessage());
	} 

//2.Récupération des données de la base(par construction d'une variables php de stockage tampon) 


if(!isset($_SESSION["v"])){ 
  echo "<script>showDialog('Veuillez ouvrir la table avant de traiter ses données !');</script>";
  exit;
}else{
	$R="SELECT * FROM  liste WHERE prefecture='".$_SESSION["v"]."' ";
}
$R = $conn->query("SELECT * FROM  liste WHERE prefecture='".$_SESSION["v"]."' ");

//3.Affichage
$table='<table>'; 
$table.='<tr><th>Nom </th><th> Prenom </th><th> Numero </th><th> Prefecture </th><th>  </th></tr>';
while ($ligne2 = $R->fetch(PDO::FETCH_ASSOC)){
 $table.='<tr><td>'.$ligne2["nom"].'</td><td>'.$ligne2["prenom"].'</td><td>'.$ligne2["acte"].'</td><td>'.$ligne2["prefecture"].'</td> <td> <a href="modifier_.php? n='.$ligne2["ID"].' & nom_='.$ligne2["nom"].' & prenom_='.$ligne2["prenom"].' & acte_='.$ligne2["acte"].' ">Rectifier</a> </td></tr>';
}
$table.='</table>';
echo $table;
//mysqli_close($conn);
?>


