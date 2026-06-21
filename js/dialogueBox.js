/*
 * 09.04.2026
 * Gere les message des bouton(Supprimer,Rectifier) dans la page accueil.php 
 * Gere le message du bouton "Rectifier" dans résultat de recherche: lectureBD2.php
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

// Pour les popup de la page d'accueil (Panel->Afficher)
function ouvrePop(url) {
	window.open(
		url,
		'Popup',
		'scrollbars=1,resizable=1,height=409,width=918,top=258,left=175'
	);
	return false;
}
/* #########################################################
 * 
 * Accueil.php 👉 table backend/colonne_supprimer_acte.php 
 * Gestion du Bouton 🗑️  ( dernière colonne de la table)
 * 
 */
 
//1. Alerte de précaution avant suppression(Btn OK/Annuler): Pas besoin de cette fonction pour une alet normal

function confirmerSuppression(id) {
    const modal = document.getElementById("confirmModal");
    modal.style.display = "flex";

    document.getElementById("btnOk").onclick = function() {
        window.location.href = "backend/supprimer.php?n=" + id;
    };

    document.getElementById("btnCancel").onclick = function() {
        modal.style.display = "none";
    };
}




// 2.Fermeture du flash: Message de confirmation de la suppression
document.addEventListener('click', function(e) {
	if (e.target.classList.contains('flash-close')) {
		const flash = e.target.parentElement;
		flash.style.transition = "opacity 0.4s";
		flash.style.opacity = "0";
		setTimeout(() => flash.remove(), 400);
	}
});

// lectureBD2(Résultats de recherche): Gestion des droits sur le fonction "Rectifier"

function verifierDroitEtModifier(url) {

    if (USER_ROLE !== "admin") {
        showDialog("M. <b>" + USER_PSEUDO + "</b> !<br> Vous n'avez pas les droits de <b>modifier un acte</b>.");
        return;
    }

    // Admin → OK : Autorisé → redirection
    window.location.href = url;
}






