
<?php
 echo '
    <ul class="menu-principale">
      <li class="dropdown">
        <button class="dropbtn btnHover btn-accueil"><a href="accueil.php">Accueil</a></button>
      </li>   
      <li class="dropdown">
        <button class="dropbtn">Acte de naissance</button>
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
         <button class="dropbtn">Acte de décès</button> 
        <div class="dropdown-content">
           <a href="#">Nouvel Acte de décès</a>
           <a href="#">Liste Acte de décès</a>
         </div> 
       </li>

       <!-- Icône compte -->
       <li class="logout-icon">
            <a href="#" id="btnCompte">👤</a>

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
        </li>
    </ul>

    <!-- <button class="hamburger">☰</button> -->
';
?>


