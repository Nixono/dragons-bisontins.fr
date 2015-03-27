<?php
require_once("../sections/admin/head.php");
include("../conf.php");
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);
$_id = abs((int)Misc::extractDataIfSet($_GET, 'id', 0));

$sql = "SELECT * from Album ORDER BY id";
$sqlR = $db->query($sql);
$Album = array();
while($ligne = $sqlR->fetch())
	$Album[] = $ligne;


//-- initialisation des variables
$_titre = "";
$_titre = Misc::extractDataIfSet($_GET, "titre", "");

if($_id){
	$sql = "SELECT * from Album WHERE $_id = id";
	$sqlR = $db->query($sql);
	$Album = array();
	while ($ligne = $sqlR->fetch())
		$Album[] = $ligne; 

	$_titre = $Album[0]['al_nom'];
}	

?>
	<head><?php include_once "../sections/admin/head.php"; ?></head>

	<style type="text/css">
			.form {
				max-width: 800px;
				padding: 19px 29px 29px;
				margin: 40px auto 20px;
				background-color: #fff;
				border: 1px solid #e5e5e5;
				-webkit-border-radius: 5px;
					-moz-border-radius: 5px;
						border-radius: 5px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
					-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
						box-shadow: 0 1px 2px rgba(0,0,0,.05);
			}
			.form input[type="text"],
			.form input[type="email"],
			.form input[type="date"],
			.form input[type="password"],
			.form select {
				font-size: 14px;
				height: auto;
				width:50%;
				margin-bottom: 15px;
			}

			.form input[type="radio"]
			{
				font-size: 14px;
				height: auto;
				margin-bottom: 15px;
			}

			.required
			{
				color:red;
			}
		</style>
<?php
$customScripts = array('js/bootstrap-datepicker.js');
		
$customInlineScripts = array('$(document).ready(function () {
				$(".date").datepicker();
			});
			');?>
	<body>
		<div id="mbody">
			<center><h2>Ajouter un Album</h2>				
				<span class='required'>* Champs obligatoires</span></center>
			<?php
			if ($_e == 1)
				echo "<div class='alert alert-success'>L'album a bien &eacute;t&eacute; ajout&eacute;.</div>";
			if ($_e == 2)
				echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas été saisi</div>";
			?>
			<form action="Album.ctrl.php" method="post" class="form" enctype="multipart/form-data">
				
				<label for="titre">Titre de l'album : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="titre" class="titre"	value="<?php echo $_titre; ?>" placeholder="Titre" /><br>
				
				<input type="hidden" name="id" value="<?php echo $_id; ?>"/>
				<div class="item submit">
					<input type="submit" name="envoyer"  class="btn btn-primary" value="Envoyer" />
					<input type="button" class="btn btn-primary" onclick="history.back();" value="Retour">
				</div>
				</form>
			<script src="./js/bootstrap.min.js"></script>		
   			<script src="./js/admin.js"></script>	
		</div>
	</body>