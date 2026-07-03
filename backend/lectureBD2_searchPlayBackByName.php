
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
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];//$nom = mysqli_real_escape_string($conn, $_GET['nom']);

    $restriction = false; // Flag(pour remplacer exit;): Si document existe ailleurs mais pas dans prefecture autorisée
         
	
	// ✅ 2. On fait un select(from liste) par ce filtre 
 
	//🟩 Restriction d'accès aux données: Un officier est restreint à sa préfecture d'affectation
	if ($_SESSION['user_role'] !== 'admin') {
		$prefUnique = $_SESSION['prefecture'];
		$sql = "SELECT * FROM liste WHERE nom = :nom AND prefecture = :prefUnique ";
		$stmt = $conn->prepare($sql);
		$stmt->execute([ 'nom' => $nom, 'prefUnique' => $prefUnique ]);
		// Message
		if($p !== $prefUnique){
			$restriction = true;
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
			//exit; 🧠❗ le flag $restriction gere sans bug
		}
	} else {
		$sql = "SELECT * FROM liste WHERE nom = :nom";
		$stmt = $conn->prepare($sql);
		$stmt->execute([ 'nom' => ltrim($nom) ]);
	}
	
    // ✅ 3. Récupération des données dans 🎁$donnees: Pour affichage du resultat dans une table 	 
	 $table='<table  class="resultat_moteur couleurPoliceTableResultat" style="left:42.11%; top:18%;">';
	 $table.='<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Acte numero</th><th></th><th></th><th></th></tr>';
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
	   // get in : backend/pop.php (ligne4), afficherdanspop.php
	   $_SESSION['identifiant']= $donnees['ID']; 
	 } 
     $table.='</table>'; 
	 ?>
	<script>
		const USER_ROLE = "<?= $_SESSION['user_role'] ?>";
		const USER_PSEUDO = "<?= $_SESSION['pseudo'] ?>";
	</script>
	<?php
		if (!$restriction) {
			echo $table;
		}
	    $conn = null;
    ?>















