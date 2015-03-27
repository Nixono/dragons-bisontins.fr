<?php
require_once("../sections/admin/head.php");	
require_once("../conf.php");

if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
	header('Location: auth.php');
	die();
}

$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);
$_id = abs((int)Misc::extractDataIfSet($_GET, 'id', 0));


$sql = "SELECT * from Evenement ORDER BY ev_date_debut";
$sqlR = $db->query($sql);
$Evenement = array();
while($ligne = $sqlR->fetch())
	$Evenement[] = $ligne;

//-- initialisation des variables
$_titre = $_dateFin = $_dateDebut = $_description = "";
$_titre = Misc::extractDataIfSet($_GET, "titre", "");
$_lieu = Misc::extractDataIfSet($_GET, "lieu", "");
$_dateDebut = Misc::extractDataIfSet($_GET, "dateDebut", "");
$_dateFin = Misc::extractDataIfSet($_GET, "dateFin", "");

if($_id){
	$sql = "SELECT * from Evenement WHERE $_id = ev_id";
	$sqlR = $db->query($sql);
	$Evenement = array();
	while ($ligne = $sqlR->fetch())
		$Evenement[] = $ligne; 
	//Misc::debug($Evenement);

	$_titre = $Evenement[0]['ev_titre'];
	$_lieu = $Evenement[0]['ev_lieu'];
	$_dateDebut = $Evenement[0]['ev_date_debut'];
	$_dateFin = $Evenement[0]['ev_date_fin'];
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
			<center><h2>Ajouter un évènement</h2>				
				<span class='required'>* Champs obligatoires</span></center>
			<?php
			if ($_e == 1)
				echo "<div class='alert alert-success'>L'&eacute;venement a bien &eacute;t&eacute; ajout&eacute;.</div>";
			if ($_e == 2)
				echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas été saisi</div>";
			?>
			<form action="Event.ctrl.php" method="post" class="form" enctype="multipart/form-data">
				
				<label for="titre">Titre : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="titre" class="titre"	value="<?php echo $_titre; ?>" placeholder="Titre" /><br>
				
				<label for="lieu">Lieu : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="lieu" class="lieu"	value="<?php echo $_lieu; ?>" placeholder="Lieu" /><br>

				<label for="dateDebut">Date de début : <span class='required'>*</span></label>
				<div data-date-format="dd-mm-yyyy" data-date="<?php echo Misc::formatDate($_dateDebut,"%jj-%mm-%aaaa") ?>" id="divdate" class="input-append date">
					<input class="input-large"  type="date" name="dateDebut" class="dateDebut"	value="<?php echo $_dateDebut; ?>" />
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
				
				<br>

				<label for="dateFin">Date de fin : <span class='required'>*</span></label>
				<div data-date-format="dd-mm-yyyy" data-date="<?php echo Misc::formatDate($_dateFin,"%jj-%mm-%aaaa") ?>" id="divdate" class="input-append date">
					<input class="input-large"  type="date" name="dateFin" class="dateFin"	value="<?php echo $_dateFin; ?>" />
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
				<br>

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