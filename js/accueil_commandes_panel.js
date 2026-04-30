	   /**
        *
		* Solution jQuery
		*
		*  Normalement un lien href renvoie vers une nouvelle page! 
		*  Ici, on veut que le href renvoie la page dans  la m�me page source: Notamment dan un panel
        *	
        *
        *  intercepter un clic, emp�cher la navigation, charger du contenu dans un panel.		
	    */
	 
	 
	 // CommandePanel  page d'acceuil (include prefecture.php)
	 // Solution jQuery pour afficher une table en fonction du bouton cliqu�
            $(document).ready(function(){
				   // On ouvre le panel
                 $("#flip").click(function(){ $("#panel").slideToggle("slow");}); //D�roul� du slide changement de prefecture dans le comboBox
				  // On charge une table en fonction du bouton ET DE LA PREFECTURE CAPTURE
				  $('a#rectif, a#zima , a#print_ , a#trier ').click(function(e){ 
                       $('#panel').load($(this).attr('href')); // appel le fichier  <a id="zima"  href="backend/colonne_supprimer_acte.php" > par exemple
                       e.preventDefault();//Tr�s important.Sinon redirection dans une autre page
                  });
                 //$('.tab a:first').trigger('click'); // Affiche la page1 par d�faut
            });
	

	
	// Solution AJAX pour la modifiaction(affichage) de la 5�me colonne du slide : page d'acceuil (include prefecture.php)
     // Ce code je l'ai mis dans le fichier accueil_liens_colonne4.js   
		
		/****************************
		
						
		// Affichage des tables dans le slide de la page d'accueil

		function showSupprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","backend/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","backend/colonne_supprimer_acte.php",true);
                xmlhttp.send();
            }
        }
		
		function showRectifier(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","backend/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","backend/colonne_rectifier_acte.php",true);
                xmlhttp.send();
            }
        }
		
		function showImprimer(str) { // accueil.php(include prefecture.php)
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 

				instanceXMLHttpRequest();
                xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};
                //xmlhttp.open("GET","backend/accueil_imprimer_acte.php?print_="+str,true);
				xmlhttp.open("GET","backend/colonne_imprimer_acte.php",true);
                xmlhttp.send();
            }
        }
		******************************************/
		
		


		