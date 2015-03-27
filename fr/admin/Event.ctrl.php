<?php
	include("../conf.php");

	$_id = (int)Misc::extractDataIfSet($_POST, 'id', 0);
	$_titre = (string)Misc::extractDataIfSet($_POST, 'titre', "");
	$_titre = str_replace('\'', '\\\'', $_titre);
	$_lieu = (string)Misc::extractDataIfSet($_POST, 'lieu', "");
	$_lieu = str_replace('\'', '\\\'', $_lieu);
	$_dateDebut = (string)Misc::extractDataIfSet($_POST, 'dateDebut', "");
	//$_dateDebut = Misc::formatDateFrToUs($_date,"Y-m-d");
	$_dateFin = (string)Misc::extractDataIfSet($_POST, 'dateFin', "");
	//$_dateFin = Misc::formatDateFrToUs($_date,"Y-m-d");

	if(empty($_titre) || empty($_dateDebut) || empty($_dateFin) || empty($_lieu)) {
		header('Location: Event.detail.php?e=2&'.$q);
		die();
	}

	if($_id){
		$res = $db->query('	UPDATE Evenement 
							SET ev_titre = "'. $_titre . '", 
							ev_lieu = "' . $_lieu . '", 
							ev_date_debut = "' . $_dateDebut . '",
							ev_date_fin = "' . $_dateFin . '"
							WHERE ev_id = "' . $_id . '";');
		header('Location: Event.detail.php?e=3');
		die();
	}
	else{
		$res = $db->query("insert into Evenement (ev_titre, ev_lieu, ev_date_debut, ev_date_fin) values ('$_titre', '$_lieu', '$_dateDebut', '$_dateFin');");
		header('Location: Event.detail.php?e=1'); 
	}
?>