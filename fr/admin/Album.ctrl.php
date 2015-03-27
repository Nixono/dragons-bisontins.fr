<?php
	include("../conf.php");

	$_id = (int)Misc::extractDataIfSet($_POST, 'id', 0);	
	$_titre = (string)Misc::extractDataIfSet($_POST, 'titre', "");
	$_titre = str_replace('\'', '\\\'', $_titre);

	if(empty($_titre)) {
		header('Location: Album.form.php?e=2&'.$q);
		die();
	}

	if($_id){
		$res = $db->query('	UPDATE Album 
							SET al_nom = "'. $_titre . '"
							WHERE id = "' . $_id . '";');
		header('Location: Album.detail.php?e=3');
		die();
	}
	else{
		$res = $db->query("insert into Album (al_nom) values ('$_titre');");
		header('Location: Album.detail.php?e=1'); 
	}
?>