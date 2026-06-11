<?php
session_start();

// Empêcher l’accès direct par URL
include("backend/url_access_guard.php");

// Empêcher l'accès aux officiers non "admin"
if ($_SESSION["user_role"] !== "admin") {
    exit("Accès refusé.");
}


//1.Construction des variables php, pour recuperer les données transmises par la page "lectureBD.php"
$id = $_GET["n"] ?? null;

if ($id === null) {
    echo "<h3 style='color:red'>Erreur : aucun ID fourni.</h3>";
    exit;
}


$nom_    = $_GET["nom_"]   ?? null;
$prenom_ = $_GET["prenom_"]?? null;
$acte_   = $_GET["acte_"]  ?? null;


$rappel = '<b style="text-align:center"><i> <u>Document &agrave; rectifier</u></i> </b>  <br><br> <i><b>Nom :</b></i> '.$nom_.' <br> <i><b>Pr&eacute;nom :</b></i> '.$prenom_.' <br> <i><b>Acte num&eacute;ro:</b></i> '.$acte_.'';

 // echo '<div class="rappel">'.$rappel.'</div>' ;


//2.Requete SQL requete

	require_once 'backend/connection_PDO.php';
	/*
	$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
	$donnees = $reponse->fetch();
	*/
	
	$stmt = $conn->prepare("SELECT * FROM liste WHERE ID = :id");
	$stmt->execute(['id' => $id]);
	$donnees = $stmt->fetch();


	
    // Je l'ai mis en bas du <html>
	//include("backend/modifier_insertionSQL.php"); => page blanche

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes"> 
	 <title>Rectifications</title>
	 <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"/>		
	 <link href="css/slide.css"     rel="stylesheet"/> 
	 <link href="css/dropdown.css"  rel="stylesheet"/>
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style"/>  <!-- pour les bouton du panneau central -->
	 <link href="css/ecritureBD.css" rel="stylesheet" title="Style"/>
	 <link href="css/ecritureBDmenudroite.css" rel="stylesheet" title="Style" />  <!--  Enleve les debordement❌ Maislaisser l'ancien style des btn dans cette page -->
	 <link href="css/responsiveTopnav.css" rel="stylesheet" title="Style" />
	 <link href="css/responsivecritureBD.css" rel="stylesheet" title="Style" />
	 <style>
		 /* 🧩 Task:Nettoyage css.Virer tous les résidus ccs qui trainent dans ecritureBD.css ( à mettre dans ecritureBD.css) */
		
        /* specifique à cette page : Le gris-beige fatigue les yeux à la saisie */
        body, .tabledroite{
			background:#ECECEA;
		}		
	 </style>	  
	 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	 <script type="text/javascript">
	 //affiche l'acte modifié dans la partie droite de la page modifie_.php( OK mais ça sert à rien i fo ouvirere tout ça)
		$(function(){
			$(' a #acteAJAX').click(function(e){
				$('.showacte').load($(this).attr('href'));
				e.preventDefault();
			});
			//$('.tab a:first').trigger('click'); // Affiche la page1 par défaut
		});
	 </script>
	 <script src="js/ecritureBD.js" defer></script>
	 <script src="js/logout.js" defer></script>
</head>

<body>
	<?php
	// Affichage flash de confirmation (definie dans backend/modifier_insertionSQL.php)
	
		if (!empty($_SESSION['flash_ready']) && !empty($_SESSION['message'])) {
			echo '<div class="flash-success">'.$_SESSION['message'].'<span class="flash-close">&times;</span></div>';
			unset($_SESSION['message']);
			unset($_SESSION['flash_ready']);
		}
	?>
	<header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type="image" src="img/drapeau.png" align="left" class="flag" />
			   <p class="text_header">OFFICE   <br> D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			<?php include("inc/accueil/accueil_menucentral_ecriture.php"); ?> 
		</div>
    </header>
	<div class="contenu">
		<form action ="backend/modifier_insertionSQL.php" method="post" name="form1" >
		  <!-- LE PANNEAU DE GAUCHE :  -->
		  	<div class="colonne_laterale" style="width: 33%; ">
			    <aside class="aside1">
					<table class="tablegauche"  name="listes" style="height:30em; padding:1em inherit; " >
						<caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;    "> 
							<font color="gray" style="line-height:2;">
								<h3> UNION DES COMORES  </h3>
								<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								<h4> MINISTERE DE L'INTERIEUR  </h4>
							</font>
							<!-- <img src="img/armoirie.png"  style="z-index:3;  transform: translate(210%, 0);" /> -->
							<img src="img/armoirie.png"  style="z-index:3;   margin-left:40%; margin-right:40%; width:20%;"/>
						</caption>
						<input type="hidden" name="suprim" value=" <?php echo $id;?> " /> 
						<tr>
						    <td><br> Pr&eacute;fecture: </td> 
							<td><br> 
                                <select  name="prefecture" onChange="changement(this)"  >
									 <optgroup label="Ngazidja"> 
									 <option value="<?php echo $donnees["prefecture"];?>"   >  <?php echo $donnees["prefecture"];?> </option>
									 <option>Moroni-Bambao </option>
									 <option>Hambou </option> 
									 <option>Mbadjini-Ouest </option>
									 <option>Mbadjini-Est </option>
									 <option>Oichili-Dimani </option>  
									 <option>Hamahamet-Mboinkou </option>  
									 <option>Mitsamiouli-Mboude </option> 
									 <option>Itsandra-Hamanvou </option>
									 </optgroup>
									 <optgroup label="Moheli">      
									 <option>Fomboni </option>
									 <option>Nioumachoi </option> 
									 <option>Djando </option>
									 </optgroup>
									 <optgroup label="Anjouan"  >           
									 <option>Mutsamudu </option>
									 <option>Ouani </option> 
									 <option>Domoni </option>
									 <option>Mremani </option>
									 <option>Sima </option> 
									 <optgroup label="Mayotte"  disabled>           
									 <option>Dzaoudzi </option>
									 <option>Pamandzi </option> 
									 <option>Mtsapere </option>
									 <option>Mtsamboro </option>
									 <option>Mamoudzou </option>  
									 </optgroup>		 
									 </optgroup>
								</select>
						    </td>
						</tr>
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Centre d'Etat Civil:</b></font></td>
						</tr>
						<tr>
							<td>Centre</td> 
							<td> 
								<select  name="centretatcivil" required >
									<option value="<?php echo $donnees["centretatcivil"];?>"> <?php echo $donnees["centretatcivil"];?> </option>
								</select>
							</td>
						</tr>
						<tr>
						    <td> Registre</td> 
							<td><input type="text" name="registre"  value="<?php echo $donnees["registre"];?>" > </td>
						</tr>
						<tr>
						    <td> Acte</td> 
							<td> <input type="text" name="acte"  value="<?php echo $donnees["acte"];?>" required></td>
						</tr>
						<tr>
						    <td> Du(date) </td> 
							<td> <input type="date" name="date_acte" value="<?php echo $donnees["date_acte"];?>" ></td>
						</tr>
						<tr>
						    <td></td> 
							<td></td>
						</tr>
						 
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Naissance de:</b></font></td>
						</tr>
						<tr>
						    <td> Nom </td> 
							<td> <input type="text" name="nom" value="<?php echo $donnees["nom"];?>" > </td>
						</tr>
						<tr>
						    <td> Pr&eacute;nom  </td> 
							<td> <input type="text" name="prenom" value="<?php echo $donnees["prenom"];?>" ></td>
						</tr>
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Pour acte certifi&eacute; <span class="conforme">conforme</span></b></font></td>
					    </tr>
						<tr>
						    <td> D&eacute;livr&eacute; &agrave; </td>
							<td> <input type="text" name="delivre_a" value="<?php echo $donnees["delivre_a"];?>" required ></td>
						</tr>
						<tr>
						    <td> Le </td>
							<td> <input type="text" name="delivre_le" value="<?php echo $donnees["delivre_le"];?>"  required ></td>
						</tr>
						<tr>
						    <td> L'an </td> 
							<td> <input type="text" name="delivre_an"  value="<?php echo $donnees["delivre_an"];?>" required > </td>
						</tr>
						<tr>
						    <td> Série Num: <br><br></td>
							<td> <input type="text" name="num_serie" value="<?php echo $donnees["num_serie"];?>" required ><br><br></td>
						</tr>
					</table>
				</aside>
			</div><!-- div.colonne_laterale  -->
					 
		    <!-- LE PANNEAU DE CENTRAL : -->
		    <div class="colonne_contenu" style="padding:0; width: 40%;">
			    <aside class="aside2">
                   	<table  class="tabledroite" style="height:43em;" >
						 <p class="showacte"> <!-- Pour afficher l'acte modifié dans la partie droite de la page modifie_.php  -->
							 <tr> <td> <input type="text" name="naissance_jour_moi"  value="<?php echo $donnees["naissance_jour_moi"];?>" placeholder=" Le" > </td>
							 <td> <input type="text" name="naissance_an"  value="<?php echo $donnees["naissance_an"];?>" placeholder=" ici l'an"> </td></tr>
							 <tr> <td> <input type="text" name="naissance_heure"  value="<?php echo $donnees["naissance_heure"];?>" placeholder=" heure" > </td>
							 <td> <input type="text" name="naissance_minuite" value="<?php echo $donnees["naissance_minuite"];?>" placeholder=" minuite" > </td></tr>
							
							 <tr> 
							      <td> <input type="text" name="naissance_nom_prenom"  value="<?php echo $donnees["naissance_nom_prenom"];?>" placeholder="est n&eacute;(e)"></td>
							      <td> <input type="text" name="naissance_lieu"  value="<?php echo $donnees["naissance_lieu"];?>" placeholder=" &agrave;(lieu)"></td>
							 </tr>
							 <tr> <td> <input type="text" name="naissance_sexe" value="<?php echo $donnees["naissance_sexe"];?>" placeholder=" du sexe"  > </td></tr>
							 
							 <tr> 
							     <td> <font color="##1D702D"><b>Le p&egrave;re</b></font></td> 
							     <td> <font color="##1D702D"><b>La m&egrave;re</b></font></td>
							 </tr>
								 
							 </tr>
							 <tr> 
							     <td> <input type="text" name="pere_nom_prenom" value="<?php echo $donnees["pere_nom_prenom"];?>" placeholder=" fils(fille) de"> </td>
							     <td> <input type="text" name="mere_nom_prenom" value="<?php echo $donnees["mere_nom_prenom"];?>"  placeholder=" et de"> </td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="pere_datenaisance"  value="<?php echo $donnees["pere_datenaisance"];?>" placeholder=" n&eacute; le"> </td>
							     <td> <input type="text" name="mere_datenaisance"  value="<?php echo $donnees["mere_datenaisance"];?>"  placeholder="n&eacute;e le"> </td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="pere_lieunaissance" value="<?php echo $donnees["pere_lieunaissance"];?>" placeholder=" n&eacute; &agrave;"> </td>
							     <td> <input type="text" name="mere_lieunaissance" value="<?php echo $donnees["mere_lieunaissance"];?>"   placeholder=" &agrave;"> </td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="pere_profession" value="<?php echo $donnees["pere_profession"] ;?>" placeholder="profession"> </td>
							     <td> <input type="text" name="mere_profession" value="<?php echo $donnees["mere_profession"] ;?>" placeholder=" profession"></td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="pere_villederesidence" value="<?php echo $donnees["pere_villederesidence"] ;?>" placeholder="demeurant &agrave;"> </td>
							     <td> <input type="text" name="mere_villederesidenc"  value="<?php echo $donnees["mere_villederesidenc"] ;?>" placeholder=" demeurant &agrave;"> </td>
							 </tr>
							
					
							 
							 <tr><td> <font color="##1D702D"><b>La d&eacute;claration</b></font></td> <td> </td></tr>
							 
							 <tr> 
							     <td> <input type="text" name="declaration_faite_par"   value="<?php echo $donnees["declaration_faite_par"];?>" placeholder=" faite par:"> </td>
								 <td ><input class="jugement" type="text"  placeholder="Emetteur jugement"></td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="declaration_recue_pa"  value="<?php echo $donnees["declaration_recue_pa"];?>" placeholder=" re&ccedil;ue par"> </td>
								 <td ><input class="jugement" type="text"  placeholder="Titre  recepteur"></td>
							 </tr>
							 <tr> 
							     <td> <input type="text" name="datejugement"   value="<?php echo $donnees["datejugement"];?>" placeholder=" date jugement :"> </td>
								 <td ><input class="jugement" type="text"  placeholder="Date jugement"></td>
							 </tr>
						 </p>
						 <tr> 
							 <td>
				                <input type="submit" class="btnOutput" onclick="actenumero();" id="enregistrer" name="Enregistrer" value="Enregistrer l'acte"/>
							 </td>
							 <td>
							    <a href="imprimer.php?n=<?php echo $donnees["ID"];?> ">
								    <input type="button"  value="Imprimer l'acte" align="center" class="btnOutput" />
								</a>
							 </td>
						 </tr>
					</table>

			    </aside>

			</div>

		    <!-- LE PANNEAU DE DROITE :  -->
		    <div class="colonne_laterale"  style="width: 25%; ">
				<aside class="aside1" >
						<table  class="tablemenu" style="min-height:41.835em;" > 
							<tr><td> 
								  <?php include("inc/ecriture/ecritureBD_edit_menudroite1.php"); ?>
							</td></tr>     
						</table>
					     <?php  echo '<div class="rappel">'.$rappel.'</div>' ;   ?>
				</aside>
			</div>
		</form>
	</div><!-- div.contenu -->
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
	
	<!-- Alert logout -->
	<div id="popupLogout" class="popup-overlay">
		<div class="popup-box">
			<h2>Demande de confirmation</h2>

			<p><b>Vous êtes sur le point de quitter votre espace.</b></p>
			<p>Pour y accéder de nouveau, vous devrez vous authentifier.</p>
			<p>Êtes-vous sûr de vouloir continuer ?</p>

			<div class="popup-buttons">
				<button class="btn-cancel" onclick="fermerPopupLogout()">Annuler</button>
				<button class="btn-confirm" onclick="confirmerLogout()">Me déconnecter</button>
			</div>
		</div>
	</div>
	
	
	
	<script>		
		document.getElementByClassName("rediriger").addEventListener("click", function() {
			 document.location.replace("accueil.php");
		});
	</script>
</body>
</html>
