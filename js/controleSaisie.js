/**
 * 🟦 Controle d'acces sur le champs "Prefecture"
 * 🟦 Controle de saisie sur les autres champs
 *
 */

/* 🟦  Contrôle d'accès:  "non-admin" reste sur sa prefecture d'affectation  */

// On ajoute une bordure verte: Pour rappeller la prefecture qu'il faut
function control(select) {

    let role = select.dataset.role;
    let prefAutorisee = select.dataset.pref;
    let prefChoisie = select.value;

    if (role !== "admin") {

        if (prefChoisie !== prefAutorisee) {

            // Bordure rouge
            select.style.border = "2px solid green";

            alert("La préfecture saisie est différente de votre centre d'affectation !");
            select.value = prefAutorisee;

        } else {

            // Bordure normale si valide
            select.style.border = "";
        }
    }
}
// Virer la bordure  si la prefecture est valide
function clearPrefectureBorder() {
    const prefSelect = document.getElementById("prefecture");
    prefSelect.style.border = "";
}






// 🟦  Contrôle de saisie: Générique sur le champs courant
/**
 *
 * à chaque fois que l'utilisateur quitte le champs: "blur"
 * à chaque frappe sur le champs:"input" 
 *
 * nom.addEventListener("input", function(){...
 * nom.addEventListener("blur", function(){
 *	 
 */

function controlChamp(input) {
    const errSpan = input.nextElementSibling;

    if (input.value.trim() === "") {
        errSpan.textContent = "Ce champ est obligatoire ⚠️";
        errSpan.classList.add("actif");
        input.classList.add("errBorder");
    } else {
        errSpan.textContent = "";
        errSpan.classList.remove("actif");
        input.classList.remove("errBorder");
    }
}

 





// On vire le message(pour garder seulement la bordure)
function controlChampSansMessage(input) {
	var errChamps = nom.nextElementSibling;
	//const errSpan = input.nextElementSibling;

	if (input.value.trim() === "") {
		//errSpan.textContent = "Ce champ est obligatoire.";
		input.classList.add("errBorder");
	} else {
		//errSpan.textContent = "";
		input.classList.remove("errBorder");
	}
}

/* C'était pour cacher/ afficher le mesaage d'erreur( contrôle de saisie)
if (champ.value.trim() === "") {
	erreurSpan.classList.add("actif");
} else {
	erreurSpan.classList.remove("actif");
}
*/



// 🟩 Contrôle de saisie: 1er check point
/**
 * Posé sur le champs date de naissanse:"Le"
 * Contrôle les 9 champs précedents:
 * Registre, Acte N°, Du(date)
 * Nom, Prénom, Délivré à
 * Le, l'an, Série Numb
 *
 * Attention! Ne pas poser la class="obligatoire" sur les 2 champs suivant:
 * 🌋 Prefecture et
 * 🌋 Centre
 *
 * Sinon; Conflit de contrôles
 */
function checkpoint() {
	const champs = document.querySelectorAll(".obligatoire");
	let erreur = null;
	champs.forEach(champ => {
		// On réutilise la fonction générique
		//controlChamp(champ);
		controlChampSansMessage(champ); // juste la bordure
		
		if (champ.value.trim() === "" && erreur === null) {
			erreur = champ;
		}
	});
    
	if (erreur) {
		erreur.scrollIntoView({ behavior: "smooth", block: "center" });
		erreur.focus();
	}
	
}

//🟩 Contrôle de saisie: 2em check point
/**
 * Posé sur le champs nom du père:"fils(fille) de"
 * Contrôle les 7 champs précedents:
 * Le, l'an, heure,  minuite
 * est né(e), à (lieu), du sexe
 *
 */
 function checkpointDeux() {
	const champs = document.querySelectorAll(".obligatoireDeux");
	let erreur = null;
	champs.forEach(champ => {
		// On réutilise la fonction générique
		//controlChamp(champ);
		controlChampSansMessage(champ); // juste la bordure
		if (champ.value.trim() === "" && erreur === null) {
			erreur = champ;
		}
	});

	if (erreur) {
		erreur.scrollIntoView({ behavior: "smooth", block: "center" });
		erreur.focus();
	}
}

//🟩 Contrôle de saisie: 3em check point
/**
 * Posé sur le champs Déclaration faite par:"faite par"
 * Contrôle les 10 champs précedents.
 * Père:
 * fils(fille) de, né le, né à, prefession, demeurant à
 * Mère
 * et de, née le, à, profession, demeurant à
 */
 function checkpointTrois() {
	const champs = document.querySelectorAll(".obligatoireTrois");
	let erreur = null;
	champs.forEach(champ => {
		// On réutilise la fonction générique
		//controlChamp(champ);
		controlChampSansMessage(champ); // juste la bordure
		if (champ.value.trim() === "" && erreur === null) {
			erreur = champ;
		}
	});

	if (erreur) {
		erreur.scrollIntoView({ behavior: "smooth", block: "center" });
		erreur.focus();
	}
}



// Contrôle génerale
/**
 * Appliqué au bouton submit
 *🌋 Résultat volcanique: Pas la peine => required fait ce job!
 *
 *
	function checkpointFinal(event) {

		const champs = document.querySelectorAll(".obligatoire");
		let erreur = null;

		champs.forEach(champ => {

			// On réutilise ta fonction générique
			controlChamp(champ);

			if (champ.value.trim() === "" && erreur === null) {
				erreur = champ;
			}
		});

		if (erreur) {
			event.preventDefault(); // bloque l’envoi du formulaire

			erreur.scrollIntoView({ behavior: "smooth", block: "center" });
			erreur.focus();
		}
	}
*
*/




