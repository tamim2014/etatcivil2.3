
<?php
// accueil.php
session_start();
  //require_once 'backend/connection_mysqli.php';
  //require_once 'backend/connection_PDO.php';
  
   require_once 'connection_PDO.php';
  
  
 // moteur de recherche

  if(isset($_POST['acte_']))  $numero=$_POST['acte_'];
  if(isset($_POST['nom_']))   $nomm=$_POST['nom_'];

	// moteur de recherche 
	$message ="Pour trouver un document, entrer ci-haut, son num&eacute;ro, ou son nom";
	//if(isset($_POST['acte_']) && !ctype_digit($numero) ){$message = ' le numero est mal saisi'; }
	
    if(!empty($numero) && ctype_digit($numero) )
    {	 
	  /*
	   * Version mysqli
	   *
	  $sql="SELECT * FROM liste WHERE acte =".$numero; // PAS DE SLASH POUR UN ENTIER
	  $req=mysqli_query($conn,$sql) or die('Erreur SQl !<br>'.$sql.'<br>'.mysqli_error($db));
	  $result = mysqli_fetch_row($req);
	   *
	   */
        $req = $conn->prepare("SELECT * FROM liste WHERE acte = :numero");
        $req->execute([':numero' => $numero]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

	    //if ($result[0] == 0){
		if (empty($result)) {
			$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session du numéro
			$_SESSION["acte"] = $numero;
		 // --- redirection vers la page d'affichage
			header("Location: lectureBD2.php?num=".$numero ); exit;
		}
	}
	//ctype_digit($nombre) verifie si c est un nombre entier
	if(!empty($numero) && !ctype_digit($_POST['acte_'])) {
		$message = 'le numero est mal saisi'; 
	}
		  
    if(!empty($nomm) )
    {
	   /*
	    * Version mysqli
	    *
	     $sql2="SELECT * FROM `liste` WHERE `nom`='$nomm';";
	     $req2=mysqli_query($conn,$sql2) or die('Erreur SQl !<br>'.$sql2.'<br>'.mysqli_error($db));
	     $result2 = mysqli_fetch_row($req2);
		*
	    */

	    $req2 = $conn->prepare("SELECT * FROM liste WHERE nom = :nom");
        $req2->execute([':nom' => $nomm]);
        $result2 = $req2->fetch(PDO::FETCH_ASSOC);
		
	    //if ($result2[0] == 0){
		if (empty($result2)){
			$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session du nom
			$_SESSION["nom"]=$nomm;
		 // --- redirection vers la page d'affichage: TOUJOURS exit; après une Location
			header("Location: lectureBD2.php?nom=".$nomm ); exit;
		}
	}
	
?>


