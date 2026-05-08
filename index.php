
<?php  include("backend/authentification.php");  ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>authentification </title>
	<link href="css/template.css"  rel="stylesheet" type="text/css" >
	<link href="css/accueil22.css" rel="stylesheet"/>
    <link href="css/slide.css"     rel="stylesheet"/>
	<link href="css/dropdown.css"  rel="stylesheet"/>
	<link href="css/refactor.css"  rel="stylesheet"/> <!-- ⚠️ On nettoie les elts pour factoriser ici  --> 
	<link href="css/flextablegauche.css"  rel="stylesheet" />  
	<link href="css/responsive.css"  rel="stylesheet"    />

	<script src="js/jquery.js"></script>
</head>

<body >
    <header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   
			   <input class="flag" type=image src="img/drapeau.png" align="left"/>
			   <p class="text_header">OFFICE  D'&Eacute;TAT CIVIL </p>			  
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
								 <h4> MINISTERE <br>DE<br> L'INTERIEUR  </h4>
							</font>
							<img src="img/armoirie.png"/>
						 </caption>
						 <tr > <td id="auth" >AUTHENTIFICATION</td></tr>
						 <tr><td> <font color="#cdbe9f"><b>Entrer votre</b></font> login<br/> <input type="text"   id="login_"  name="pseudo_" > </td></tr> 
						 <tr><td> <font color="#cdbe9f"><b>Votre</b></font> mot de passe<br/> <input type="password"  id="pswd_"   name="motdepasse_"> </td></tr>
						 <tr ><td style="padding-top:1em;">
							 <textarea  class="t_area" > <?php echo $message; ?> </textarea>
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
    <div class="footer" style="text-align:left; ">
        <span ><span style="color:#555;">2026 &copy; -</span> <span style="color:#333;">Etat civil</span></span>
    </div>

</body>
</html>




 

