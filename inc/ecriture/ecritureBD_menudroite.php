<?php
 $id_js = isset($id_document) ? intval($id_document) : 0; //Pour alert sur Btn Afficher
echo '<div id="menudroite" >
    <a href="accueil.php" class="linkhome2"> 
        <div class="kangalaheMenu">  
           <input type="button" class="btnHover writeBtn" value="Accueil" />
        </div>     
    </a>
                
    <div class="kangalaheMenu">           
        <a id="acteAJAX" href="output/afficher.php?n=' . $id_document . '" onclick="return ouvrirEtVerifier(this, ' . $id_js . ');">
            <input class="btnWrite" type="button" value="Afficher" align="center"/>
        </a>
    </div>
    
    <div class="kangalaheMenu">
        <a href="#"><input type="button" class="btnWrite" value="Rectifier" align="center" /></a>
    </div>

    <div class="kangalaheMenu">  
       <a href="ecritureBD.php"><input type="button" class="btnWrite" name="enregistrer_" value="Nouveau document"/></a>
    </div>
</div>';

?>
	 
        
		
     