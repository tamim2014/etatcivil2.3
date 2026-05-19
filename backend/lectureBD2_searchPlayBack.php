
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
    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; //acte
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];// ❌ Pas la peine ici car on traite seulement le numero
   
    // ✅ 2. On fait un select(from liste) par ce filtre 
    /** mysqli
    $requete = "SELECT * FROM liste WHERE acte=".$num ;  
	$result = mysqli_query($conn,$requete);
    */
	//pdo
	$sql = "SELECT * FROM liste WHERE acte = :num";
	$stmt = $conn->prepare($sql);
	$stmt->execute([  // Exécution avec paramètre sécurisé
		'num' => $num
	]);

    // ✅ 3. Récupération des données dans 🎁$donnees: Pour affichage du resultat dans une table 
	 $table='<table class="resultat_moteur" style="left:42.11%; top:18%;">';
	 $table.='<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Acte numero</th><th></th><th></th><th></th></tr>';

	 //while ($donnees = mysqli_fetch_array($result) )  
     while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) { 	 	 
       // $table.='<tr ><td>'.$donnees["ID"].'</td><td>'.$donnees["nom"].'</td><td>'.$donnees["prenom"].'</td><td>'.$donnees["acte"].'</td><td><a href="modifier_.php?n='.$donnees["ID"].' & nom_='.$donnees["nom"].' & prenom_='.$donnees["prenom"].' & acte_='.$donnees["acte"].'"><span class="desktopText1">Modifier</span><span class="mobilText1">✍️</span></a></td>     
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


	   <td><a href="imprimer.php?n='.$donnees["ID"].'"><span class="desktopText2">Imprimer</span><span class="mobilText2">🖨️</span></a></td>
	   <td><a id="lien" href="#" onclick="popup_lectureBD2();"><span class="desktopText3">Afficher</span><span class="mobilText3">👁</span></a></td></tr>';
	   // à utiliser dans include backend/pop.php (ligne4) donc dans  afficherdanspop.php
	   // puisqu'on a courcircuté afficherdanspop.php
	   // backend/pop.php et cette variables vont à  la poubelle
	   $_SESSION['identifiant']= $donnees['ID']; 
	} 
     $table.='</table>'; 
     echo $table;
	 //}
	 
	  //mysqli_close($conn);
	  $conn = null;
    
    //"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.
?>















