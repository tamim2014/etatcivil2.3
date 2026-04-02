
//AJAX    
   
		// instance XMLHttpRequest  for all browsers. Attention! c'est peut être cette fonction qui pose problème à IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}

/*
   accueil_choisir_naissance.php (c'1 include de accueil_prefecture.php, qui est lui même include de accueil.php)
   str represente la prefecture cliquée par l'utilisateur dans la liste déroulante de la page d'accueil
*/
        function captureCombo(str) { 
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
                //Connection[au serveur php] et Paramèttrage[str est la prefecture choisie] 
				xmlhttp.open("GET","SERVEUR/colonne_afficher_naissance.php?p="+str,true);
                // Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div panel[document.getElementById("panel").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};

            }
        }


//lectureBD.php
          //jQuery : Recuperation des clics sur les  sous menu(sousmenu.php)
		  //AJAX:    Transmissions (des clics recuperés) vers la div #yivawo de la page lectureBD.php
		 $(document).ready(function(){
						/* sousmenu.php: Pour capter les clics sur les sous-menus*/
					$("ul li.sousmenu1  ul.panel3 li a ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureSousMenu(this.textContent);
						
					});
					
					$("ul li.sousmenu2  ul.panel3 li a").click(function() {  
							   captureSousMenu(this.textContent);
					}); 
					
					$("ul li.sousmenu3  ul.panel3 li a").click(function() { 
							   captureSousMenu(this.textContent);
					}); 
					/*************************Essai sur le mnayvawo**********************
					$("ul li.sousmenu3  ul.panel3 li a").click(function() { 
							   var msg='<?PHP echo $_SESSION["pref"];?>'; // Passage d'une variable php à javaScript
							   $("annonce").html(msg); //document.getElementById("annonce").innerHTML= msg;
							 
					});
					********************************************************************/
		});


		function captureSousMenu(str){ // str represente la préfecture selectionnée dans le sous-menu
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
               
                //Connection[au serveur php] et Paramèttrage[str est la prefecture choisie]  
				xmlhttp.open("GET","SERVEUR/lectureBD_afficherNaissance.php?pr="+str,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                // Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]

				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
					//activerPopup();
				};
            }
        }
		
//_____________________________________________

/*
function popup_lectureBD2_(url){
    window.open(
        url,
        'Popup',
        'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
    );
}

function activerPopup() {
    document.querySelectorAll(".btnPopup").forEach(function(el){
        el.addEventListener("click", function(e){
            e.preventDefault();
            popup_lectureBD2_(this.href);
        });
    });
}
*/



		



		
		

     