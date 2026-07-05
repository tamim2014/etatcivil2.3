<?php
 echo '<ul  id="hamburguer"> <!-- margin-left:32%; -->
	  <li class="dropdown" id="pixelPerfect">
		<button   class="dropbtn  btn-accueil"><a  href="#">Pixel-perfect Pixel-perfect Pixel-perfect</a></button>
      </li>
	  <li class="dropdown" >
		<button class="dropbtn btnHover btn-accueil"><a  href="accueil.php">Accueil</a></button>
      </li>	  
	  <li class="dropdown" >
		<button class="dropbtn"> Acte de naissance</button>
		<div class="dropdown-content droplectureBD">
			<div id="aside"  > 
				<ul class="navigation"  >	
					<li class="toggleSubMenu"><span class="huit">Grande-Comores</span>
						<ul class="subMenu">
						  <li><a href="#" class="island1">Moroni-Bambao</a></li>
						  <li><a href="#" class="island1">Hambou</a></li>
						  <li><a href="#" class="island1">Mbadjini-Ouest</a></li>
						  <li><a href="#" class="island1">Mbadjini-Est</a></li>
						  <li><a href="#" class="island1">Oichili-Dimani</a></li>
						  <li><a href="#" class="island1">Hamahamet-Mboinkou</a></li>
						  <li><a href="#" class="island1">Mitsamiouli-Mboude</a></li>
						  <li><a href="#" class="island1">Itsandra-Hamanvou</a></li>
						</ul>
					</li>				
					<li class="toggleSubMenu"><span class="quatre">Anjouan</span>
						  <ul class="subMenu">						
							<li><a href="#" class="island1">Mutsamudu</a></li>
							<li><a href="#" class="island1">Ouani</a></li>
							<li><a href="#" class="island1">Domoni</a></li>
							<li><a href="#" class="island1">Sima</a></li>
						  </ul>
					</li>
					<li class="toggleSubMenu"><span class="trois">Moheli</span>
						  <ul class="subMenu" >						
							<li><a href="#" class="island1">Fomboni</a></li>
							<li><a href="#" class="island1">Nioumachoi</a></li>
							<li><a href="#" class="island1">Djando</a></li>
						  </ul>
					</li>

				</ul> 
                <a href="ecritureBD.php" style="border-top:1px solid #bbb;">Nouvel Acte naissance</a>				
			</div>
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
	   <!--
	   <li class="logout-icon">
          <a href="#"  onclick="ouvrirPopupLogout(event)">👤</a>
       </li>
	   -->
	   <li class="logout-icon">
			<a href="#" id="btnCompte" >👤</a>

			<div id="popupCompte" class="popup-compte">
				<div class="popup-content-compte">
					<button class="reinit" onclick="window.location.href=\'reinitialisation/envoyer_code.php\'">
						⚙️ Réinitialiser le mot de passe
					</button>
                    <hr style="width:80%; margin-inline:auto; ">
					<button class="reinit" onclick="ouvrirPopupLogout(event)">
						🔒 Déconnexion <!-- 🔌 -->
					</button>
				</div>
			</div>
			
			<a href="javascript:void(0);" style="font-size:15px;" class="troisBarres" onclick="ouvrirMenu();">&#9776; </a>
		</li>
	</ul> 	   
';
 
?>
