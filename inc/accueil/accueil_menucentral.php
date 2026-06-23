<?php
 echo '
  
	<ul style="margin-left:28%;" id="hamburguer">
	  <li class="dropdown"  >
		<button class="dropbtn btnHover btn-accueil"><a  href="accueil.php">Accueil</a></button>
      </li>	  
	  <li class="dropdown" >
		<button class="dropbtn"> Acte de naissance</button>
		<div class="dropdown-content">
		  <a href="ecritureBD.php">Nouvel Acte naissance</a>
		  <a href="lectureBD.php">Liste Actes naissance</a>
		</div>
	  </li>
	  <li class="dropdown"> 
		<button class="dropbtn">Acte de mariage</button>
		<div class="dropdown-content">
		  <a href="#">Nouvel Acte mariage</a>
		  <a href="#">Liste Acte mariage</a>
		</div>
	  </li>
	  <li class="dropdown">
		 <button class="dropbtn">Acte de divorce</button>
		 <div class="dropdown-content">
		   <a href="#">Nouvel Acte de divorce</a>
		   <a href="#">Liste Acte de divorce</a>
		 </div>	 
	  </li>
	  <li class="dropdown">
		 <button class="dropbtn">Acte de dec&egrave;s</button> 
		<div class="dropdown-content">
		   <a href="#">Nouvel Acte de dec&egrave;s </a>
		   <a href="#">Liste Acte de dec&egrave;s </a>
		 </div>	
	   </li>

		<li class="logout-icon">
			<a href="#" id="btnCompte" >👤</a>

			<div id="popupCompte" class="popup-compte">
				<div class="popup-content-compte">
					<button class="reinit" onclick="window.location.href=\'reinitialisation/envoyer_code.php\'">
						⚙️ Réinitialiser le mot de passe
					</button>

					<button class="reinit" onclick="ouvrirPopupLogout(event)">
						🚪↩️ Déconnexion
					</button>
				</div>
			</div>
			
			<a href="javascript:void(0);" style="font-size:15px;" class="troisBarres" onclick="ouvrirMenu();">&#9776; </a>
		</li>
	</ul> 
	
';
 
?>
