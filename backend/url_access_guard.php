<?php 
    /*
	* Garges-Les-Gonesse
	* 25.05.2026
	*
	* Empêcher l’accès direct par URL
	*
	*/
	
	  if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }


     if (!isset($_SESSION['user_id'])) {
        // header("Location: index.php"); // le log se fait dans index.php/ pas de login.php
       header("Location: ../index.php");
        exit();
     }
 
?>
