<?php 
   session_start();  //echo "Acte<br>".$_SESSION["showInPop"]; 
  /*
   * Cet include etait en bas: sous </htmtl>
   * Mais en bas il provoque une remontée du footer
   *
   * header('Location: ecritureBD.php');//Warning: Cannot modify header information - headers already sent by
   * 
   *
   * EN PLUS LES MESSAGES NE S'AFFICHENT PAS: Je sais pas pourquoi
   */
   include("backend/verif_num_acte.php"); 
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
	 <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes"> <!-- local storage -recup Acte n° pour transmission à la pop -->
	 <title> Acces en Ecriture &aacute; la base etatcivil</title>
	 <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"   />
	 
	 <link href="css/slide.css"     rel="stylesheet"   /> 
	 <link href="css/dropdown.css"  rel="stylesheet"    />
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />  <!-- pour les bouton du panneau central -->
	 <link href="css/ecritureBD.css" rel="stylesheet" title="Style" />
     <style>

		 /* Agrandir les champs de saisie dans le panneau centrale */
		 body div.contenu form div.colonne_contenu aside table.tabledroite  tr td input{
			 padding:.5em .5em ;
			 margin-bottom:.3em ;
		 }
	     		 
	 </style>	 
     

	 <script src="js/jquery.js"></script>
	 <script src="js/ecritureBD.js"></script>
</head>

<body>
	<!-- <div id="acteN"></div> -->
	<header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type=image src="img/drapeau.png" align="left" class="flag" />
			   <p class="text_header" style="padding-left:23%;">OFFICE   <br> D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			<?php include("inc/accueil/accueil_menucentral_ecriture.php"); ?> 
		</div>
    </header>
	<div class="contenu" style="margin-bottom:0;">
		<form action ="backend/ecritureBD_insertionSQL.php" method="post" name="form1" >
			<!-- LE PANNEAU DE GAUCHE :  -->
			<div class="colonne_laterale" style="width: 33%;  " >
				<aside class="aside1" style="padding:0 !important;  " >			    
		            <!-- ❌ include("inc/ecriture/ecritureBD_panodegauche.php"); ❌ ça donne un espace fantôme en haut -->
					  <table class="tablegauche"  name="listes" style="margin:0 !important;"> 
						  <caption  style="caption-side:top; box-shadow: 0 40px 65px #cdbe9f inset; "> 
							<font color="gray" style="line-height:2;">
								<h3> UNION DES COMORES  </h3>
								<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement </h6>
								<h4> MINISTERE DE L\'INTERIEUR  </h4>
							</font>
							<img src="img/armoirie.png"  style="z-index:3;   margin-left:40%; margin-right:40%; width:20%; "  />
						 </caption>	  
						 <tr>
						   <td><br> Pr&eacute;fecture: </td>
						   <td><br>  
								<select  name="prefecture"  onChange="changement(this)"  >
									 <optgroup label="Ngazidja"> 
									 <option> </option>
									 <option>Moroni-Bambao </option>
									 <option>Hambou </option> 
									 <option>Mbadjini-Ouest </option>
									 <option>Mbadjini-Est </option>
									 <option>Oichili-Dimani </option>  
									 <option>Hamahamet-Mboinkou </option>  
									 <option>Mitsamiouli-Mboude </option> 
									 <option>Itsandra-Hamanvou </option>
									 </optgroup>
									 <optgroup label="Moheli">      
									 <option>Fomboni </option>
									 <option>Nioumachoi </option> 
									 <option>Djando </option>
									 </optgroup>
									 <optgroup label="Anjouan">           
									 <option>Mutsamudu </option>
									 <option>Ouani </option> 
									 <option>Domoni </option>
									 <option>Mremani </option>
									 <option>Sima </option>  
									 </optgroup>
									 
									 <optgroup label="Mayotte"  disabled>           
									 <option>Dzaoudzi </option>
									 <option>Pamandzi </option> 
									 <option>Mtsapere </option>
									 <option>Mtsamboro </option>
									 <option>Mamoudzou </option>  
									 </optgroup>
								</select>
							</td>
						 </tr>
						 <tr>
							 <td></td>
							 <td><font color="##1D702D"> <b>Centre d\'Etat Civil:</b></font></td>		
						 </tr>
						 <tr>
							 <td>Centre</td> 
							 <td> 
								 <select  name="centretatcivil"  required>
									 <option> </option>
								 </select>
							 </td>
						 </tr>
						 <tr><td> Registre  </td> <td> <input type="text" name="registre" required> </td></tr>
						 <tr><td> Acte N°  </td> <td> <input type="text" name="acte" required ></td></tr>
						 <tr><td> Du(date)  </td> <td> <input type="date" name="date_acte" required ></td></tr>
						 <tr><td></td> <td></td></tr>
						 
						 <tr><td> </td><td><font color="##1D702D"> <b>Naissance de:</b></font></td> </tr>
						 <tr><td> Nom   </td> <td> <input type="text" name="nom" required> </td></tr>
						 <tr><td> Pr&eacute;nom  </td> <td> <input type="text" name="prenom" required ></td></tr>
						 <tr><td> </td><td><font color="##1D702D"> <b>Pour acte certifi&eacute; </b></font></td></tr>
						 <tr><td> D&eacute;livr&eacute; &agrave; </td> <td> <input type="text" name="delivre_a" required></td></tr>
						 <tr><td> Le  </td> <td> <input type="date" name="delivre_le" required></td></tr>
						 <tr><td> L'an  </td> <td> <input type="text" name="delivre_an"> </td></tr>
						 <tr><td > S&eacute;rie Num:  <br><br></td> <td> <input type="text" name="num_serie" required><br><br></td></tr>
					 </table> 

                </aside>
			</div><!--  fin colone_leterale -->
			 <!-- LE PANNEAU CENTRAL   -->
            <div class="colonne_contenu" style="padding:0; width: 40%;">
			     <aside class="aside2">
					<table class="tabledroite showacte"  >
					    <!-- <p class="showacte">  Pour afficher l'acte modifiÃ© dans la partie droite de la page modifie_.php  -->
							<tr> 
								 <td> <input type="text" name="naissance_jour_moi"  placeholder=" Le" > </td>
								 <td> <input type="text" name="naissance_an"  placeholder=" ici l'an"> </td>
							</tr>
							<tr> 
								 <td> <input type="text" name="naissance_heure"  placeholder=" heure"> </td>
								 <td> <input type="text" name="naissance_minuite"  placeholder=" minuite" > </td>
							</tr>
							
							 <tr> <td> <input type="text" name="naissance_nom_prenom" placeholder="est n&eacute;(e)" ></td></tr>
							 <tr> <td> <input type="text" name="naissance_lieu"  placeholder=" &agrave;(lieu)" > </td></tr>
							 <tr> <td> <input type="text" name="naissance_sexe"   placeholder=" du sexe" > </td></tr>
							 
							 <tr><td> <font color="##1D702D"><b>Le p&egrave;re</b></font></td><td> <font color="##1D702D"><b>La m&egrave;re</b></font></td> </tr>
							  
							 <tr> <td> <input type="text" name="pere_nom_prenom"  placeholder=" fils(fille) de" >         <td> <input type="text" name="mere_nom_prenom"  placeholder=" et de" > </td> </td></tr>
							 <tr> <td> <input type="text" name="pere_datenaisance"  placeholder=" n&eacute; le"> </td>    <td> <input type="text" name="mere_datenaisance"  placeholder="n&eacute;e le"  > </td> </tr>
							 <tr> <td> <input type="text" name="pere_lieunaissance"   placeholder=" n&eacute; &agrave;" > </td>   <td> <input type="text" name="mere_lieunaissance"      placeholder=" &agrave;"> </td></tr>
							 <tr> <td> <input type="text" name="pere_profession"    placeholder=" profession "   > </td>  <td> <input type="text" name="mere_profession"       placeholder=" profession" ></td></tr>
							 <tr> <td> <input type="text" name="pere_villederesidence"   placeholder=" demeurant &agrave;"  > </td> <td> <input type="text" name="mere_villederesidenc"   placeholder=" demeurant &agrave;"> </td></tr>
					


							 <!-- <tr><td> <font color="##1D702D"><b>La m&egrave;re</b></font></td> </tr> -->
							 <!-- <tr> <td> <input type="text" name="mere_nom_prenom"  placeholder=" et de" > </td></tr> -->
							 <!-- <tr> <td> <input type="text" name="mere_datenaisance"  placeholder="n&eacute;e le"  > </td> </tr> -->
							 <!-- <tr> <td> <input type="text" name="mere_lieunaissance"      placeholder=" &agrave;"> </td> </tr> -->
							 <!-- <tr> <td> <input type="text" name="mere_profession"       placeholder=" profession" ></td></tr> -->
							 <!-- <tr> <td> <input type="text" name="mere_villederesidenc"   placeholder=" demeurant &agrave;"> </td> </tr> -->
							 


							 <tr><td> <font color="##1D702D"><b>La d&eacute;claration</b></font></td> </tr>
							 <tr> 
								 <td> <input type="text" name="declaration_faite_par" placeholder=" faite par:"> </td>
								 <td style="text-align: left; margin-left:10px;"> <span style=" margin-left:90px;" >  Emetteur jugement</span></td>
							 </tr>
							 <tr> 
								 <td > <input type="text" name="declaration_recue_pa" placeholder=" re&ccedil;ue par"> </td>
								 <td style="text-align: left; margin-left:10px;"> <span style=" margin-left:90px;" >  Titre  recepteur</span></td>
							 </tr>
							 <tr> 
								 <td> <input type="date" name="datejugement" placeholder=" date jugement : " style="height:15px;"> </td>
								 <td style="text-align: left; margin-left:10px;"> <span style=" margin-left:90px;" >Date  jugement</span></td>
							 </tr>
						 </p>
						 <tr> 
							<td>
								 <!-- recuperer  une veriable javascripte +actesaisi+  en php -->
								<?php 
								    //if(!isset($_SESSION['acte_saisi'])) $valeurphp= $_SESSION['acte_saisi'];   +sieurs 10zaines de jour de galere!!! alors que la solution été si simple! Trouvé vend 25.09.16 à 16h50 à cité des sicience. shukran li l'ALLAH.   
								    $valeurphp = "";
									if (!empty($_SESSION['acte_saisi'])) { 
										$valeurphp = $_SESSION['acte_saisi']; // 🎁
									}
								?>
								<a id="acteAJAX" href="afficher2.php?n=<?php echo $valeurphp; ?>"   onclick="  window.open(this.href, 'Popup', 'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 '); return false; " >
									<input type="button"  value="Afficher l'acte" align="center"  style="background-color: #cdbe9f; margin-top:2em;" />  
								</a>
							</td>
							
							    <?php 
							        //if(!isset($donnees["ID"])) $donnees["ID"]=1; 
                                    $id_document = $_SESSION['id_document'] ?? ""; // 🎁
							    ?>
							<td> <a  href="imprimer.php?n=<?php echo $id_document; ?> "  ><input type="button"  value="Imprimer l'acte" align="center"  style="background-color: #cdbe9f; margin-top:2em; "/></a></td>
						 </tr>
					</table>
				    <?php
					    if (!empty($_SESSION['message'])) {
						    echo "<div style='color:green; text-align:center; font-weight:bold;'>".$_SESSION['message']."</div>";
						    unset($_SESSION['message']);
					    }
					?>
				</aside>
				
			</div><!-- Fin PANNEAU CENTRALE -->
			<!-- LE PANNEAU DE DROITE: -->
			<div class="colonne_laterale" style="width: 25%; ">
				<aside class="aside1">			    
		            <table  class="tablemenu" style="min-height:35.5em; " >    
						<tr><td>
							<?php include("inc/ecriture/ecritureBD_menudroite.php"); ?>
						</td></tr>
					</table>
            	</aside>
			</div>
		</form>	
		
	</div><!-- div.contenu -->
    <div class="footer" style="text-align:left; ">
        <span ><span style="color:#555;">2026 &copy; -</span> <span style="color:#333;">Etat civil</span></span>
    </div>	
</body>
</html>





  

