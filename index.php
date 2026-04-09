
<?php include("SERVEUR/authentification.php ");  ?>


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
            box-shadow:
                          0px 2px 2px 0px rgba(0, 0, 0, 0.5) inset,
                           0px 2px 2px 0px rgba(255, 255, 255, 0.5);
		    			
		}
		
		/* Essai Responsive viewport:  */ 
		
		body{ margin:0;	  padding:0; }		
		.tablegauche, .tabledroite{
			margin:0; padding:0;						
			min-height:42vh; /* 42vh */
		}
		.contenu {
			min-width:98%;
            margin:0 auto;
        }
		.contenu, .colonne_laterale, .colonne_contenu{
			background:inherit;	
            min-height:66vh; 
		}
       .colonne_laterale{ width:30%;}
	   .colonne_contenu{ width:70%; }
	   
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
    <div class="contenu" style="margin-bottom:0;">
	    <form action ="" method="POST" name="form1" >
			<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->
			<div class="colonne_laterale" style=" margin-bottom:0; padding-bottom:0; height:auto;">
				<aside style="padding:0; margin-bottom:0; background: #ECECEA ; " >
					<table class="tablegauche" style="margin-bottom:0; padding-bottom:0;  box-shadow: none; border:1px solid #c4c4c4; border-bottom:none; background:#ECECEA ;"> 
					    <!-- <caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;  ">  -->
						<caption  style="caption-side:top; box-shadow: 0 20px 65px #cdbe9f outset; border:1px solid #c4c4c4; border-top:none; background: #ECECEA; margin-bottom:1em;"> 
						    <font color="gray" style="line-height:2;">
								 <h3> UNION DES COMORES  </h3>
								 <h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								 <h4> MINISTERE DE L'INTERIEUR  </h4>
							 </font>
							 <!-- <img src="img/armoirie.png" style="z-index:3; transform: translate(200%, 0);  "  /> -->
							  <img src="img/armoirie.png" style="z-index:3;  margin-left:40%; margin-right:40%; margin-bottom:1%; width:20%;  "  />
						      
							</caption>
						 <tr > <td >AUTHENTIFICATION</td></tr>
						 <tr><td> <font color="#cdbe9f"><b>Entrer votre</b></font> login<br/> <input  type="text"   id="login_"    name="pseudo_"    style="background:#ddd; "> </td></tr> 
						 <tr><td> <font color="#cdbe9f"><b>Votre</b></font> mot de passe<br/> <input  type="password"  id="pswd_"     name="motdepasse_" style="background:#ddd;"> </td></tr>
						 <tr ><td style="padding-top:1em; ">
							 <textarea class="t_area" name="myTextBox" cols="18" rows="4"> Veuillez saisir vos identifiants </textarea>
						 <br/><input id="valider_" type="submit" class="submit btnHover" value="Valider"   name="envoie"  style="background: #ECECEA ; color:#111; padding:.3em 3.3em; margin:1em auto 0; border-radius:4px; " />
						 </td></tr>
					</table>					 
				</aside>
			</div>
			<!-- LE PANNEAU DE DROITE : Recher des document par liste déroulante -->
			<div class="colonne_contenu" style="padding:0; margin-bottom:0; ">
	              <!--  mettre une video ici pour montrer comment utiliser l'application --> 
			</div>
		</form>
    </div>     
    <div class="footer" style="text-align:left; ">
        <span ><span style="color:#555;">2026 &copy; -</span> <span style="color:#333;">Etat civil</span></span>
    </div>
</body>
</html>





 

