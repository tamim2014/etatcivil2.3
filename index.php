
<?php  include("backend/authentification.php");  ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>authentification </title>
	<link href="css/template.css"  rel="stylesheet" type="text/css" >
	<link href="css/accueil22.css" rel="stylesheet"/>
    <link href="css/slide.css"     rel="stylesheet"/>
	<link href="css/dropdown.css"  rel="stylesheet"/>
	<link href="css/factorisation.css"  rel="stylesheet"/> <!-- ⚠️ On nettoie les elts pour factoriser ici  --> 
	<link href="css/flextablegauche.css"  rel="stylesheet" />  
	<link href="css/responsive.css"  rel="stylesheet"    />
	<style>
	    .t_area{
			    /* padding-top:1.1em; */
			    background-color: white;
				
				color:#000 !important;				
				-webkit-text-fill-color: #000 !important;
				/* 
				  virer la poignée de #000imensionnement 
				   resize:none;
				*/

		}
        @media (max-width: 768px) {
            .t_area{
                padding:1em;
                font-size:0.82rem !important;
                color:#000 !important;
            }
			.t_area {
				background:#fff !important;
				color:#000 !important;
				-webkit-text-fill-color:#000 !important;

				/* Améliore la netteté sur Android */
				text-rendering: optimizeLegibility;
				-webkit-font-smoothing: antialiased;
				font-weight: 500; /* léger renforcement pour compenser le flou */
			}

        }
	</style>

	<script src="js/jquery.js"></script>
</head>

<body >
    <header>
		<div class="en-tete">
			<div class="hollowTop">				   
			   <input class="flag" type="image" src="img/drapeau.png" align="left"/>
			   <p class="text_header">OFFICE  D&apos;ÉTAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			<?php include("inc/accueil/accueil_menucentral_login.php");  ?>
		</div>
    </header>
    <div class="contenu"  >
	    <form id="formSource" action ="" method="POST" name="form1" >
			<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->
			<div class="colonne_laterale" >
				<aside  class="aside1">
					<table class="tablegauche"> 
						 <caption> 
						    <font color="gray">
								 <h3> UNION DES COMORES  </h3>
								 <h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								 <h4> MINISTÈRE<br>DE<br> L&apos;INTÉRIEUR  </h4>
							</font>
							<img src="img/armoirie.png"/>
						 </caption>
						 <tr > <td id="auth" >AUTHENTIFICATION</td></tr>
						 <tr><td> <font color="#cdbe9f"><b>Entrer votre</b></font> login<br/> <input type="text"   id="login_"  name="pseudo_" > </td></tr> 
						 <tr><td> <font color="#cdbe9f"><b>Votre</b></font> mot de passe<br/> <input type="password"  id="pswd_"   name="motdepasse_"> </td></tr>
						 <tr ><td style="padding-top:1em;">
							<!-- <textarea  class="t_area" style="color:#000 !important;"> <"?"php echo $message; ?> </textarea> -->
							 <textarea id="t_area" name="myTextBox" class="t_area" style="color:#000 !important;"></textarea>
						 <br/><input id="valider_" type="submit" class="submit btnHover" value="Valider"   name="envoie"/>
						 </td></tr>
					</table>
				</aside>
				
			</div>
			<!-- LE PANNEAU DE DROITE  
			<div class="colonne_contenu" style="padding:0; margin-bottom:0; background:inherit; ">
			</div>
			-->
			
		</form>	
         		
    </div>    
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
	
	
    <!-- Pour pouvoir mettre le color du textarea en noir sur mobil - car il est consideré comme un placeholder   -->
	<script>
	document.addEventListener("DOMContentLoaded", function() {

		const t = document.getElementById('t_area');

		// Injecter le texte APRÈS le chargement
		t.value = <?php echo json_encode($message); ?>;

		// Forcer Android à recalculer le style
		t.style.display = 'none';
		void t.offsetHeight;
		t.style.display = '';

		// Reforcer la couleur
		t.style.webkitTextFillColor = "#000";
	});
	</script>






</body>
</html>




 

