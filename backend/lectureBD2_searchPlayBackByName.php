
<?php  
//Resulat(affiché sur lectureBD2.php) de la recherche effectuée sur la page d'accueil: Une table en une seule ligne et 7 colonnes(en haut à droite)
//"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.
    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; //acte
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);

     //$requete = "SELECT * FROM liste WHERE acte=".$num." OR  nom=$nom'";
	 
	 /* mysqli
      $requete = "SELECT * FROM liste WHERE   nom='".ltrim($nom)."'" ;	  	
	  $resultNom = mysqli_query($conn,$requete); 
	  */
	  
     //pdo
	$sql = "SELECT * FROM liste WHERE nom = :nom";
	$stmt = $conn->prepare($sql);
	$stmt->execute([  // Exécution avec paramètre sécurisé
		'nom' => ltrim($nom)
	]);
    	 

	 $table='<table  class="resultat_moteur couleurPoliceTableResultat" style="left:42.11%; top:18%;"  >';
	 $table.= '<tr ><th>ID</th><th>Nom </th><th> Prenom </th><th>Acte numero</th><th style="color:transparent;">Edit</th><th style="color:transparent;">Imprimer</th><th style="color:transparent;">Afficher</th></tr>';
	 //while ($donnees = mysqli_fetch_array($resultNom) ) 
     while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) { 	 	 
       $table.='<tr ><td>'.$donnees["ID"].'</td><td>'.$donnees["nom"].'</td><td>'.$donnees["prenom"].'</td><td>'.$donnees["acte"].'</td>  
		   <td> <a href=" modifier_.php?n='.$donnees["ID"].'  &  nom_='.$donnees["nom"].'   &  prenom_='.$donnees["prenom"].'   &   acte_='.$donnees["acte"].' ">Modifier</a> </td>  
		   <td> <a href="imprimer.php?n='.$donnees["ID"].'">Imprimer</a> </td> 
		   <td>
				<a href="afficher.php?n='.$donnees["ID"].'" onclick="return ouvrePop(this.href);">
					Afficher
				</a>
		   </td>
	   </tr>';
	   // à utiliser dans backend/pop.php (ligne4) donc dans  afficherdanspop.php
	   // puisqu'on a courcircuté afficherdanspop.php
	   // backend/pop.php et cette variables vont à  la poubelle
	   $_SESSION['identifiant']= $donnees['ID']; 
	 } 
     $table.='</table>'; 
     echo $table;
 
	  //mysqli_close($conn);
	  $conn = null;

?>















