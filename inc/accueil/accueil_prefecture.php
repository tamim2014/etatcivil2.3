<!--  Pas de DOCTYPE dans les fichiers include-->
<!--  Pas de <html> dans les fichiers include-->
<!-- NOUS SOMMES CÔTE CLIENT -->


    <meta charset="utf-8">   
     <title> </title>
	 <!-- 
	       Mais ce n est pas logique ! 
		   Il y a des dépendances qui sont appelées dans la pages sources:accueil.php
		   i fo les virer ici, les mettre dans accueil.php et tester
	 -->
		   
	 <script src="js/jquery.js"></script>
	 <script src="js/capture_items.js"></script>    <!--    <script src="js/acteOutSlide.js"></script> -->
	 <script src="js/accueil_liens_colonne5.js"></script>
	 <script src="js/accueil_commandes_panel.js"></script>
     
	  <link href="css/slide.css" rel="stylesheet" title="Style_du_Slide_pageDaccueil" />
	  <link href="css/prefecture.css" rel="stylesheet" title="boutons_Sous_Le_Slide" />
	  <link href="css/commandes_panel.css" rel="stylesheet"  /> 
	  <!-- Bloc haut du panel de commande -->
	  <!-- 
	   --   On choisi la prefecture pour afficher sa table relatif sdans le panel 
	   --
	   	<table>
			 <tr><td class="listemenu" id="flip" > 				
				<span>Acte de naissance</span> <?php include("inc/accueil/accueil_choisir_naissance.php"); ?>    <div id="panel" class="scrolbar"></div>   
                <span style="padding-right:8px">Acte de mariage</span> <?php include("inc/accueil/accueil_choisir_mariage.php"); ?>
                <span style="padding-right:14px">Acte de divorce</span> <?php include("inc/accueil/accueil_choisir_divorce.php"); ?> 
				<span style="padding-right:26px">Acte de dec&egrave;s</span> <?php include("inc/accueil/accueil_choisir_deces.php"); ?>			
			 </td></tr>  
		</table>
		--
		-->
		<table class="flip" >
		    <tr>
				<td class="listemenu" id="flip">
					<div class="blocActes">
						<div class="ligne">
							<span>Acte de naissance</span>
							<?php include("inc/accueil/accueil_choisir_naissance.php"); ?>
							
						</div>
						<div id="panel" class="scrolbar"></div>

						<div class="ligne">
							<span class="mariage">Acte de mariage</span>
							<?php include("inc/accueil/accueil_choisir_mariage.php"); ?>
						</div>
						<div class="ligne">
							<span class="divorce">Acte de divorce</span>
							<?php include("inc/accueil/accueil_choisir_divorce.php"); ?>
						</div>
						<div class="ligne">
							<span class="deces">Acte de décès</span>
							<?php include("inc/accueil/accueil_choisir_deces.php"); ?>
						</div>
					</div>
				</td>
		    </tr>
		</table>

		<!-- Bloc bas: le petit menu sous le panel [qui appelle une nouvelle table: voir la 5ème colonne du slide]-->
		<div id="commandePanel" >
			<!-- Solution jQuery -->
			<a id="zima"    href="backend/colonne_supprimer_acte.php"> <input type="button"  value="Supprimer"  class="boutonSupprimer"/></a> 
			<a id="rectif"  href="backend/colonne_rectifier_acte.php"> <input type="button"  value="Rectifier"  class="boutonRectifier"/></a>
			<a id="print_"  href="backend/colonne_imprimer_acte.php" >  <input type="button"  value="Imprimer"    class="boutonImprimer"/></a> 
			<a id="trier"   href="backend/trier.php"> <input  type="button"  value="Ordre alphabétique"  class="boutonTrier"/></a> 

			<!-- Solution AJAX 
			<a id="zima"    href="#"  onclick="showSupprimer()> <input type="button"  value="Supprimer"  class="boutonSupprimer" /></a> 
			<a id="rectif"  href="#"  onclick="showRectifier()> <input type="button"  value="Rectifier"  class="boutonRectifier" /></a>
			<a id="print_"  href="#" onclick="showImprimer()">  <input type="button"  value="Imprimer"    class="boutonImprimer" /></a> 
			-->
		</div>
		
		<!-- ✅ Pour les messages - Boite de dialogue sur les btn Supprimer/Rectifier -->
		<div id="dialogBox">
			<div id="dialogContent">
				<p id="dialogMessage"></p>
				<button onclick="closeDialog()">OK</button>
			</div>
		</div>

		
		
		
		
		










