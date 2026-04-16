
<?php  
    include("SERVEUR/authentification.php "); 

    // ✅ Ajouter un utilisateur
	
	if (isset($_POST['ajouter'])) {

		$pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
		$mdp    = mysqli_real_escape_string($conn, $_POST['mdp']);
		$user   = mysqli_real_escape_string($conn, $_POST['user']);

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

				// Insertion uniquement si le login n'existe pas
				$sql = "INSERT INTO listeofficiers (pseudo, motdepasse, user)
						VALUES ('$pseudo', '$mdp', '$user')";

				if (mysqli_query($conn, $sql)) {
					echo "<p style='color:green; text-align:center;'>Utilisateur ajouté avec succès.</p>";
				} else {
					echo "<p style='color:red; text-align:center;'>Erreur lors de l'ajout.</p>";
				}
			}
		}
	}


	
	// ⛔ Suprimer un utilisateur
	
		if (isset($_POST['supprimer'])) {

			$pseudo_del = mysqli_real_escape_string($conn, $_POST['pseudo_del']);

			if (!empty($pseudo_del)) {

				// Vérifier si le login existe
				$check = "SELECT * FROM listeofficiers WHERE pseudo = '$pseudo_del'";
				$res = mysqli_query($conn, $check);

				if (mysqli_num_rows($res) == 0) {

					// ⚠️ Le login n'existe pas
					
					echo "
						<div class='alert'>
							⚠️ Ce login n'existe pas !
							<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
						</div>
					";

					
					

				} else {

					// Le login existe → suppression
					$sql = "DELETE FROM listeofficiers WHERE pseudo = '$pseudo_del'";

					if (mysqli_query($conn, $sql)) {
						echo "<p style='color:green; text-align:center;'>Utilisateur supprimé avec succès.</p>";
					} else {
						echo "<p style='color:red; text-align:center;'>Erreur lors de la suppression.</p>";
					}
				}
			}
		}




	
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil </title>
	<link href="css/template.css"  rel="stylesheet" type="text/css" >
	<link href="css/accueil22.css" rel="stylesheet"   />
    <link href="css/slide.css"     rel="stylesheet"   />
	<link href="css/dropdown.css"  rel="stylesheet"    />
	
	<style>
	    .btnHover:hover{
			padding-top:1%; padding-bottom:1%;
			padding-left:12% !important;
			font-size:1em !important;
			font-style: italic !important;
			background-color: #cdbe7f !important;  
			border-radius:2px;			
            box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset, 0px 2px 2px 0px rgba(255, 255, 255, 0.5);
		}
		
		.colonne_laterale{
			width:39.5%;
		}

	    .tablegauche{
		    display:flex; /* c'ce qui donne ce rendu particulier à cette page ⚠️ */
		    min-height:100vh !important; 
	    }
	    .tablegauche tr td {  
		   padding-left:2vw;
		   padding-bottom:1em;
		} 
		
		.tablegauche tr td input, textarea{
			width:21vw !important;
			max-width:300px;
			padding:.4em;
		}
		textarea{
			height:10vh;
		}
		/* Virer les bortures autour des champs */
		input:focus,
		textarea:focus {
			outline: none !important;
			border: none !important;
		}

		
		input#login_, input#pswd_{
			background:#ddd !important; /* impossible à changer ⚠️  j'sais pas pourquoi! */
		}
		 /* solution: Ecraser le input:-webkit-autofill */
		
		input:-webkit-autofill,
		input:-webkit-autofill:focus {
			background-color:#ddd !important;
			-webkit-box-shadow: 0 0 0px 1000px #c4c4c4 inset !important;
			box-shadow: 0 0 0px 1000px #ddd inset !important;
			outside:none !important; /* ?????*/
		}
		input:-webkit-autofill:hover {
			background-color: #cdbe7f  !important; 
			-webkit-box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset, 0px 2px 2px 0px rgba(255, 255, 255, 0.5) !important;
			box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset, 0px 2px 2px 0px rgba(255, 255, 255, 0.5) !important;
		}
		
		/*
		#login_:hover , #pswd_:hover  { background-color:white !important; color:#ffffff; font-size: 17px; font-weight:bold;    box-shadow:0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset, 0px 2px 2px 0px rgba(255, 255, 255, 0.5); }
        #valider_:hover { color: #1D702D;   font-style: italic;}
        */

	   
	    /* Ajouter un utilisateur  */
		.form-container {
			width: 400px;
			margin: 40px auto;
			padding: 25px;
			background: #ffffff;
			border-radius: 10px;
			box-shadow: 0 0 12px rgba(0,0,0,0.15);
			font-family: Arial, sans-serif;
		}

		.form-container h2 {
			text-align: center;
			margin-bottom: 20px;
			color: #333;
		}

		.form-group {
			margin-bottom: 15px;
		}

		.form-group label {
			display: block;
			font-weight: bold;
			margin-bottom: 6px;
			color: #444;
		}

		.form-group input {
			width: 100%;
			padding: 10px;
			border: 1px solid #bbb;
			border-radius: 6px;
			font-size: 15px;
			transition: 0.2s;
		}

		.form-group input:focus {
			border-color: #007bff;
			box-shadow: 0 0 5px rgba(0,123,255,0.4);
			outline: none;
		}

		.btn-submit {
			width: 100%;
			padding: 12px;
			background: #007bff;
			border: none;
			color: white;
			font-size: 16px;
			border-radius: 6px;
			cursor: pointer;
			transition: 0.2s;
		}

		.btn-submit:hover {
			background: #0056b3;
		}
		
		/* Supprimer un utilisateur  */
		
		.btn-delete {
			width: 100%;
			padding: 12px;
			background: #dc3545;
			border: none;
			color: white;
			font-size: 16px;
			border-radius: 6px;
			cursor: pointer;
			transition: 0.2s;
		}

		.btn-delete:hover {
			background: #a71d2a;
		}
		/* Message d'alerte  */
		
		.alert {
			background-color: #ffdddd;
			color: #a10000;
			padding: 15px 40px 15px 20px;
			border-radius: 0; /* pas arrondi pour un style "bandeau" */
			width: 100%;
			box-sizing: border-box;
			font-family: Arial, sans-serif;
			text-align: left;
			position: relative;
			top: 0;
			left: 0;
			margin: 0; /* enlève les marges qui recentrent */
		}


		.closebtn {
			position: absolute;
			right: 15px;
			top: 10px;
			color: #a10000;
			font-size: 22px;
			font-weight: bold;
			cursor: pointer;
		}

		.closebtn:hover {
			color: #700000;
		}



	   
	   
	   
	   
	   
	   
	   
	   /* Nouvelle façon de fixer le footer */
	     body{ 
			 display:flex;	  
			 flex-direction:column;
			 min-height:100vh;
			 width:100%;		 
		 }
         .contenu {
           flex:1;		   
         }
		 
	</style>
	<script src="js/jquery.js"></script>
</head>

<body >
    <header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type=image src="img/drapeau.png" align="left" class="flag" style="width:30%; height:100%; filter:brightness(80%);" />
			   <p class="text_header" style="padding-top:2%; padding-left:45%;">OFFICE    D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			   <?php include("inc/accueil/accueil_menucentral_login.php");   ?>
		</div>
    </header>
    <div class="contenu" >
	    <form action ="" method="POST" name="form1" >
			<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->
			<div class="colonne_laterale" >
				<aside  class="aside1">
					<table class="tablegauche" style="margin-bottom:0; padding-bottom:0;   background:#ECECEA ;"> 
					    <!-- <caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;  ">  -->
						<caption  style="caption-side:top; box-shadow: 0 20px 65px #cdbe9f inset; padding:0 8px;"> 
						    <font color="gray" style="line-height:2;">
								 <h3> UNION DES COMORES  </h3>
								 <h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								 <h4 style="line-height:1.3 !important;"> MINISTERE <br>DE<br> L'INTERIEUR  </h4>
							 </font>
							 <!-- <img src="img/armoirie.png" style="z-index:3; transform: translate(200%, 0);  "  /> -->
							  <img src="img/armoirie.png" style="z-index:3;  margin-left:40%; margin-right:40%; margin-bottom:1%; width:20%;  "  />
						      
							</caption>
						 <tr > <td >AUTHENTIFICATION</td></tr>
						 <tr><td> <font color="#cdbe9f"><b>Entrer votre</b></font> login<br/> <input  type="text"   id="login_"    name="pseudo_" > </td></tr> 
						 <tr><td> <font color="#cdbe9f"><b>Votre</b></font> mot de passe<br/> <input  type="password"  id="pswd_"     name="motdepasse_"> </td></tr>
						 <tr ><td style="padding-top:1em;">
							 <textarea style="font-size:1em; " class="t_area" name="myTextBox"> Veuillez saisir vos identifiants </textarea>
						 <br/><input id="valider_" type="submit" class="submit btnHover" value="Valider"   name="envoie"  style="background: #ECECEA ; color:#111; padding:.3em 3.3em; margin:1em auto 0; border-radius:4px; " />
						 </td></tr>
					</table>					 
				</aside>
			</div>
			<!-- LE PANNEAU DE DROITE --> 
			<div class="colonne_contenu" style="padding:0; margin-bottom:0; background:inherit; ">
			     <h1>User management</h1>
			</div>
		</form>
		
		<div class="form-container">
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
					<label for="user">User (optionnel)</label>
					<input type="text" id="user" name="user">
				</div>

				<button type="submit" name="ajouter" class="btn-submit">Ajouter</button>
			</form>
		</div>
		<div class="form-container">
		    <h2>Supprimer un officier</h2>

		    <form method="POST" action="userManagement.php">
			
				<div class="form-group">
					<label for="pseudo_del">Nom d'utilisateur à supprimer</label>
					<input type="text" id="pseudo_del" name="pseudo_del" required>
				</div>

				<button type="submit" name="supprimer" class="btn-delete">Supprimer</button>
			</form>
		</div>

		
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    </div>     
    <div class="footer" style="text-align:left; ">
        <span ><span style="color:#555;">2026 &copy; -</span> <span style="color:#333;">Etat civil</span></span>
    </div>
</body>
</html>




 

