<?php
	require_once("../sections/admin/head.php");
	require_once("../conf.php");
	
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
	$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);
	$sql = "SELECT * from Album
	ORDER BY id";
	$sqlR = $db->query($sql);

	$j = 0;
	$album = array();
	while ($ligne = $sqlR->fetch())
		$album[] = $ligne;

	$j = sizeof($album);

	if ($_e == 1)
		echo "<div class='alert alert-success'>L'album a bien &eacute;t&eacute; ajout&eacute;.</div>";
	if ($_e == 2)
		echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas &eacutet&eacute saisi</div>";
	if ($_e == 3)
		echo "<div class='alert alert-success'>L'album a bien &eacute;t&eacute; modifi&eacute;.</div>";
	if ($_e == 4)
		echo "<div class='alert alert-success'>L'album a bien &eacute;t&eacute; supprim&eacute;.</div>";
?>
<style>
	tr{
		font-size: 0.7em;
		text-align: center;
	}
</style>
<hr class="nl-md">
<div class="container">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="text-center">
					News / <a href="Album.form.php">Ajouter un album</a>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

				<p class="lead text-justify">
					<?php
						echo "<table class='table'>
						<tr>
							<th>Nom de l'album</th>
							<th>Modifier</td>
							<th>Supprimer</th>
						</tr>";
					$i = 0;
					for($i = 0; $i < $j; $i++)
					{
						echo '<tr>
							<td> ' . $album[$i]['al_nom'] . ' </td>
							<td><a href="Album.form.php?id='.$album[$i]['id'].'">Modifier</a></td>
							<td><a  href="#" onclick="confirm_suppr('.$album[$i]['id'].')">Supprimer</a></td>
						</tr>';
					}
				?>
				</p>

			</div>			
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
		
		<script type="text/javascript">
			function confirm_suppr(id){
				if(confirm('Voulez-vous vraiment supprimer cet album?')){
					document.location.href = "Album.delete.php?id="+id;
				}
			}
		</script>
	</section>
</div>
