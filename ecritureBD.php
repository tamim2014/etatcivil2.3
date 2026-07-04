<?php 
   session_start();  //echo "Acte<br>".$_SESSION["showInPop"]; 
   
   // Empêcher l’accès direct par URL
   include("backend/url_access_guard.php");
   
  /*
   * Cet include etait en bas: sous </htmtl>
   * Mais en bas il provoque une remontée du footer
   *
   * header('Location: ecritureBD.php');//Warning: Cannot modify header information - headers already sent by
   * 
   *
   * EN PLUS LES MESSAGES NE S'AFFICHENT PAS: Je sais pas pourquoi
   */
   include("backend/verif_num_acte.php"); 
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
	 <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes"> <!-- ⚠️ Responsive mobil -->
	 <title> Acces en Ecriture à la base etatcivil</title>
	 <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"/>
	 <link href="css/slide.css"     rel="stylesheet"/> 
	 <link href="css/dropdown.css"  rel="stylesheet"/>
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />  <!-- pour les bouton du panneau central -->
	 <link href="css/ecritureBD.css" rel="stylesheet" title="Style" />
	 <link href="css/controleSaisie.css" rel="stylesheet"/>
	 <link href="css/ecritureBDmenudroite.css" rel="stylesheet" title="Style" />
	 <link href="css/responsiveTopnav.css" rel="stylesheet" title="Style" />
	 <link href="css/responsivecritureBD.css" rel="stylesheet" title="Style" />
     <style>
		/* 🧩 Task:Nettoyage css.Virer tous les résidus ccs qui trainent dans ecritureBD.css ( à mettre dans ecritureBD.css) */	

       /* specifique à cette page: Le gris-beige fatigue les yeux à la saisie */
        body, .tabledroite{
			background:#ECECEA;
		}
	 </style>	 
	 <script src="js/jquery.js"></script>
	 <script src="js/ecritureBD.js" defer></script>
	 <script src="js/controleSaisie.js" defer></script>
	 <script src="js/logout.js" defer></script>
</head>


<body class="page-form">
	<!-- <div id="acteN"></div> -->
	<header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type="image" src="img/drapeau.png" align="left" class="flag" />
			   <p class="text_header" style="padding-left:23%;">OFFICE   <br> D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			<?php include("inc/accueil/accueil_menucentral_ecriture.php"); ?> 
		</div>
    </header>
	<div class="contenu" style="margin-bottom:0;">
		<form action ="backend/ecritureBD_insertionSQL.php" method="post" name="form1" >
			<!-- LE PANNEAU DE GAUCHE :  -->
			<div class="colonne_laterale" style="width: 33%;  " >
				<aside class="aside1" style="min-height:100vh !important;">			    
		            <!-- ❌ include("inc/ecriture/ecritureBD_panodegauche.php"); ❌ ça donne un espace fantôme en haut -->
					  <table class="tablegauche"  name="listes" style="min-height:63.15% !important;  padding:1em inherit;"> 
						  <caption  style="caption-side:top; box-shadow: 0 40px 65px #cdbe9f inset; "> 
							<font color="gray" style="line-height:2;">
								<h3> UNION DES COMORES  </h3>
								<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement </h6>
								<h4> MINISTERE DE L'INTERIEUR  </h4>
							</font>
							<img src="img/armoirie.png"  style="z-index:3;   margin-left:40%; margin-right:40%; width:20%;"/>
						 </caption>	  
						 <tr>
						   <td><br> Pr&eacute;fecture: </td>
						   <td><br>  
								<!-- <select  name="prefecture"  onChange="changement(this)"> -->
								<!-- <select name="prefecture" id="prefecture" onChange="control(this); changement(this);"> -->
								<select 
										name="prefecture" 
										id="prefecture"
										data-role="<?php echo $_SESSION['user_role']; ?>"
										data-pref="<?php echo $_SESSION['prefecture']; ?>"
										onChange="control(this); changement(this);" required>

									 <optgroup label="Ngazidja"> 
									 <option> </option>
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
									 <optgroup label="Anjouan">           
									 <option>Mutsamudu </option>
									 <option>Ouani </option> 
									 <option>Domoni </option>
									 <option>Mremani </option>
									 <option>Sima </option>  
									 </optgroup>
									 
									 <optgroup label="Mayotte"  disabled>           
									 <option>Dzaoudzi </option>
									 <option>Pamandzi </option> 
									 <option>Mtsapere </option>
									 <option>Mtsamboro </option>
									 <option>Mamoudzou </option>  
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
								 <select name="centretatcivil"  id="centretatcivil" onChange="clearPrefectureBorder();" required>
                                 	<option> </option>
								 </select>
							 </td>
						 </tr>
						 <tr>
						     <td>Registre</td> 
							 <td> 
							     <input type="text" name="registre" class="obligatoire" required onblur="controlChamp(this)">
                                 <span class="errChamps erreur idS"></span>								 
							 </td>
						 </tr>
						 <tr>
						     <td>Acte N°</td>
							 <td> 
							    <input type="text" name="acte" class="obligatoire" required onblur="controlChamp(this)">
								<span class="errChamps erreur idS"></span>
						     </td>
						 </tr>
						 <tr>
						   <td>Du(date)</td> 
						   <td> 
						      <input type="date" name="date_acte" class="obligatoire" required onblur="controlChamp(this)">
							  <span class="errChamps erreur idS"></span>
						   </td>
						 </tr>
						 <tr>
						    <td></td> 
							<td></td>
						 </tr>
						 
						 <tr><td> </td><td><font color="##1D702D"> <b>Naissance de:</b></font></td> </tr>
						 <tr>
						    <td> Nom </td>
							<td>
                               <!-- id="nom" ne sert à rien mais si je l'enleve:
							        le contrôle de saisie ne s'execute pas - même dans les autres champs
							        Donc je le laisse temporairement !
							   -->							
							   <input id="nom" class="obligatoire"  type="text" name="nom" required onblur="controlChamp(this)">
                               <span class="errChamps erreur idS"></span>
							</td>
						 </tr>
						 <tr>
						     <td> Pr&eacute;nom </td> 
							 <td> 
							     <input id="prenom" class="obligatoire"  type="text" name="prenom" required onblur="controlChamp(this)">
								 <span class="errChamps erreur idS"></span>
							 </td>
						 </tr>
						 <tr><td> </td><td><font color="##1D702D"> <b>Pour acte certifi&eacute; <span class="conforme">conforme</span></b></font></td></tr>
						 <tr>
						    <td> D&eacute;livr&eacute; &agrave; </td>
							<td> 
							    <input type="text" name="delivre_a" class="obligatoire" required onblur="controlChamp(this)">
								<span class="errChamps erreur idS"></span>
							</td>
						 </tr>
						 <tr>
						    <td> Le  </td> 
							<td> 
							    <input type="date" name="delivre_le" class="obligatoire" required onblur="controlChamp(this)">
								<span class="errChamps erreur idS"></span>
							</td>
						 </tr>
						 <tr>
						    <td> L'an  </td> 
							<td> 
							   <input type="text" name="delivre_an" class="obligatoire" onblur="controlChamp(this)"> 
							   <span class="errChamps erreur idS"></span>
							</td>
						 </tr>
						 <tr >
						    <td style="padding-bottom:1em;"> S&eacute;rie Num:  </td> 
							<td style="padding-bottom:1em;"> 
							    <input type="text" name="num_serie" class="obligatoire" required onblur="controlChamp(this)">
								<span class="errChamps erreur idS"></span>
							</td>
						</tr>
					 </table> 

                </aside>
			</div><!--  fin colone_leterale -->
			 <!-- LE PANNEAU CENTRAL   -->
            <div class="colonne_contenu" style="padding:0; width:40%;">
			     <aside class="aside2">
					<table class="tabledroite showacte" style="min-height:100vh !important;" >
							<tr> 
								 <td> 
								    <input type="text" name="naissance_jour_moi"  placeholder="Le">
								 </td>
								 <td> 
								    <input class="obligatoireDeux"  type="text" name="naissance_an"  placeholder=" ici l'an" onfocus="checkpoint();" onblur="controlChamp(this)"> 
								    <span class="errChamps erreur idS"></span>
								 </td>
							</tr>
							<tr> 
								 <td> 
								     <input type="text" name="naissance_heure"  placeholder="heure"> 
								 </td>
								 <td> 
								     <input type="text" name="naissance_minuite"  placeholder=" minuite"> 
								 </td>
							</tr>
							
							 <tr> 
							     <td> 
								    <input class="obligatoireDeux" type="text" name="naissance_nom_prenom" placeholder="est n&eacute;(e)" onblur="controlChamp(this)">
								    <span class="errChamps erreur idS"></span>
								 </td>
							     <td> 
								    <input class="obligatoireDeux" type="text" name="naissance_lieu"  placeholder=" &agrave;(lieu)" onblur="controlChamp(this)"> 
								    <span class="errChamps erreur idS"></span>
								 </td>
							 </tr>

							 <tr> 
							    <td> 
								   <input class="obligatoireDeux" type="text" name="naissance_sexe"   placeholder=" du sexe" onblur="controlChamp(this)"> 
								   <span class="errChamps erreur idS"></span>
								</td>
							    <td></td>
							 </tr>
							 
							 <tr >
							     <td class="margeSection"> <font color="##1D702D"><b>Le p&egrave;re</b></font></td>
								 <td class="margeSection"> <font color="##1D702D"><b>La m&egrave;re</b></font></td> 
							 </tr>
							  
							 <tr> 
							     <td> 
								      <input class="obligatoireTrois"  type="text" name="pere_nom_prenom"  placeholder=" fils(fille) de" onfocus="checkpointDeux();" onblur="controlChamp(this)"> 
                                      <span class="errChamps erreur idS"></span>
								 </td>									  
								 <td> 
								     <input class="obligatoireTrois" type="text" name="mere_nom_prenom"  placeholder=" et de" onblur="controlChamp(this)"> 
								     <span class="errChamps erreur idS"></span>
								 </td> 
							 </tr>
							 <tr> 
							     <td> 
								    <input class="obligatoireTrois" type="text" name="pere_datenaisance" placeholder=" n&eacute; le" onblur="controlChamp(this)"> 
								    <span class="errChamps erreur idS"></span>
								 </td>    
								 <td> 
								     <input class="obligatoireTrois" type="text" name="mere_datenaisance" placeholder="n&eacute;e le" onblur="controlChamp(this)"> 
								     <span class="errChamps erreur idS"></span>
								 </td> 
							 </tr>
							 <tr> 
							     <td> 
								     <input class="obligatoireTrois" type="text" name="pere_lieunaissance" placeholder="n&eacute; &agrave;" onblur="controlChamp(this)"> 
								     <span class="errChamps erreur idS"></span>
								 </td>   
								 <td> 
								    <input class="obligatoireTrois" type="text" name="mere_lieunaissance" placeholder="&agrave;" onblur="controlChamp(this)"> 
								    <span class="errChamps erreur idS"></span>
								 </td>
							 </tr>
							 <tr> 
							    <td> 
								   <input type="text" name="pere_profession" placeholder="profession"> 
								</td>  
								<td> 
								   <input type="text" name="mere_profession" placeholder="profession">
								</td>
							 </tr>
							 <tr> 
							    <td> 
								   <input type="text" name="pere_villederesidence" placeholder="demeurant &agrave;"> 
								</td> 
								<td> 
								   <input type="text" name="mere_villederesidenc" placeholder="demeurant &agrave;"> 
								</td>
							 </tr>

							 <tr>
							      <td class="margeSection"> <font color="##1D702D"><b>La d&eacute;claration</b></font></td> 
							      <td class="margeSection"> </td> 
							 </tr>
							 <tr> 
								<td> 
								    <input  type="text" name="declaration_faite_par" placeholder="faite par:" required onfocus="checkpointTrois();" onblur="controlChamp(this)">
									<span class="errChamps erreur idS"></span>
								</td>
								<td>
								    <input class="jugement" type="text"  placeholder="Emetteur jugement">
								</td>
							 </tr>
							 <tr> 
								<td> 
								   <input type="text" name="declaration_recue_pa" placeholder="re&ccedil;ue par" onblur="controlChamp(this)"> 
								   <span class="errChamps erreur idS"></span>
								</td>
								<td>
								    <input class="jugement" type="text" placeholder="Titre recepteur">
								</td>
							 </tr>
							 <tr> 
								<td> 
								    <input id="tetu" type="date" name="datejugement" placeholder="date jugement:" style="height:15px;" required onblur="controlChamp(this)"> 
								    <span class="errChamps erreur idS"></span>
								</td>
								<td>
								    <input class="jugement" type="text" placeholder="Date jugement">
								</td>
							 </tr>
						 </p>
						<tr> 
							<td>
								<?php 
									$id_document= "";
									if (!empty($_SESSION['id_document'])) {  // 🎁 defini dans backeng/ecritureBD_isertionSQL.php
										$id_document = $_SESSION['id_document']; 
									}
								?>
							    <!-- ✔️ Btn ENREGISTRER   --> 	
								<input type="submit" class="btnOutput" id="enregistrer" name="Enregistrer" value="Enregistrer l'acte"/> 
							</td>

							<td> 
							   <!--  ✔️ Btn IMPRIMER   -->
								<?php $id_js = isset($id_document) ? intval($id_document) : 0; ?>
								<a href="#" onclick="return verifierAvantImpression(<?php echo $id_js; ?>);">
									<input type="button" value="Imprimer l'acte" class="btnOutput"/>
								</a>
							</td>
						</tr>
					</table>
				    <?php
					    // Confirmation de l'enregistrement. $_SESSION['message']: defini dans backeng/ecritureBD_insertionSQL.php
						if (!empty($_SESSION['message'])) {
							echo '<div class="flash-success">'.$_SESSION['message'].'<span class="flash-close">&times;</span></div>';
							unset($_SESSION['message']);
						}
					?>
				</aside>
			</div><!-- Fin PANNEAU CENTRALE -->
			<!-- LE PANNEAU DE DROITE: -->
			<div class="colonne_laterale" style="width: 25%;">
				<aside class="aside1">			    
		            <!-- <table  class="tablemenu" style="min-height:41.835em; background:red;"> -->    
		            <table  class="tablemenu" style="min-height:88.75%;">    
						<tr><td>
							<?php include("inc/ecriture/ecritureBD_menudroite.php"); ?>
						</td></tr>
					</table>
					<!-- Alignement des Panneaux emboités: colonnes1 et 3 -->
					<div class="rappel ajustement"> 
					    Formulaire sur panneau coulissant,<br>
					    Interface à volet coulissant,<br>
						Emboitement de section,<br>
					    Panneaux emboités, Telescopique2 ou 3 ...<br>
						"L'effet doit servir l'usage". Sinon ça fait GADGET!<br>
					</div>
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
	<!-- Nouveau popup    -->
	<div id="popupModal" class="modal">
		<div class="modal-content">
			<span class="modal-close">&times;</span>
			<span class="modal-fullscreen">⛶</span>
            <!-- entete du pop -->
			<div class="modal-header">
				<span id="popupTitle">Chargement…</span>
			</div>
            <!-- Loader doit être DANS modal-content -->
			<div id="popupLoader" class="loader"></div>
			 <!-- ############# -->
			<iframe id="popupFrame" src="" frameborder="0"></iframe>
		</div>
	</div>
	
	<!-- Alert de précaution avant logout -->
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
    <script src="js/nouveaupop.js"></script>
	<link href="css/nouveaupop.css"  rel="stylesheet" />
	
</body>
</html>





  

