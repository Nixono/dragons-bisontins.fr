<?php
	require_once("../sections/admin/head.php");
	require_once("../conf.php");
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
	$_id = abs((int)Misc::extractDataIfSet($_GET, 'id', 0));

	if($_id){
		$res = $db->query('	DELETE FROM Album
							WHERE id = "'. $_id . '";');
		header('Location: Album.detail.php?e=4');
	}

?>