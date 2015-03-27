<?php
	include("../conf.php");

	$_id = (int)Misc::extractDataIfSet($_POST, 'id', 0);
	$_titre = (string)Misc::extractDataIfSet($_POST, 'titre', "");
	$_titre = str_replace('\'', '\\\'', $_titre);
	$_date = (string)Misc::extractDataIfSet($_POST, 'date', "");
	$_date = Misc::formatDateFrToUs($_date,"Y-m-d");
	$_description = (string)Misc::extractDataIfSet($_POST, 'description', "");

	if(empty($_titre) || empty($_date) || empty($_description)) {
		header('Location: Actualite.detail.php?e=2&'.$q);
		die();
	}

	if($_id){
		$res = $db->query('	UPDATE Actualite 
							SET ac_titre = "'. $_titre . '", 
							ac_date = "' . $_date . '", 
							ac_desc = "' . $_description . '" 
							WHERE ac_id = "' . $_id . '";');
		header('Location: Actualite.detail.php?e=3');
		die();
	}

	else{
		$res = $db->query("insert into Actualite (ac_titre, ac_date, ac_desc) values ('$_titre', '$_date', '$_description');");
		header('Location: Actualite.detail.php?e=1'); 
	}
?>