
      
		// instance XMLHttpRequest  for all browsers. Attention! c'est peut �tre cette fonction qui pose probl�me � IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
		// Avec symfony on gait:
		// xmlhttp.open("GET", "/naissance/colonne?p=" + prfctr, true);
        function captureCombo(prfctr) { 
            if (prfctr == "") {
                 // Si aucune prefecture choisie, le panel est vide, donc ne souvre pas				
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();
                //1. On prend une table relative � la prefecture captur�e 
				xmlhttp.open("GET","backend/colonne_afficher_naissance.php?p="+prfctr,true);
				xmlhttp.send(); 
				xmlhttp.onreadystatechange = function() { 
				    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
				// 2.On charge la table dans le panel
					   document.getElementById("panel").innerHTML = xmlhttp.responseText;
					}
				};

            }
        }
		function captureSousMenu(prfctr){ // prfctr=pr�fecture selectionn�e dans le sous-menu
            if (prfctr == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			}else{ 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+
               
                //1.Connection[au backend php] et Param�ttrage[prfctr est la prefecture choisie]  
				xmlhttp.open("GET","backend/lectureBD_afficherNaissance.php?pr="+prfctr,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                //2.Envoi
				xmlhttp.send(); 
				//3.R�ception r�ponsebackendveur [xmlhttp.responseText] et affichage dans div yivawo
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
					//activerPopup();
				};
            }
        }
		/*
		function captureSousMenu(prfctr) { // la mm fonction avec fetch
			const cible = document.getElementById("yivawo");
			if(prfctr === ""){ cible.innerHTML=""; return; }
			fetch(`backend/lectureBD_afficherNaissance.php?pr=${encodeURIComponent(prfctr)}`)
				.then(response => {
					if (!response.ok) { throw new Error("Erreur r�seau : " + response.status }
					return response.text();
				})
				.then(data => {
					cible.innerHTML = data;
					// activerPopup(); // si tu veux le remettre
				})
				.catch(error => {
					console.error("Erreur AJAX :", error); cible.innerHTML = "<p>Une erreur est survenue.</p>";
				});
		}		
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


		
//________________________________________________________________________________________________________________________________		
		
 


 /**
    * 
	* L'AFFICHAGE DE LA TABLE DANS "lectureBD.php" SE FAIT EN 3 ETAPES:
    *
    * ETAPE1: jQuery capture le clic sur la prefecture
	           $("... ul.subMenu li a").click(...);
    * ETAPE2: jQuery transmet la prefecture(prfctr) cliqu�e � AJAX en lan�a cette fonction: 
	           captureSousMenu(this.textContent);
    *
    * ETAPE3: AJAX execute la fontion pour afficher la table relative � la prefecture transmise:
    *         xmlhttp.open(...url de la table...);
	*         xmlhttp.send();
    *         document.getElementById("yivawo").innerHTML = xmlhttp.responseText;	 
	*
    */	 
		 
	$(document).ready(function(){
		//topMenu.php(sous-menu): : ACTIVATION DES LIENS DU SOUS-MENU accordeon(les prefectures)
		$("ul li.dropdown div.dropdown-content div#aside ul.navigation li.toggleSubMenu  ul.subMenu li a").click(function() {// jQuery capture clic 
			captureSousMenu(this.textContent); // jQuery transmet la capture � AJAX
		});
	});


	/*
 * 09.04.2026
 * Gere les message des bouton(Supprimer,Rectifier) dans la page accueil.php 
 *
 */
function showDialog(msg) {
	console.log(msg);
	//document.getElementById("dialogMessage").innerText = msg;
	document.getElementById("dialogMessage").innerHTML = msg;
	document.getElementById("dialogBox").style.display = "flex";
}

function closeDialog() {
	document.getElementById("dialogBox").style.display = "none";
}

	






		



		
		

     