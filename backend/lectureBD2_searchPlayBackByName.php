
<?php  
/*
 * Résultat de recherche(traitement/affichage): lectureBD2.php
 *
 * ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
 * ✅ 2. On fait un select(from liste) par ce filtre  
 * ✅ 3. Récupération des données dans 🎁$donnees: 
 *       Pour affichage du resultat dans une table
 * ✅ 4. Gestion des droits utilisateurs sur la fonction Rectifier
 */
    // ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
    // if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; acte ❌ pas la peine ici car on traite seulement ne nom
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);
    
	
	// ✅ 2. On fait un select(from liste) par ce filtre 
 
 //Pourquoi ne pas faire dans un seul fichier: $requete = "SELECT * FROM liste WHERE acte=".$num." OR  nom=$nom'";
	 /** Version1: mysqli ❌
      $requete = "SELECT * FROM liste WHERE   nom='".ltrim($nom)."'" ;	  	
	  $resultNom = mysqli_query($conn,$requete); 
	  */
	  
    /**Version2:pdo 
	$sql = "SELECT * FROM liste WHERE nom = :nom";
	$stmt = $conn->prepare($sql);
	$stmt->execute([  // Exécution avec paramètre sécurisé
		'nom' => ltrim($nom)
	]);
	*/
	
	//Version3(pdo): ✅ Restriction d'accès aux données: Un officier est restreint à sa préfecture d'affectation
	if ($_SESSION['user_role'] !== 'admin') {
		$prefUnique = $_SESSION['prefecture'];
		$sql = "SELECT * FROM liste WHERE nom = :nom AND prefecture = :prefUnique ";
		$stmt = $conn->prepare($sql);
		$stmt->execute([ 'nom' => $nom, 'prefUnique' => $prefUnique ]);
		// Message
		if($p !== $prefUnique){
			//echo "Aucun document trouvé dans la préfecture de: <b>".$prefUnique."</b>";
			echo'
				<button  class="boutoyahemnayivawo messageResultRestriction">
					<span>
					    Recherche limitée à la préfecture de:
					    <b id="prefectureUnique">'.$prefUnique.'</b> &#46;
				    </span><br><br>	
					<span> 
					    Aucun document relatif au nom "<b id="prefectureUnique">'.$nom.'</b>",<br> n&apos; y est trouvé !  
					</span>
				</button>   
			';
			exit;
		}
	} else {
		$sql = "SELECT * FROM liste WHERE nom = :nom";
		$stmt = $conn->prepare($sql);
		$stmt->execute([ 'nom' => ltrim($nom) ]);
	}
	
	
	
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
				<a href="#"
				   onclick="verifierDroitEtModifier(\'modifier_.php?n=' . $donnees['ID'] .
					   '&nom_=' . urlencode($donnees['nom']) .
					   '&prenom_=' . urlencode($donnees['prenom']) .
					   '&acte_=' . urlencode($donnees['acte']) .
				   '\'); return false;">
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
	 ?>
	<script>
		const USER_ROLE = "<?= $_SESSION['user_role'] ?>";
		const USER_PSEUDO = "<?= $_SESSION['pseudo'] ?>";
	</script>
	<?php
     echo $table;
 
	  //mysqli_close($conn);
	  $conn = null;
	  
      //"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.
?>















