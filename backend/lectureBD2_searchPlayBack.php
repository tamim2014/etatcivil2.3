
<?php  
//Resulat(affiché sur lectureBD2.php) de la recherche effectuée sur la page d'accueil: Une table en une seule ligne et 7 colonnes(en haut à droite)
    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; //acte
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);
   
    /** mysqli
    $requete = "SELECT * FROM liste WHERE acte=".$num ;  
	$result = mysqli_query($conn,$requete);
    */
	//pdp
	$sql = "SELECT * FROM liste WHERE acte = :num";
	$stmt = $conn->prepare($sql);
	$stmt->execute([  // Exécution avec paramètre sécurisé
		'num' => $num
	]);

	 $table='<table  class="resultat_moteur" style="left:42.11%; top:18%;"  >';
	 $table.= '<tr ><th>ID</th><th>Nom </th><th> Prenom </th><th>Acte numero</th><th style="color:transparent;">Edit</th><th style="color:transparent;">Imprimer</th><th style="color:transparent;">Afficher</th></tr>';

	 //while ($donnees = mysqli_fetch_array($result) )  
     while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) { 	 	 
       $table.='<tr ><td>'.$donnees["ID"].'</td><td>'.$donnees["nom"].'</td><td>'.$donnees["prenom"].'</td><td>'.$donnees["acte"].'</td>  <td> <a href="modifier_.php?n='.$donnees["ID"].'  &  nom_='.$donnees["nom"].'   &  prenom_='.$donnees["prenom"].'   &   acte_='.$donnees["acte"].' ">Modifier</a> </td>  <td> <a href="imprimer.php?n='.$donnees["ID"].'">Imprimer</a> </td>     <td> <a id="lien"  href="#" onclick="popup_lectureBD2();">Afficher</a> </td></tr>';
	   // à utiliser dans include backend/pop.php (ligne4) donc dans  afficherdanspop.php
	   $_SESSION['identifiant']= $donnees['ID']; 
	} 
     $table.='</table>'; 
     echo $table;
	 //}
	 
	  //mysqli_close($conn);
	  $conn = null;

?>















