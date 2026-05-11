<?php
   include("backend/searchMessages.php"); 	
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Accueil </title>
	<link href="css/template.css"  rel="stylesheet" type="text/css" >
	<link href="css/accueil22.css" rel="stylesheet"/>
    <link href="css/slide.css"     rel="stylesheet"/>
	<link href="css/dropdown.css"  rel="stylesheet"/>
	<link href="css/searchEngine.css"  rel="stylesheet"/>
	<link href="css/responsiveTopnav.css" rel="stylesheet" title="Style" />
	<link href="css/responsiveAccueil.css"  rel="stylesheet"/>
	<style>
	    /* Les 4 btn du commande panne */
		/* label qui virent au vert sur ecritureBD.php => point virgule oublié  */
		 #commandePanel   {
			display: table;
			min-width:100%;
			padding:8px 14px 18px 14px !important;
			line-height:2;
		 }
         #commandePanl  a {
			/* Impossible . Pourquoi? */
			border-bottom:1px solid #c3c3c3 !important;
		 }
         #commandePanl  a:last-child {
           /*
		   magin-bottom:0;
		   */
		 }		 
			
		#commandePanl  a, #commandePanl  a input{	
			padding:10px;
			background: #e5eecc;
			color: #111;
			border-radius: 5px;
			text-decoration: none;
			transition: background-color .25s ease, opacity .25s ease;
		}
		#commandePanel a input:hover, #commandePanel a:hover {
			 background-color: #eff !important;		
		.tabledroite{
			background: #e5eecc;
		}
		
		
	</style>

	
    <!-- ✅ Pour les messages - Boite de dialogue et les Popup -->
	<script src="js/dialogueBox.js"></script>
	<!-- ✅ Ouverture du panel -->
	<script src="js/jquery.js"></script>

	<!-- <script src="js/lectureBD.js"></script> -->
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
				<?php include("inc/accueil/accueil_menucentral.php"); ?> 
		</div>
    </header>
    <div class="contenu" style="margin-bottom:0;">
	    <form action ="" method="POST" name="form1" >
			<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->
			<div class="colonne_laterale" style=" margin-bottom:0; padding-bottom:0; height:auto;">
				<aside class="aside1">
					<table class="tablegauche" style="margin-bottom:0; padding-bottom:0; height:24em; "  > <!-- height:24em;  -->
					    <!-- <caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;  ">  -->
						<caption  style="caption-side:top; box-shadow: 0 20px 65px #cdbe9f inset;"> 
						    <font color="gray" style="line-height:2;">
								 <h3> UNION DES COMORES  </h3>
								 <h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								 <h4> MINISTERE DE L'INTERIEUR  </h4>
							 </font>
							
							<!--  <img src="img/armoirie.png" style="z-index:3; transform: translate(210%, 0);  "  /> -->
							  <img src="img/armoirie.png" style="z-index:3;  margin-left:40%; margin-right:40%; width:20%;  " /> 
						 </caption>
						 <tr> <td id="recherchedocument">RECHERCHE DE DOCUMENT</td></tr>
						  <tr><td> <font color="#cdbe9f"><b>Search by</b></font> number<br/> <input style="width:50%;" id="recherchenum" type="text" name="acte_" pattern=".{1,}"> </td></tr>
						  <tr><td> <font color="#cdbe9f"><b>Search by</b></font> name    <br/> <input style="width:50%;" id="recherchenom" type="text" name="nom_"> </td></tr>
						 
						 <tr><td style="padding-top:1em;">
							 <textarea class="t_area" style="font-size:1em" name="myTextBox" cols="24" rows="4"> <?php echo $message ; ?> </textarea>
						 <br/><input class="btnHover" type="submit" name="envoie" value="Chercher"  style="background:transparent ; color:#111; padding:.3em 3.3em; margin:1em auto; " />
						 </td></tr>
					</table>					 
				</aside>
			</div>
			<!-- LE PANNEAU DE DROITE : Recher des document par liste déroulante -->
			<div class="colonne_contenu" style="padding:0;">
				<aside class="aside2">
					<table  class="tabledroite" >
			            <tr><td class="listemenu">
 						    <?php include("inc/accueil/accueil_prefecture.php"); ?> 
						</td></tr> 
		            </table>
				</aside>
			</div>
		</form>
    </div>     
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
</body>
</html>




 

