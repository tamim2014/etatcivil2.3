	// Alert logout 
	
		function ouvrirPopupLogout(e) {
			e.preventDefault();
			document.getElementById("popupLogout").style.display = "flex";
		}

		function fermerPopupLogout() {
			document.getElementById("popupLogout").style.display = "none";
		}

		function confirmerLogout() {
			window.location.href = "/etatcivil2.3/backend/logout.php";
        }
		
	/* 🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩   */
		
	// Réinitialisation du mot de passe: Ouvrir/Fermer 
		document.getElementById("btnCompte").addEventListener("click", function(e) {
			e.preventDefault();
			document.getElementById("popupCompte").classList.toggle("open");
		}); 
	
    /* 🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩🧩   */
	
		function ouvrirMenu() {
			var items = document.querySelectorAll("#hamburguer li:not(:last-child)");
			items.forEach(li => {
				li.classList.toggle("show");
			});
		}