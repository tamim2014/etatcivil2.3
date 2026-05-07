<?php
 echo '
 	    <!-- <div style="width:80%; margin-left:10%; height:30%; "> -->
 	    <div id="menudroite" class="menudroiteEdit">
                <a href="accueil.php"> 
				    <div  class="kangalaheMenu"   >  
					   <input type="button"  value="Accueil" class="btnHover"  style="background:#558C89; color:#ececea; height:30px;   display: block;  margin : auto;  "/>
					</div>     
				</a>
				
				<div class="kangalaheMenu">			  
					<input type="submit" onclick="actenumero(); header("Location:accueil.php"); " id="enregistrer"  name="Enregistrer" value="Enregistrer" style="background-color:#cdbe9f;  height:30px; display:block;  margin :auto;"    />					
				 </div>		
                
                <div class="kangalaheMenu">
                      <a href="#" ><input type="button"  value="Recommencer"   align="center"  style="background-color: #cdbe9f;   height: 30px;" /></a>
                 </div>
				 
                 <div class="kangalaheMenu"  ">  
				     <a href="ecritureBD.php"><input type="button" name="enregistrer_" value="Nouveau document" style="background-color:#cdbe9f;  height: 30px; " onclick="alert(\'Enregistrement effectué.\');" /></a>					
		         </div>

	   </div>
';
?>
	 
        
		
     