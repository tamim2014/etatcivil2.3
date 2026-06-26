<?php

     include("backend/authentification.php"); //❌ Separation of Concerns - ça ne doit pas être là
	 
	 //session_start();
	 
	 require_once 'backend/connection_mysqli.php';
	 
	 // empêcher l’accès direct par URL
	 include("backend/url_access_guard.php");

// ✅ 1. Ajouter un utilisateur
if (isset($_POST['ajouter'])) {

    $pseudo     = mysqli_real_escape_string($conn, $_POST['pseudo']);
    $mdp        = mysqli_real_escape_string($conn, $_POST['mdp']);
    $roles      = mysqli_real_escape_string($conn, $_POST['roles']);
    $prefecture = mysqli_real_escape_string($conn, $_POST['prefecture']);
    $email      = mysqli_real_escape_string($conn, $_POST['mail']);

    if (!empty($pseudo) && !empty($mdp)) {

        // Vérifier si le pseudo existe déjà
        $check = "SELECT * FROM listeofficiers WHERE pseudo = '$pseudo'";
        $res = mysqli_query($conn, $check);

        if (mysqli_num_rows($res) > 0) {

            echo "
                <div class='alert'>
                    ⚠️ Ce login existe déjà !
                    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
                </div>
            ";

        } else {

            // 🔐 Hachage du mot de passe AVANT insertion
            $passwordHash = password_hash($mdp, PASSWORD_DEFAULT);

            // Insertion avec les nouveaux champs
            $sql = "INSERT INTO listeofficiers (pseudo, motdepasse, roles, prefecture, email)
                    VALUES ('$pseudo', '$passwordHash', '$roles', '$prefecture', '$email')";

            if (mysqli_query($conn, $sql)) {
                echo "
                <div class='alert' style='color:green'>
                    ✔️ Utilisateur ajouté avec succès !
                    <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
                </div>
                ";
            } else {
                echo "<p style='color:red; text-align:center;'>Erreur lors de l'ajout.</p>";
            }
        }
    }
}


	
	// ⛔ 2. Suprimer un utilisateur
		if (isset($_POST['supprimer'])) {
			$pseudo_del = mysqli_real_escape_string($conn, $_POST['pseudo_del']);
			if (!empty($pseudo_del)) {
				$check = "SELECT * FROM listeofficiers WHERE pseudo = '$pseudo_del'";
				$res = mysqli_query($conn, $check);

				if (mysqli_num_rows($res) == 0) {
					
					echo "
						<div class='alert'>
							⚠️ Ce login n'existe pas !
							<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
						</div>
					";

				} else {
					
					$sql = "DELETE FROM listeofficiers WHERE pseudo = '$pseudo_del'";
                    
					if (mysqli_query($conn, $sql)) {
						
						echo "
						<div class='alert' style='color:green' >
						   ⚠️ Utilisateur supprimé avec succès !
						   <span  class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
					    </div>
						";
						
					} else {
						echo "<p style='color:red; text-align:center;'>Erreur lors de la suppression.</p>";
					}
					
				}
				
			}
		}
		
	// 👁️ 3. Afficher tous les utilisateurs( officiers d'état civil)
	    require_once 'backend/connection_mysqli.php';
	    $officiers = "SELECT * FROM listeofficiers";
	    $resultat = mysqli_query($conn, $officiers);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Gestion utilisateurs </title>
	<link href="css/template.css"  rel="stylesheet" type="text/css" >
	<link href="css/accueil22.css" rel="stylesheet" />
    <link href="css/slide.css"     rel="stylesheet" />
	<link href="css/dropdown.css"  rel="stylesheet" />
	<link href="css/factorisation.css"  rel="stylesheet"/>
	<link href="css/flextablegauche.css"  rel="stylesheet" />
	<link href="css/usermanagement.css"  rel="stylesheet" /> <!-- ⚠️ specifique à cette page -->
	<link href="css/responsiveTopnav.css" rel="stylesheet" title="Style"/>
	<link href="css/responsive.css"  rel="stylesheet"/>
	<link href="css/responsiveUsermanagement.css"  rel="stylesheet"/>
    <style>
       @media screen and (max-width: 786px) {
		   .t_area{
			   padding-top:1em;
			   color:#000 !important;
		   }
	   }
	</style>
	
	<script src="js/jquery.js"></script>
	<!-- ✅ Déconnection -->
    <script src="js/logout.js" defer></script>
</head>

<body >

    <header  >
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type="image" src="img/drapeau.png" align="left" class="flag"  />
			   <p class="text_header">OFFICE D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav" id="myTopnav" > 
		       <!-- ⚠️ Sur symfony il faut virer l'include et mettre le morcaut html integral  --> 
		       <!-- ⚠️ ou {% include 'fichier.html.twig' %}  --> 
			   <?php include("inc/accueil/accueil_menucentral_login.php");   ?>
		</div>
    </header>
    <div class="contenu">
	    <form id="formSource" action ="" method="POST" name="form1"  >
			<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->

			<div class="colonne_laterale" style=" width:100%;" >
				<aside  class="aside1">
				    <!--
					  -- Problème de l'espace en bas
					  -- ⚠️il faut ajouter "min-height:100% !important;" sur .tablegauche
					  -- Ajout de la classe .tablegauche2: Pour resoudre le depassement horizontal/scroll
					-->
					<table class="tablegauche tablegauche2" style="min-height:100% !important;" > 
					    <!-- <caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;  ">  -->
						<caption> 
						    <font color="gray" style="line-height:2;">
								 <h3> UNION DES COMORES  </h3>
								 <h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								 <h4> MINISTERE <br>DE<br> L'INTERIEUR  </h4>
							 </font>
							 <!-- <img src="img/armoirie.png" style="z-index:3; transform: translate(200%, 0);  "  /> -->
							  <img src="img/armoirie.png"/>
							</caption>
						 <tr > <td id="auth" >AUTHENTIFICATION</td></tr>
						 <tr><td> <font color="#cdbe9f"><b>Entrer votre</b></font> login<br/> <input type="text"   id="login_"  name="pseudo_" > </td></tr> 
						 <tr><td> <font color="#cdbe9f"><b>Votre</b></font> mot de passe<br/> <input type="password"  id="pswd_"   name="motdepasse_"> </td></tr>
						 <tr ><td style="padding-top:1em;">
							 <textarea style="font-size:1em; color:#000 !important; " class="t_area" name="myTextBox"> Veuillez saisir vos identifiants </textarea>
						 <br/><input id="valider_" type="submit" class="submit btnHover" value="Valider"   name="envoie"/>
						 </td></tr>
					</table>					 
				</aside>
			</div>
			<!-- LE PANNEAU DE DROITE --> 
			<!--
			<div class="colonne_contenu" style="padding:0; margin-bottom:0;  height:100% !important; ">
			     <h1>User management</h1>
				 
			</div>
			-->
		</form>
		<!-- LE PANNEAU DE DROITE -->
		<div class="colonne_contenu" style="text-align:center; background:inherit; ">
		    <h1 class="titreUM">User management</h1>
			<div class="form-container form1">
				<h2>Ajouter un officier d'état civil</h2>
				<form method="POST" action="userManagement.php">
					<div class="form-group">
						<label for="pseudo">Nom d'utilisateur</label>
						<input type="text" id="pseudo" name="pseudo" required>
					</div>
					<div class="form-group">
						<label for="mdp">Mot de passe</label>
						<input type="password" id="mdp" name="mdp" required>
					</div>
					<div class="form-group">
						<label for="roles">roles (optionnel)</label>
						<!-- <input type="text" id="roles" name="roles"> -->
						<select  name="roles" id="roles">
						 	<option></option>
							<option>admin</option> 
							<option>usermanagement</option>
						</select>
					</div>
					<div class="form-group">
						<label for="prefecture">Prefecture</label>
						<!-- <input type="text" id="prefecture" name="prefecture" required> -->
						<select  name="prefecture" id="prefecture" required >
							 <optgroup label="Ngazidja"> 
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
						</select>
					</div>
					<div class="form-group">
						<label for="mail">Adresse mail</label>
						<input type="email" id="mail" name="mail" required>
					</div>

					<button type="submit" name="ajouter" class="btn-submit">Ajouter</button>
				</form>
			</div>
			<div class="form-container">
				<h2>Supprimer un officier</h2>

				<form method="POST" action="userManagement.php">
				
					<div class="form-group">
						<label for="pseudo_del">Nom d'utilisateur</label>
						<input type="text" id="pseudo_del" name="pseudo_del" required>
					</div>

					<button type="submit" name="supprimer" class="btn-delete">Supprimer</button>
				</form>
			</div>
			<!-- liste roles -->
			<div class="form-container table1">
			  	<h2>Liste des officiers</h2>
				<table class="officiers scrolbar" cellpadding="5" style="border:1px solid #c4c4c4;">
					<tr>
						<th>ID</th>
						<th>Pseudo</th>
						<th>Roles</th>
						<th>Prefecture</th>
						<th>Logs</th>
					</tr>
					<?php
						while($ligne = $resultat->fetch_assoc()){
							echo "
							<tr>
									<td>".$ligne['ID']."</td>
									<td>".$ligne['pseudo']."</td>
									<td>".$ligne['roles']."</td>
									<td>".$ligne['prefecture']."</td>
									<td></td>
							</tr>";
						}
					?>
				</table>
		    </div>  	
		</div>
    </div>  <!-- Fin div.contenu --> 
	
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
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
    <!-- css du sticky: en bas de usermanagement.css --> 	
	<script src="js/sticky.js"></script>
</body>
</html>




 

