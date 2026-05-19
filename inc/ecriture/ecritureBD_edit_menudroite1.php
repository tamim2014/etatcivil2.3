 <?php
 echo '<div id="menudroite">
        
			<a href="accueil.php" class="linkhome2"> 
				<div  class="kangalaheMenu">  
				   <input type="button" class="btnHover writeBtn" value="Accueil"  /> 
				</div>     
			</a>
			<div class="kangalaheMenu">			  
					<a id="acteAJAX" href="afficher.php?n=' . $donnees["ID"] . '" onclick="return ouvrirPopupEcritureBD(this);">
						<input class="btnWrite"  type="button"  value="Afficher" align="center"  />
					</a>
			 </div>		
			
			<div class="kangalaheMenu">
				  <a href="#"><input type="button" class="btnWrite"  value="Recommencer"   align="center" /></a>
			 </div>
			 
			 <div class="kangalaheMenu">  
				 <a href="ecritureBD.php"><input type="button" class="btnWrite" name="enregistrer_" value="Nouveau document"/></a>					
			 </div>
	   </div>
';
?>	 
        
		
     