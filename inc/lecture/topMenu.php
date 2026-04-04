<?php
 echo '
  
	<ul style="margin-left:28%;">
	  <li class="dropdown" >
		<button class="dropbtn btnHover">&emsp;&ensp;<a  href="accueil.php">Accueil</a> &emsp;&emsp;</button>
      </li>	  
	  <li class="dropdown" >
		<button class="dropbtn"> Acte de naissance</button>
		<div class="dropdown-content">
		    <!--
		    <a href="#">Grande-Comores-src</a>
		    <a href="#">Anjouan-src</a>
		    <a href="#">Moheli-src</a>		  
		     -->
			<div id="aside"  > 
				<ul class="navigation"  >	
					<li class="toggleSubMenu"> <span >Grande-Comores</span>
						<ul class="subMenu"  style="color:silver;" >
						  <li><a href="#" >Moroni-Bambao</a></li>
						  <li><a href="#" >Hambou</a></li>
						  <li><a href="#" >Mbadjini-Ouest</a></li>
						  <li><a href="#" >Mbadjini-Est</a></li>
						  <li><a href="#" >Oichili</a></li>
						  <li><a href="#" >Hamahamet-Mboinkou</a></li>
						  <li><a href="#" >Mitsamihouli-Mboudé</a></li>
						  <li><a href="#" >Itsandra-Hamanvou</a></li>
						</ul>
					</li>				
					<li class="toggleSubMenu"><span>Anjouan</span>
						  <ul class="subMenu"  style="color:silver;" >						
							<li><a href="#" class="island1">Mutsamudu</a></li>
							<li><a href="#" class="island1">Oini</a></li>
							<li><a href="#" class="island1">Domoni</a></li>
							<li><a href="#" class="island1">Sima</a></li>
						  </ul>
					</li>
					<li class="toggleSubMenu"><span>Moheli</span>
						  <ul class="subMenu"  style="color:silver;" >						
							<li><a href="#" class="island1">Fomboni</a></li>
							<li><a href="#" class="island1">Nioumachoua</a></li>
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
	</ul> 
	   
';
 
?>
