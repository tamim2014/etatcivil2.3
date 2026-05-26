/*
 *
 * 1. captureCombo(prfctr)
 *    Capture les filtres dans inc/accueil/accueil_choisir_naissance.php
 *    Charge les donnée dans accueil.php 👈 inc/accueil/accueil_prefecture.php 👈 <div id="panel"></div>
 *
 * 2. captureSousMenu(prfctr)
 *    Capture les filtres dans inc/lecture/topMenu.php 
 *    Charge les données dans lectureBD.php
 *
 */
      
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
		
		// accueil.php:  inc/accueil/accueil_prefecture.php
        function captureCombo(prfctr) { 
            if (prfctr == "") {
                 // Si aucune prefecture choisie, le panel est vide, donc ne souvre pas				
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();
                //1. On prend une table relative � la prefecture captur�e
		        // Avec symfony on fait:
		        // xmlhttp.open("GET", "/naissance/colonne?p=" + prfctr, true);				
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
		
		
		// lectureBD.php-> include("inc/lecture/topMenu.php"); ⚠️voir ligne 116
		/*
		function captureSousMenu(prfctr){ // prfctr=prefecture selectionnee dans le sous-menu
            if (prfctr == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			}else{ 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+
               
                //1.Connection[au backend php] et Paramettrage[prfctr est la prefecture choisie]  
				xmlhttp.open("GET","backend/lectureBD_afficherNaissance.php?pr="+prfctr,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                //2.Envoi
				xmlhttp.send(); 
				//3.Reception reponse [xmlhttp.responseText] et affichage dans div yivawo
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
					//activerPopup();
				};
            }
        }
		*/
		
		
		// Redefinition: Version qui cache colonne_contenu sur mobile
		function captureSousMenu(prfctr){ 
			if (prfctr == "") { 
				document.getElementById("yivawo").innerHTML = ""; 
				$(".colonne_contenu_cacher_mobil").removeClass("visible"); // on recache tout
				return; 
			} else { 
				instanceXMLHttpRequest(); // instance XMLHttpRequest for IE7+
				
				// 1. Connexion au backend
				xmlhttp.open("GET", "backend/lectureBD_afficherNaissance.php?pr=" + prfctr, true);

				// 2. Envoi
				xmlhttp.send(); 

				// 3. Réception
				xmlhttp.onreadystatechange = function() { 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 

						document.getElementById("yivawo").innerHTML = xmlhttp.responseText;

						// 👉 Vérifier si la réponse contient quelque chose
						if ($.trim($("#yivawo").html()) !== "") {
							$(".colonne_contenu_cacher_mobil").addClass("visible");   // on affiche
						} else {
							$(".colonne_contenu_cacher_mobil").removeClass("visible"); // on cache si vide
						}
					}
				};
			}
		}

	

		
	$(document).ready(function(){
		$("ul li.dropdown div.dropdown-content div#aside ul.navigation li.toggleSubMenu  ul.subMenu li a").click(function() {// inc/lecture/topMenu.php 
			captureSousMenu(this.textContent); // jQuery transmet la capture a AJAX
		});
	});


/* 🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩  */


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


        /* qlq f° obsoletes		
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






		



		
		

     