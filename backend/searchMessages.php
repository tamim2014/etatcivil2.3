
<?php

/**
 * SOURCES:accueil.php, lectureBD.php, lectureBD2.php
 * DESTINATION: lectureBD2.php
 *
 * On prend juste la saisie et on le transmet à lectureBD2.php
 * Au passage, on gere les messages relatifs à la saisie utilisateur
 *
 * ✅ 1. On prend un filtre: La saisie( nom ou numéro de document)
 * ✅ 2. On fait un select(from liste) par ce filtre : 
 *        Juste pour l'affichage des messages utilisateurs
 * ✅ 3. On stocke le filtre dans une session: 👉 il sera utilisé par ??
 * ✅ 4. On transmet le filtre à  lectureBD2.php (GET)
 *
 */

session_start();
  //require_once 'connection_mysqli.php';
   require_once 'connection_PDO.php';
  
 // ✅ 1. Le filtre
  if(isset($_POST['acte_']))  $numero=$_POST['acte_'];
  if(isset($_POST['nom_']))   $nomm=$_POST['nom_'];

	$message="Pour trouver un document, entrer ci-haut, son num&eacute;ro, ou son nom";
	//if(isset($_POST['acte_']) && !ctype_digit($numero) ){$message = ' le numero est mal saisi'; }

 //	✅ 2. Select(par le filtre) 
 
 // ✔️ 2.1 Filtre par le numero saisi
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
		if (empty($result)) { //if ($result[0] == 0){
			$message ='aucun resultat trouv&eacute;'; 
		}else{
		 // ✅ 3. On stocke le filtre dans une session: 👉 il sera utilisé par ??
			$_SESSION["acte"] = $numero;
		 // ✅ 4. On transmet le filtre à  lectureBD2.php
			header("Location: lectureBD2.php?num=".$numero ); exit;
		}
	}
	//ctype_digit($nombre) verifie si c est un nombre entier
	if(!empty($numero) && !ctype_digit($_POST['acte_'])) {
		$message = 'le numero est mal saisi'; 
	}
	

	// ✔️ 2.2 Filtre par le nom saisi
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
		if (empty($result2)){ //if ($result2[0] == 0){
			$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // ✅ 3. On stocke le filtre dans une session: 👉 il sera utilisé par ??
			$_SESSION["nom"]=$nomm;
		 // ✅ 4. On transmet le filtre à  lectureBD2.php
			header("Location: lectureBD2.php?nom=".$nomm ); exit;
		}
	}
	
?>


