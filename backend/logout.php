<?php 
    /*
	* Garges-Les-Gonesse
	* 25.05.2026
	*
	* Déconnexion
	*
	* 🔗 Comment l’appeler ?
    * Dans ton menu, ton header, ou ton bouton “Déconnexion”, tu mets :
	  <a href="logout.php">Déconnexion</a>
	*
	* Ou un bouton :
		<form action="logout.php" method="post">
			<button type="submit">Déconnexion</button>
		</form>
    *
	*
	*/


	session_start();
	session_unset();
	session_destroy();

	header("Location: index.php");
	exit();

 
?>
