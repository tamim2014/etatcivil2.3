
<?php 
  //session_start();  backend/searcheEngin demarre déjà une session
  include("backend/searchMessages.php");
  // c'la valeur capturée par capture_items.js et transmis à lectureBD_aficherNaissance.php
  if(!isset($_SESSION["pref"])) $_SESSION["pref"]=""; $s=$_SESSION["pref"]; 
  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
     <title> Acces en Lecture a la base etatcivil: connexion,recupreation affichage</title>
	 
     <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"   />
     <link href="css/slide.css"     rel="stylesheet"   />
	 <link href="css/dropdown.css"  rel="stylesheet"    />
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />
	 <link href="css/accordeon2.css" rel="stylesheet" /> 
	 <link href="css/responsivelectureBD.css"  rel="stylesheet"/>
		<!--
	    ⚠️Attention!
		⚠️ Dans lectureBD.php, lectureBD2.php: .contenu{ display:flex;} 👈  car il est le bon parent
        ⚠️ Dans les autres pages:	form { display:flex;} 👈  car les colonne_laterale, colonne_contenu sont dans form	
		🎁 Flexbox: On remplace "float:left" sur les contenu par "display:flex" sur le conteneur 
	     -->
	 <script src="js/jquery.js"></script>
	 <script src="js/capture_items.js"></script>  <!--  <script src="js/acteOutSlide.js"></script> -->
	 <script src="js/lectureBD.js"></script>
	 <script src="js/moteurJquery.js"> </script><!--Exclusivement sur cette page! Pour le menu accordeon du topnav-les préfectures...( moteur un peu vieux mais il tourne) --> 
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
				<!-- include("inc/accueil/accueil_menucentral.php"); --> 
				<?php include("inc/lecture/topMenu.php"); ?> 
		</div>
    </header>
    <div class="contenu" style="display:flex; margin-bottom:0;"> <!-- 🎁 FlexBox: on remplace float:left sur les contenu par display:flex sur le conteneur  -->
		<!-- LE PANNEAU DE GAUCHE :  -->
		<div class="colonne_laterale" >
			<aside class="aside1">
				<form action ="" method="POST" name="form1" >
					<table class="tablegauche" style=" height:25em;"> 
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
							 <textarea class="t_area" style="font-size:1em" name="myTextBox" cols="24" rows="4"> <?php echo $message; ?> </textarea>
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
				    <!-- <caption style="caption-side:top"> <font color="#FFFFFF"><h3> Liste des actes de naissance </h3></caption> -->
					<tr><td > 
                        <div class="mnayvawo">
						    <button  class="boutoyahemnayivawo">
 							    Actes extraits de la préfecture de:
								<span id="wilaya_"> <?php  echo  $s; ?></span>
							</button>   
						</div>					 
						<div class="line1" style="width:98%; height:5px; margin:auto;"></div>
						<!-- Conteneur de la table -->
						<div id="yivawo" class="scrolbar" ></div> 
					 </td></tr>
				</table>
				<!-- Suppression sous-menu personnalisé(Remplacé par sous-menus de l'accrdéon du topnav) -->  
		        <!-- include("inc/lecture/sousmenu.php"); --> 
            </aside>
        </div>			
	</div> <!-- fin  <div class="contenu"  >  -->
	
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
    <!-- <div class="mnayvawo">  <button  class="boutoyahemnayivawo"> Actes extraits de la pr&eacute;fecture de:<span id="wilaya_" style="color:#000066;  font-size: 17px; font-style: italic; font-family: \"Times New Roman\", Georgia, Serif;" > <?php  echo  $s; ?></span> </button>   </div>  -->
<body>
</html>


     
