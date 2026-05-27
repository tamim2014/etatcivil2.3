<?php
 echo '
    <!-- <ul style="margin-left:5%;"> -->
    <ul style="margin-left:12.9%;">
	  <li class="dropdown" >
		<button class="dropbtn btnHover btn-accueil"><a href="accueil.php">Accueil</a></button>
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
       <!--
	   <li class="logout-icon">
		   <a href="/etatcivil2.3/backend/logout.php" title="Déconnecter">👤</a>
	   </li>
	   -->
	   <li class="logout-icon">
          <a href="#" onclick="ouvrirPopupLogout(event)">👤</a>
       </li>
	</ul> 
';
?>
