
<?php  include("SERVEUR/authentification.php ");  ?>


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




 

