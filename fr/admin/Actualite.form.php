<?php
require_once("../sections/admin/head.php");
require_once("../conf.php");
//include("Misc.class.php");
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);
$_id = abs((int)Misc::extractDataIfSet($_GET, 'id', 0));

$sql = "SELECT * from Actualite ORDER BY ac_date desc";
	$sqlR = $db->query($sql);
	/*Misc::debug($sqlR);
	die();*/
	$Actualite = array();
	while ($ligne = $sqlR->fetch())
		$Actualite[] = $ligne; 

//-- initialisation des variables
$_titre = $_date = $_description = "";
$_titre = Misc::extractDataIfSet($_GET, "titre", "");
$_date = Misc::extractDataIfSet($_GET, "date", "");
$_description = Misc::extractDataIfSet($_GET, "description", "");

if ($_id){
	$sql = "SELECT * from Actualite WHERE $_id = ac_id";
	$sqlR = $db->query($sql);
	$Actualite = array();
	while ($ligne = $sqlR->fetch())
		$Actualite[] = $ligne; 

	$_titre = $Actualite[0]['ac_titre'];
	$_date = $Actualite[0]['ac_date'];
	$_description = $Actualite[0]['ac_desc'];
}

?>
	<head><?php include_once "../sections/admin/head.php"; ?></head>

	<style type="text/css">
			.form-actu {
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
			.form-actu input[type="text"],
			.form-actu input[type="email"],
			.form-actu input[type="date"],
			.form-actu input[type="password"],
			.form-actu select {
				font-size: 14px;
				height: auto;
				width:50%;
				margin-bottom: 15px;
			}

			.form-actu input[type="radio"]
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
			<center><h2>Ajouter une Actualité</h2>				
				<span class='required'>* Champs obligatoires</span></center>
			<?php
			if ($_e == 2)
				echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas été saisi</div>";
			if ($_e == 1)
				echo "<div class='alert alert-success'>L'actualit&eacute; a bien &eacute;t&eacute; ajoutee.</div>";
			if ($_e == 3)
				echo "<div class='alert alert-success'>L'actualit&eacute; a bien &eacute;t&eacute; modifiee.</div>";
			?>
			<form action="Actualite.ctrl.php" method="post" class="form-actu" enctype="multipart/form-data">
				
				<label for="titre">Titre : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="titre" class="titre"	value="<?php echo $_titre; ?>" placeholder="Titre" /><br>

				<label for="date">Date de publication : <span class='required'>*</span></label>
				<div data-date-format="dd-mm-yyyy" data-date="<?php echo Misc::formatDate($_date,"%jj-%mm-%aaaa") ?>" id="divdate" class="input-append date">
					<input class="input-large"  type="date" name="date" class="date"	value="<?php echo $_date; ?>" />
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
				<label for="date">Description : <span class='required'>*</span></label>
				<textarea rows="15" cols="120" placeholder="Description" name="description" class="description"><?php echo $_description; ?></textarea><br><br>
				
				<input type="hidden" name="id" value="<?php echo $_id; ?>"/>
				<center>
					<div class="item submit">
						<input type="submit" name="envoyer"  class="btn btn-primary" value="Envoyer" />
						<input type="button" class="btn btn-primary" onclick="history.back();" value="Retour"/>					
					</div>
				</center>
				</form>
			<script src="./js/bootstrap.min.js"></script>		
   			<script src="./js/admin.js"></script>	
		</div>
	</body>