	function verifierAvantAffichage(id) {
		if (id <= 0) {
			document.body.insertAdjacentHTML('beforeend', `
				<div class="alert2">
					Veuillez saisir le document avant de l'afficher ⚠️
					<span class="flash-close">&times;</span>
				</div>
			`);
			return false;
		}

		return true; // IMPORTANT : pas de redirection ici
	}
	
	
	function ouvrirPopupEcritureBD3(lien) {
		const url = lien.href;

		const loader = document.getElementById("popupLoader");
		const frame = document.getElementById("popupFrame");

		loader.style.display = "block";
		frame.style.opacity = "0";

		frame.src = url;
		document.getElementById("popupModal").style.display = "block";

		frame.onload = function() {
			loader.style.display = "none";
			frame.style.opacity = "1";
		};
		
		// header
		document.getElementById("popupTitle").textContent = lien.textContent.trim();


		return false;
	}

// fermeture nouveau popup
	document.addEventListener("click", function(e) {
		if (e.target.classList.contains("modal-close") ||
			e.target.classList.contains("modal")) {
			document.getElementById("popupModal").style.display = "none";
			document.getElementById("popupFrame").src = "";
		}
	});




// Alert sur le Btn afficher
	function ouvrirEtVerifier(lien, id) {
		if (!verifierAvantAffichage(id)) {
			return false;
		}

		return ouvrirPopupEcritureBD3(lien);
	}


// activer/désactiver le plein écran
	document.querySelector(".modal-fullscreen").addEventListener("click", function() {
		const modalContent = document.querySelector(".modal-content");

		if (!modalContent.classList.contains("fullscreen")) {
			modalContent.classList.add("fullscreen");
		} else {
			modalContent.classList.remove("fullscreen");
		}
	});
