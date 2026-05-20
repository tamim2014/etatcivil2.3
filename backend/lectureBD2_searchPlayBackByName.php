
<?php  
/*
 * Résultat de recherche(traitement/affichage): lectureBD2.php
 *
 * ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
 * ✅ 2. On fait un select(from liste) par ce filtre  
 * ✅ 3. Récupération des données dans 🎁$donnees: 
 *       Pour affichage du resultat dans une table
 *
 */
    // ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
    // if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; acte ❌ pas la peine ici car on traite seulement ne nom
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);
    
	
	// ✅ 2. On fait un select(from liste) par ce filtre 
    //Pourquoi ne pas faire dans un seul fichier: $requete = "SELECT * FROM liste WHERE acte=".$num." OR  nom=$nom'";
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
	
    // ✅ 3. Récupération des données dans 🎁$donnees: Pour affichage du resultat dans une table 	 
	 $table='<table  class="resultat_moteur couleurPoliceTableResultat" style="left:42.11%; top:18%;">';
	 $table.='<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Acte numero</th><th></th><th></th><th></th></tr>';
	 //while ($donnees = mysqli_fetch_array($resultNom) ) 
     while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) { 	 	 
		$table .= '<tr>
			<td>'.$donnees["ID"].'</td>
			<td>'.$donnees["nom"].'</td>
			<td>'.$donnees["prenom"].'</td>
			<td>'.$donnees["acte"].'</td>

			<td>
				<a href="modifier_.php?n='.$donnees["ID"].
				   '&nom_='.urlencode($donnees["nom"]).
				   '&prenom_='.urlencode($donnees["prenom"]).
				   '&acte_='.urlencode($donnees["acte"]).'">
					<span class="desktopText1">Modifier</span>
					<span class="mobilText1">✍️</span>
				</a>
			</td>

			<td>
				<a href="imprimer.php?n='.$donnees["ID"].'">
					<span class="desktopText2">Imprimer</span>
					<span class="mobilText2">🖨️</span>
				</a>
			</td>

			<td>
				<a href="afficher.php?n='.$donnees["ID"].'" onclick="return ouvrePop(this.href);">
					<span class="desktopText3">Afficher</span>
					<span class="mobilText3">👁</span>
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
	  
      //"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.
?>















