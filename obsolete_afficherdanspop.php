<?php
session_start(); // Transmettre l'identifiant par une variable session(et nom par la variable $_GET) sinon PROBLEME:il faudra rechArger la page pour réactualiser la POPUP. Et j'ai passé 2 jour sans pouvoir resoudre ce probleme. Heureusemen la varible $_SESSION['identifiant ] résoud ce probleme de mémoire-cache qui renvoie tjrs l'ancien acte de naissance dans la popup de la page parent(page d'appel) 
include("backend/pop.php");
/*
 * backend/pop.php
 *
 * require_once 'connection_PDO.php';
 
 * $sql = 'SELECT * FROM liste WHERE ID='.$_SESSION['identifiant'];
 * $req = $conn->query( $sql );
 * $donnees = $req->fetch();
*/

?>


<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
     <title>Pop relatif à la page affichée suite à une recherche par Numero/Nom(lecturetureBD2.php) </title>
	 <link href="css/afficher.css" rel="stylesheet" title="Style" /> 
     <style>
	     input { border:none; }		 
     </style>	 
</head>

<body>
<div id="wrap">

<table border="1" align="center"  style="border-collapse:collapse" bordercolor="#111111" width="80%" >
  
   <tr>
        <td align="center" VALIGN="top">
	       <h2>UNION DES COMORES</h2> 
		   <h6>Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement<h6> 
		   <h3>MINISTERE DE L'INTERIEUR</h3> 
		   <img src="img/armoirie.png"  />
 		   
		   <h4> Pr&eacute;fecture de: </h4> 		   
		   <input type="text"  style="margin-left:-95px; margin-bottom:0;"  value="<?php echo $donnees["prefecture"];?>"  >		   
		   <hr style="margin-top:0;" />
		   
		   <h4>Centre d'Etat Civil de: </h4>  
		   <input type="text"  style="margin-left:-95px; margin-bottom:0;"  value="<?php echo $donnees["centretatcivil"];?>" > 
		   <hr style="margin-top:0;" /> 
		   <div style="margin-left:10px;">
		        <h6 align="left" style="line-height:0;">			    
				      <input type="text"   style="margin-left:65px;"  value="<?php echo $donnees["registre"];?>" ><br>
				      Registre N° ------------------------------				 
				</h6>
				<h6 align="left">
				    <p style="line-height:0; ">
				      <input type="text"   style="margin-left:65px;"  value="<?php echo $donnees["acte"];?>" ><br>
				      Acte N° -----------------------------------
				    </p>
				    <p style="line-height:0; ">
				      <input type="text"  style="margin-left:65px;" value="<?php echo $donnees["date_acte"];?>" ><br>
				      Du -----------------------------------------
					</p>
				</h6>
			</div>
		</td>
      
	    <td  align="left"  rowspan="2" >
	        <h1 align="center"  style="color: white; text-shadow: 2px 2px 4px #1D702D;">ACTE DE NAISSANCE</h1>
		    <div style="margin-left:10px;">
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:85px; " value="<?php echo $donnees["naissance_jour_moi"];?>"  ><br>
					Le -------------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0;">		 
					<input type="text"  style="margin-left:85px;" value="<?php echo $donnees["naissance_an"];?>" ><br>
					et l'an ---------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:20px;" value="<?php echo $donnees["naissance_heure"];?>"><input type="text"  style="margin-left:30px;" value="<?php echo $donnees["naissance_minuite"];?>"><br>
					&agrave; --------------------------heure(s) --------------------------------minute(s)<br><br>
				 </p>
				 <p style="line-height:0; margin-top:3em; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_nom_prenom"];?>"><br>
					est n&eacute;(e) ------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_lieu"];?>"><br>
					&agrave; ---------------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_sexe"];?>"><br>
					du sexe -------------------------------------------------------------------------<br><br><br>
				 </p>
				 <p style="line-height:0; margin-top:3em;  ">		
					<input type="text"  style="margin-left:120px;"  value="<?php echo $donnees["pere_nom_prenom"];?>"><br>
					fils(fille de) --------------------------------------------------------------------<br>
				 </p> 
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_datenaisance"];?>"><br>
					n&eacute(e) le ------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_lieunaissance"];?>" ><br>
					&agrave; ---------------------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_profession"] ;?>" ><br>
					Profession ---------------------------------------------------------------------<br>
				 </p>
				 <p style="line-height:0; ">
					<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_villederesidence"] ;?>" ><br>
					Démeurant &agrave; -----------------------------------------------------------------<br>
				 </p>
				 <p align="left" style="margin-top:3em;" >
					<p style="line-height:0; ">
						<input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_nom_prenom"];?>"><br>
						et de ----------------------------------------------------------------------------<br>
					</p> 
					<p style="line-height:0; ">
					   <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_datenaisance"];?>" ><br>
					   n&eacute;(e) le -------------------------------------------------------------------------<br>
					</p>
					   <p style="line-height:0; ">
					   <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_lieunaissance"];?>" ><br>
					   &agrave; ---------------------------------------------------------------------------------<br>
					</p>
					<p style="line-height:0; ">
					  <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_profession"] ;?>" ><br>
					  Profession ---------------------------------------------------------------------<br>
					</p>
					<p style="line-height:0; padding-bottom:1em;">
					  <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_villederesidenc"] ;?>" ><br>
					  Démeurant &agrave; -----------------------------------------------------------------
					</p>
				 </p>
		    </div>
	    </td>
    </tr>
   
   <tr>
        <td align="center" rowspan="2"  >
	        <h4> Naissance de:</h4> <br>
			
			   <input type="text"  style="margin-left:-95px; margin-bottom:0;"  value="<?php echo $donnees["nom"];?>">
			   <hr style="margin-top:0;" />
			
			   <input type="text"  style="margin-left:-95px; margin-bottom:0;"  value="<?php echo $donnees["prenom"];?>">
			   <hr style="margin-top:0;" /><br>
	    </td>
   </tr>
   
   <tr height="20px">             
	   <td  rowspan="2">
			 <p align="left">
			<div style="margin-left:10px; line-height:0;">
			  
			  <h4 align="center"> D&eacute;claration faite par:</h4> 
			 
			  <input type="text"  style="margin-left:85px; " value="<?php echo $donnees["declaration_faite_par"];?>" >		  
			  <br>----------------------------------------------------------------------------------------------------------------------<br> 
			 <p>
			  <input type="text"  style="margin-left:85px;"  value="<?php echo $donnees["datejugement"];?>"  >
			  <br>----------------------------------------------------------------------------------------------------------------------<br>
			 </p> 
			  
			  <h4 align="center"> D&eacute;claration re&ccedil;ue le:</h4> 
			  <input type="text"  style="margin-left:85px;" value="<?php echo $donnees["declaration_recue_pa"];?>" >
			  <br>----------------------------------------------------------------------------------------------------------------------<br>

			  <br>----------------------------------------------------------------------------------------------------------------------<br><br>
			</div>
		  </p>
	   </td>
   </tr>
   
   <tr>
      <td align="left" >
	     <h4 align="center"> Pour acte certifi&eacute; conforme:</h4> 
		 <div style="margin-left:10px;">
		 <p style="line-height:0; ">
		    <input type="text"  style="margin-left:95px;"  value="<?php echo $donnees["delivre_a"];?>" ><br><b>
		    D&eacute;livr&eacute; &agrave; ----------------------------------------<br>
		</p>
		<p style="line-height:0; ">
		    <input type="text"  style="margin-left:95px;"  value="<?php echo $donnees["delivre_le"];?>" ><br>
		    Le ------------------------------------------------<br>
		</p>
		<p style="line-height:0; ">
		   <input type="text"  style="margin-left:95px;"   value="<?php echo $donnees["delivre_an"];?>"><br>
		   L'an ----------------------------------------------<br>
		 </p>
		 </div>
		 <p > <h4  align="center"> L'officier de l'Etat Civil:</h4></p>	  
	  </td>
   </tr>
</table>
        
</div>
</body>
</html>
