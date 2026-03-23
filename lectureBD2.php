
<?php session_start();

    if(!isset($_GET['num'])) $_GET['num']="";    $num=$_GET['num']; 
	if(!isset($_GET['nom'])) $_GET['nom']="";     $nom=$_GET['nom'];

	$BD_serveur = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse = "";// Ce mot de passe est enregistré dans la table "user" de la base "mysql" du serveur Mysql. Pour le modifier (en ligne de commande) aller dans la base mysql(table user): update user set Password="" where Host="localhost"; Puis verifier en faisant select User, Password, Host from user;
    $BD_base = "etatcivil";
	$message='';
	
	$conn = mysqli_connect($BD_serveur,$BD_utilisateur,'',$BD_base)or die('Erreur de connection :'.mysqli_error());
	$conn->set_charset("utf8");
	
	
	
	if(!empty($num) ){
	   $requete = "SELECT * FROM liste WHERE acte=".$num ;  
	   $result = mysqli_query($conn,$requete);
	}else if(!empty($nom) ){
	  $requete = "SELECT * FROM liste WHERE   nom='".ltrim($nom)."'" ;	  	
	  $result = mysqli_query($conn,$requete); 
	}
	
	while ($donnees = mysqli_fetch_array($result) )  	 	 
	{
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
	 

	 
	 <script src="js/jquery.js"></script>
	 <script src="js/capture_items.js"></script>    <!--    <script src="js/acteOutSlide.js"></script> -->
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

	<div class="contenu" style="margin-bottom:0;"  >
		<!-- LE PANNEAU DE GAUCHE :  -->
		<div class="colonne_laterale" style=" margin-bottom:0; padding-bottom:0; height:auto;" >
			<aside style="padding:0; margin-bottom:0; " >
				<table class="tablegauche" style="margin-bottom:0; padding-bottom:0; height:25em;"> 
				     <caption  style="caption-side:top; box-shadow: 0 20px 65px #cdbe9f inset;  "> 
						<font color="gray" style="line-height:2;">
							<h3> UNION DES COMORES  </h3>
							<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
							<h4> MINISTERE DE L'INTERIEUR  </h4>
						</font>
					     <img src="img/armoirie.png" style="z-index:3;  margin-left:40%; margin-right:40%; width:20%;  "  />
					 </caption>
					 <tr ><td style="padding-top:0; padding-bottom:8em; margin-top:0; ">
						

                        <div id="m"   style="width:80%; margin-left:10%;  padding-top:0; margin-top:0;    ">
				            <div class="kangalaheMenu" style="margin-top:0;">
							     
                                 <a href="#"   onclick="popup_lectureBD2(); "   ><input  class="teteMenuGauche" type="button"  value="Afficher" align="center"  /> </a>								 
				            </div>
			            </div>						

					 </td></tr>
				</table>
			</aside>
		</div>
		<!-- LE PANNEAU DE DROITE :  -->
		<div class="colonne_contenu" style="padding:0;">
			<aside>
			    
				<table  class="tabledroite" style="padding-top:0;">
				     
					 <tr><td > 
                         <div class="mnayvawo"><button  class="boutoyahemnayivawo"> Acte extrait de la pr&eacute;fecture de:<span id="wilaya_" style="color:#000066;  font-size: 17px; font-style: italic; font-family: \"Times New Roman\", Georgia, Serif;" > <?php  echo  $p; ?></span> </button>   </div>					 
						 <div class="line1" style="width:98%; height:5px; margin:auto;"></div>

						 <div class="mnayvawo" style="padding:5.8em;">
                            <?php 
							//Resulat de la recherche: Une table en une seule ligne et 7 colonnes(en haut à droite)
							if(!empty($_GET['num'])){include("SERVEUR/lectureBD2_searchPlayBack.php");}
							else if(!empty($_GET['nom'])) {include("SERVEUR/lectureBD2_searchPlayBackByName.php");}
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



     
