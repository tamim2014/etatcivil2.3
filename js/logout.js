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
    