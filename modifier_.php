<?php
//1.Construction des variables php, pour recuperer les données transmises par la page "lectureBD.php"
$id = $_GET["n"];

$nom_=$_GET["nom_"];
$prenom_=$_GET["prenom_"];
$acte_=$_GET['acte_'];
$rappel = '<b style="text-align:center"><i> <u>Document &agrave; rectifier</u></i> </b>  <br><br> <i><b>Nom :</b></i> '.$nom_.' <br> <i><b>Pr&eacute;nom :</b></i> '.$prenom_.' <br> <i><b>Acte num&eacute;ro:</b></i> '.$acte_.'';

 // echo '<div class="rappel">'.$rappel.'</div>' ;


//2.Requ�te SQL requ�te

try {
    $conn = new PDO(
        'mysql:host=localhost;dbname=etatcivil;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch(Exception $e) {
    die('Erreur de connexion à la base de données: '.$e->getMessage());
}
	
	$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
	$donnees = $reponse->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	 <meta charset="utf-8"> 
	 <script src="js/ecritureBD.js"></script>
	 <title> Acces en Ecriture a la base etatcivil</title>
	 <link href="css/template.css"  rel="stylesheet" type="text/css" >
	 <link href="css/accueil22.css" rel="stylesheet"   />
		 
	 <link href="css/slide.css"     rel="stylesheet"   /> 
	 <link href="css/dropdown.css"  rel="stylesheet"    />
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />  <!-- pour les bouton du panneau central -->
	 <link href="css/ecritureBD.css" rel="stylesheet" title="Style" />
	 	  
	 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	 <script type="text/javascript">
	 //affiche l'acte modifié dans la partie droite de la page modifie_.php( OK mais ça sert à rien i fo ouvirere tout ça)
		$(function(){
			$(' a #acteAJAX').click(function(e){
				$('.showacte').load($(this).attr('href'));
				e.preventDefault();
			});
			//$('.tab a:first').trigger('click'); // Affiche la page1 par défaut
		});
	 </script>
</head>

<body>
	<header>
		<div class="en-tete">
			<div class="hollowTop"   >				   
			   <input type=image src="img/drapeau.png" align="left" class="flag" />
			   <p class="text_header">OFFICE   <br> D'&Eacute;TAT CIVIL </p>			  
			</div> 
		</div>		
		<div class="menu topnav"  id="myTopnav"> 
			<ul>
			  <li style="width:auto; color:inherit;">.</li>
			</ul> 
		</div>
    </header>
	<div class="contenu">
		<form action ="" method="post" name="form1" >
		  <!-- LE PANNEAU DE GAUCHE :  -->
		  	<div class="colonne_laterale" style="width: 33%; ">
			    <aside style="padding: 1.5em 0 0 0; background:inherit; ">
					<table class="tablegauche"  name="listes" style="min-height:24.5em; " >
						<caption  style="caption-side:top; box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;  "> 
							<font color="gray" style="line-height:2;">
								<h3> UNION DES COMORES  </h3>
								<h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6>
								<h4> MINISTERE DE L'INTERIEUR  </h4>
							</font>
							<img src="img/armoirie.png"  style="z-index:3;   transform: translate(120%, 0); "  />
						</caption>
						<input type="hidden" name="suprim" value=" <?php echo $id;?> " /> 
						<tr>
						    <td> Pr&eacute;fecture: </td> 
							<td> 
                                <select  name="prefecture" onChange="changement(this)"  >
									 <optgroup label="Ngazidja"> 
									 <option value="<?php echo $donnees["prefecture"];?>"   >  <?php echo $donnees["prefecture"];?> </option>
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
									 <optgroup label="Anjouan"  >           
									 <option>Mutsamudu </option>
									 <option>Ouani </option> 
									 <option>Domoni </option>
									 <option>Mremani </option>
									 <option>Sima </option> 
									 <optgroup label="Mayotte"  disabled>           
									 <option>Dzaoudzi </option>
									 <option>Pamandzi </option> 
									 <option>Mtsapere </option>
									 <option>Mtsamboro </option>
									 <option>Mamoudzou </option>  
									 </optgroup>		 
									 </optgroup>
								</select>
						    </td>
						</tr>
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Centre d'Etat Civil:</b></font></td>
						</tr>
						<tr>
							<td>Centre</td> 
							<td> 
								<select  name="centretatcivil" required >
									<option value="<?php echo $donnees["centretatcivil"];?>"> <?php echo $donnees["centretatcivil"];?> </option>
								</select>
							</td>
						</tr>
						<tr>
						    <td> Registre</td> 
							<td><input type="text" name="registre"  value="<?php echo $donnees["registre"];?>" > </td>
						</tr>
						<tr>
						    <td> Acte</td> 
							<td> <input type="text" name="acte"  value="<?php echo $donnees["acte"];?>" required></td>
						</tr>
						<tr>
						    <td> Du(date) </td> 
							<td> <input type="date" name="date_acte" value="<?php echo $donnees["date_acte"];?>" ></td>
						</tr>
						<tr>
						    <td></td> 
							<td></td>
						</tr>
						 
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Naissance de:</b></font></td>
						</tr>
						<tr>
						    <td> Nom </td> 
							<td> <input type="text" name="nom" value="<?php echo $donnees["nom"];?>" > </td>
						</tr>
						<tr>
						    <td> Pr&eacute;nom  </td> 
							<td> <input type="text" name="prenom" value="<?php echo $donnees["prenom"];?>" ></td>
						</tr>
						<tr>
						    <td></td>
							<td><font color="##1D702D"> <b>Pour acte certifi&eacute; conforme</b></font></td>
					    </tr>
						<tr>
						    <td> D&eacute;livr&eacute; &agrave; </td>
							<td> <input type="text" name="delivre_a" value="<?php echo $donnees["delivre_a"];?>" required ></td>
						</tr>
						<tr>
						    <td> Le </td>
							<td> <input type="text" name="delivre_le" value="<?php echo $donnees["delivre_le"];?>"  required ></td>
						</tr>
						<tr>
						    <td> L'an </td> 
							<td> <input type="text" name="delivre_an"  value="<?php echo $donnees["delivre_an"];?>" required > </td>
						</tr>
						<tr>
						    <td> S&eacute;rie Num  </td>
							<td> <input type="text" name="num_serie" value="<?php echo $donnees["num_serie"];?>" required  ></td>
						</tr>
					</table>
				</aside>
			</div><!-- div.colonne_laterale  -->
					 
		    <!-- LE PANNEAU DE CENTRAL : -->
		    <div class="colonne_contenu" style="padding:0; width: 40%;">
			    <aside style="padding: 1.5em 0 0 0; background:#ececea;">
                   	<table  class="tabledroite" >
						 <p class="showacte"> <!-- Pour afficher l'acte modifié dans la partie droite de la page modifie_.php  -->
							 <tr> <td> <input type="text" name="naissance_jour_moi"  value="<?php echo $donnees["naissance_jour_moi"];?>" placeholder=" Le" > </td>
							 <td> <input type="text" name="naissance_an"  value="<?php echo $donnees["naissance_an"];?>" placeholder=" ici l'an"> </td></tr>
							 <tr> <td> <input type="text" name="naissance_heure"  value="<?php echo $donnees["naissance_heure"];?>" placeholder=" heure" > </td>
							 <td> <input type="text" name="naissance_minuite" value="<?php echo $donnees["naissance_minuite"];?>" placeholder=" minuite" > </td></tr>
							
							 <tr> <td> <input type="text" name="naissance_nom_prenom"  value="<?php echo $donnees["naissance_nom_prenom"];?>" placeholder="est n&eacute;(e)"  ></td></tr>
							 <tr> <td> <input type="text" name="naissance_lieu"  value="<?php echo $donnees["naissance_lieu"];?>" placeholder=" &agrave;(lieu)"  > </td></tr>
							 <tr> <td> <input type="text" name="naissance_sexe" value="<?php echo $donnees["naissance_sexe"];?>" placeholder=" du sexe"  > </td></tr>
							 
							 <tr> <td> <font color="##1D702D"><b>Le p&egrave;re</b></font></td> <td> </td></tr>
							 <tr> <td> <input type="text" name="pere_nom_prenom"  value="<?php echo $donnees["pere_nom_prenom"];?>" placeholder=" fils(fille) de"     > </td></tr>
							 <tr> <td> <input type="text" name="pere_datenaisance"  value="<?php echo $donnees["pere_datenaisance"];?>" placeholder=" n&eacute; le"  > </td></tr>
							 <tr> <td> <input type="text" name="pere_lieunaissance"     value="<?php echo $donnees["pere_lieunaissance"];?>" placeholder=" n&eacute; &agrave;"  >      </td></tr>
							 <tr> <td> <input type="text" name="pere_profession"      value="<?php echo $donnees["pere_profession"] ;?>" placeholder=" profession "   > </td></tr>
							 <tr> <td> <input type="text" name="pere_villederesidence"    value="<?php echo $donnees["pere_villederesidence"] ;?>" placeholder=" demeurant &agrave;"  > </td></tr>
							
							<tr><td> <font color="##1D702D"><b>La m&egrave;re</b></font></td> <td> </td></tr>
							 <tr> <td> <input type="text" name="mere_nom_prenom"            value="<?php echo $donnees["mere_nom_prenom"];?>"  placeholder=" et de"   > </td></tr>
							 <tr> <td> <input type="text" name="mere_datenaisance"  value="<?php echo $donnees["mere_datenaisance"];?>"  placeholder="n&eacute;e le"     > </td></tr>
							 <tr> <td> <input type="text" name="mere_lieunaissance"      value="<?php echo $donnees["mere_lieunaissance"];?>"   placeholder=" &agrave;"     > </td></tr>
							 <tr> <td> <input type="text" name="mere_profession"       value="<?php echo $donnees["mere_profession"] ;?>"    placeholder=" profession"     ></td></tr>
							 <tr> <td> <input type="text" name="mere_villederesidenc"   value="<?php echo $donnees["mere_villederesidenc"] ;?>" placeholder=" demeurant &agrave;"   > </td></tr>
							 
							 <tr><td> <font color="##1D702D"><b>La d&eacute;claration</b></font></td> <td> </td></tr>
							 <tr> <td> <input type="text" name="declaration_faite_par"   value="<?php echo $donnees["declaration_faite_par"];?>" placeholder=" faite par:"  > </td></tr>
							 <tr> <td> <input type="text" name="datejugement"   value="<?php echo $donnees["datejugement"];?>" placeholder=" date jugement :"  > </td></tr>
							 <tr> <td> <input type="text" name="declaration_recue_pa"  value="<?php echo $donnees["declaration_recue_pa"];?>" placeholder=" re&ccedil;ue par"  > </td></tr>
						 </p>
						 <tr> 
							 <td><a id="acteAJAX" href="afficher.php?n=<?php echo $donnees["ID"];?> "   onclick=" window.open(this.href, 'Popup', 'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 '); return false; "     ><input type="button"  value="Afficher l'acte" align="center"  style="background-color: #cdbe9f;"   /></a></td>
							 <td><a href="imprimer.php?n=<?php echo $donnees["ID"];?> "><input type="button"  value="Imprimer l'acte" align="center"  style="background-color: #cdbe9f;"/></a></td>
						 </tr>
					</table>
			    </aside>
			</div>

		    <!-- LE PANNEAU DE DROITE :  -->
		    <div class="colonne_laterale" style="width: 25%; ">
				<aside style="padding: 1.5em 0 0 0; background:inherit;">
				    <table  class="tablecentre" >
						<tr><td> 
							  <?php include("inc/ecriture/ecritureBD_edit_menudroite1.php"); ?>
						</td></tr>     
					</table>
		        </aside>
				<aside style="padding: 1.5em 0 0 0; background:inherit;">
				    <table  class="tablecentre" >
						<tr><td> 
							  <?php include("inc/ecriture/ecritureBD_edit_menudroite2.php"); ?>
						</td></tr>     
					</table>
		        </aside>
				<aside style="padding: 1.5em 0 0 0; background:inherit;">
				    <table  class="tablecentre" >
						<tr><td> 
							  <?php  echo '<div class="rappel">'.$rappel.'</div>' ;   ?>
						</td></tr>     
					</table>
		        </aside>
			</div><!-- 2�me div.colonne_laterale -->
		</form>
	</div><!-- div.contenu -->
	<div class="footer">
        Pied de Page
    </div>
	<script>		
		document.getElementByClassName("rediriger").addEventListener("click", function() {
			 document.location.replace("accueil.php");
		});
	</script>
</body>
</html>

<?php include("SERVEUR/modifier_insertionSQL.php"); ?>  