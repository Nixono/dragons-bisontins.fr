<?php
include("../conf.php");
$_ville = (string)Misc::extractDataIfSet($_POST, 'ville', "");
$_jour = (string)Misc::extractDataIfSet($_POST, 'jour', "");
$_heure = (string)Misc::extractDataIfSet($_POST, 'heure', "");
$_age = (string)Misc::extractDataIfSet($_POST, 'age', "");
$_gymnase = (string)Misc::extractDataIfSet($_POST, 'gymnase', "");

	if(empty($_ville) || empty($_jour) || empty($_heure) || empty($_age) || empty($_gymnase)) {
		header('Location: Horaire.form.php?e=2&'.$q);
		die();
	}
	else{
		include("../conf.php");
		//Misc::debug($_POST);
		$res = $db->query("insert into horaires (h_ville, h_jour, h_heure, h_age, h_gymnase) values ('$_ville', '$_jour', '$_heure', '$_age', '$_gymnase');");
		header('Location: Horaire.form.php?e=1'); 
	}
?>