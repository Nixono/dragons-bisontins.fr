<?php
	include("../conf.php");
	
	$_id = (int)Misc::extractDataIfSet($_POST, 'id', 0);
	$_nom = (string)Misc::extractDataIfSet($_POST, 'nom', "");
	$_points = (int)Misc::extractDataIfSet($_POST, 'points', 0);
	$_joues = (int)Misc::extractDataIfSet($_POST, 'joues', 0);
	$_victoires = (int)Misc::extractDataIfSet($_POST, 'victoires', 0);
	$_nuls = (int)Misc::extractDataIfSet($_POST, 'nuls', 0);
	$_defaites = (int)Misc::extractDataIfSet($_POST, 'defaites', 0);
	$_butMis = (int)Misc::extractDataIfSet($_POST, 'butMis', 0);
	$_butPris = (int)Misc::extractDataIfSet($_POST, 'butPris', 0);
	$_difference = $_butMis - $_butPris;
	
	if(empty($_nom)) {
		header('Location: Results.detail.php?e=2&'.$q);
		die();
	}

	if($_id){
		$res = $db->query('	UPDATE results 
							SET Nom = "'. $_nom . '", 
							Points = "' . $_points . '", 
							Joues = "' . $_joues . '",
							Victoires = "' . $_victoires . '",
							Nuls = "' . $_nuls . '",
							Defaites = "' . $_defaites . '",
							But_mis = "' . $_butMis . '",
							But_pris = "' . $_butPris . '",
							Difference = "' . $_difference .'"
							WHERE id_club = "' . $_id . '";');
		header('Location: Results.detail.php?e=3');
		die();
	}
	else{
		$res = $db->query("insert into results (Nom, Points, Joues, Victoires, Nuls, Defaites, But_mis, But_pris, Difference) values ('$_points', '$_joues', '$_victoires', '$_nuls', '$_defaites', '$_butMis', '$_butPris', '$_difference');");
		header('Location: Results.detail.php?e=1'); 
	}
?>