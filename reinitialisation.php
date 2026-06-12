<?php

     include("backend/authentification.php"); 
	 
     
	 //session_start();
	 require_once 'backend/connection_mysqli.php';
	 
	 // empêcher l’accès direct par URL
	 include("backend/url_access_guard.php");

    // ✅ 1. Ajouter un utilisateur
	
if (isset($_POST['ajouter'])) {

    $pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
    $mdp    = mysqli_real_escape_string($conn, $_POST['mdp']);
    $roles  = mysqli_real_escape_string($conn, $_POST['roles']);
    $confirmer  = mysqli_real_escape_string($conn, $_POST['confirmer']);

    if (!empty($mdp) && !empty($confirmer)) {

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

            // Insertion avec mot de passe haché: Uniquement si le login n'existe pas
            $sql = "INSERT INTO listeofficiers (pseudo, motdepasse, roles)
                    VALUES ('$pseudo', '$passwordHash', '$roles')";

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
	<link href="css/responsive.css"  rel="stylesheet"/>

	
	<script src="js/jquery.js"></script><!-- pourquoi? -->
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
							 <textarea style="font-size:1em; " class="t_area" name="myTextBox"> Veuillez saisir vos identifiants </textarea>
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
		    <h1>Réinitialisation</h1>
			<div class="form-container form1">
				<h2>Réinitialiser le mot de passe</h2>
				<form method="POST" action="userManagement.php">

					<div class="form-group">
						<label for="mdp">Nouveau mot de passe</label>
						<input type="password" id="mdp" name="mdp" required>
					</div>
					<div class="form-group">
						<label for="confirmer">Confirmer</label>
						<input type="password" id="confirmer" name="confirmer" required>
					</div>


					<button type="submit" name="ajouter" class="btn-submit">Ajouter</button>
				</form>
			</div>
		</div>
    </div>  <!-- Fin div.contenu --> 
	
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
    <!-- css du sticky: en bas de usermanagement.css --> 	
	<script src="js/sticky.js"></script>
</body>
</html>




 

