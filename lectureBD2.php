
<?php 
  //session_start();  //backend/searcheEngin demarre une session
    include("backend/searchMessages.php"); // c'est une connection pdo ici  qui m'oblige à convertir 3 fichiers

   /** 
    *
	* ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
	* ✅ 2. Select(par le filtre)
	* ✅ 3. Récupération des données dans 🎁$donnees: 
	*       Juste pour affichage de la "prefecture" en haut de page
	*
	* ✅ 4. Appel de l'affichage(selon le filtre recuperé):
	*          lectureBD2_searchPlayBack.php ou 
	*          lectureBD2_searchPlayBackByName.php
	*/
	
	
    // ✅ 1. On recupere le filtre(saisie): Transmis par "backend/serchEngine.php"
    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; 
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom']; 
	
	// ✅ 2. Select(par le filtre)
	//require_once 'backend/connection_mysqli.php'; //⚠️ searchEngine connete déjà mais en pdo
	 
	/**  mysqli
	if(!empty($num) ){
	   $requete = "SELECT * FROM liste WHERE acte=".$num ;  
	   $resultat = mysqli_query($conn,$requete);
	}else if(!empty($nom) ){
	  $requete = "SELECT * FROM liste WHERE   nom='".ltrim($nom)."'" ;	  	 
	  $resultat = mysqli_query($conn,$requete); 
	}
	while ($donnees = mysqli_fetch_array($resultat) ) {  	 	 
		 $p = $donnees["prefecture"];
    }
	*/
	
	//pdo
	
	if (!empty($num)) {
		$requete = $conn->prepare("SELECT * FROM liste WHERE acte = :num");
		$requete->execute(['num' => $num]);
	}
	else if (!empty($nom)) {
		$requete = $conn->prepare("SELECT * FROM liste WHERE nom = :nom");
		$requete->execute(['nom' => ltrim($nom)]);
	}
	
	// ✅ 3. Récupération des données : Juste pour affichage de la "prefecture" en haut de page
	while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {
		$p = $donnees["prefecture"]; 
	}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
     <title>Resultat de ta recherche: acte de naissance trouv&eacute;</title>
     <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"   />
     <link href="css/slide.css"     rel="stylesheet"   />
	 <link href="css/dropdown.css"  rel="stylesheet"    />	 
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />
	 <link href="css/responsivelectureBD.css"  rel="stylesheet"/>
	 <!--
	    ⚠️Attention. form est le parent des colones, pas .contenu ⚠️  
	    ⚠️Par contre .contenu est le bon parent dans les pages d'accès en lecture( comme ici) ⚠️
	 -->
	 <script src="js/jquery.js"></script>
	 <script src="js/capture_items.js"></script> <!-- ça n'a rien à faire là ! -->
	 <script src="js/lectureBD.js"></script>
</head>

<body>
    <header>
		<div class="en-tete">	
			<div class="hollowTop"   >				   
			   <input type=image src="img/drapeau.png" align="left" class="flag" style="width:30%; height:100%; filter:brightness(80%);" />
			   <p class="text_header" style="padding-left:50%;">OFFICE   <br> D'&Eacute;TAT CIVIL </p>			  
			</div> 				
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
				<?php include("inc/accueil/accueil_menucentral.php"); ?> 
		</div>
    </header>
	
    <!-- on remplace float:left sur les contenu par display:flex sur le conteneur  -->
	<div class="contenu" style="display:flex; margin-bottom:0;"  >
		<!-- LE PANNEAU DE GAUCHE :  -->
		<div class="colonne_laterale"  >
			<aside class="aside1" >
			    <form action ="" method="POST" name="form1" >
					<table class="tablegauche" style="height:25em;"> 
						 <caption  style="caption-side:top; box-shadow: 0 20px 65px #cdbe9f inset;  "> 
							<font color="gray" style="line-height:2;">
								<h3> UNION DES COMORES  </h3>
								<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								<h4> MINISTERE DE L'INTERIEUR  </h4>
							</font>
							<img src="img/armoirie.png" style="z-index:3;  margin-left:40%; margin-right:40%; width:20%;  "  />
						 </caption>
							 <tr > <td id="recherchedocument">RECHERCHE DE DOCUMENT</td></tr>
							 <tr><td> <font color="#cdbe9f"><b>Search by</b></font> number<br/> <input style="width:50%;" id="recherchenum" type="text" name="acte_" pattern=".{1,}"  > </td></tr> 
							 <tr><td> <font color="#cdbe9f"><b>Search by</b></font> name    <br/> <input style="width:50%;" id="recherchenom" type="text" name="nom_"  > </td></tr>
							 <tr><td style="padding-top:1em;">
								 <textarea class="t_area" style="font-size:1em;" name="myTextBox" cols="24" rows="4"> <?php echo $message; ?> </textarea>
							 <br/><input class="btnHover" type="submit" name="envoie" value="Chercher"  style="background:transparent ; color:#111; padding:.3em 3.3em; margin:1em auto; " />
							 </td></tr>
					</table>
				</form>
			</aside>
		</div>
		<!-- LE PANNEAU DE DROITE :  -->
		<div class="colonne_contenu" style="padding:0;">
			<aside class="aside2">
				<table  class="tabledroite" style="padding-top:0;">
					 <tr><td > 
                         <div class="mnayvawo" style="height:auto;"><button  class="boutoyahemnayivawo"> Acte extrait de la pr&eacute;fecture de:<span id="wilaya_" style="color:#000066;  font-size: 17px; font-style: italic; font-family: \"Times New Roman\", Georgia, Serif;" > <?php  echo  $p; ?></span> </button>   </div>					 
						 <div class="line1" style="width:98%; height:5px; margin:auto;"></div>

						 <div class="mnayvawo mnayvawo2 scrolbar scrolbarSearch" style="height:auto; max-height:28.5em !important; padding:5.8em; overflow-y:auto;">
                            <?php 
							//✅ 4. Appel du traitement/affichage(selon le filtre recuperé): Une table
							if(!empty($_GET['num'])){include("backend/lectureBD2_searchPlayBack.php");}
							else if(!empty($_GET['nom'])) {include("backend/lectureBD2_searchPlayBackByName.php");}
							//"La connaissance s'acquiert par l'expérience, tout le reste n'est que de l'information" .Albert Einstein.

							/****************** Rappel sur les sessions *********************************
								  //$_SESSION['identifiant']="";// Pour vider la variable	 
								  // unset($_SESSION['identifiant']); //detruit la variable session 
								 //$_SESSION = array();// Détruit toutes les variables de session
								 //session_destroy();// Finalement, on détruit la session.
							****************************************************************************/
							?>						 
                         </div> 						 
						 
					 </td></tr>
				</table>
            </aside>
        </div>	
		
	</div> <!-- fin  <div class="contenu"  >  -->
	
    <div class="footer" style="text-align:left; ">
        <span ><span style="color:#555;">2026 &copy; -</span> <span style="color:#333;">Etat civil</span></span>
    </div>
    <!-- <div class="mnayvawo">  <button  class="boutoyahemnayivawo"> Actes extraits de la pr&eacute;fecture de:<span id="wilaya_" style="color:#000066;  font-size: 17px; font-style: italic; font-family: \"Times New Roman\", Georgia, Serif;" > <?php  echo  $s; ?></span> </button>   </div>  -->
<body>
</html>



     
