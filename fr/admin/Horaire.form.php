<?php
require_once("../sections/admin/head.php");
include("Misc.class.php");
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);

//-- initialisation des variables
$_ville = $_jour = $_heure = $_age = $_gymnase = "";
$_ville = Misc::extractDataIfSet($_GET, "ville", "");
$_jour = Misc::extractDataIfSet($_GET, "jour", "");
$_heure = Misc::extractDataIfSet($_GET, "heure", "");
$_age = Misc::extractDataIfSet($_GET, "age", "");
$_gymnase = Misc::extractDataIfSet($_GET, "gymnase", "");

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
			<center><h2>Ajouter un Horaire</h2>				
				<span class='required'>* Champs obligatoires</span></center>
			<?php
			if ($_e == 2)
				echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas été saisi</div>";
			if ($_e == 1)
				echo "<div class='alert alert-success'>L'actualit&eacute; a bien &eacute;t&eacute; ajoutee.</div>";
			?>
			<form action="Horaire.ctrl.php" method="post" class="form-actu" enctype="multipart/form-data">
				
				<label for="ville">Ville : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="ville" class="ville"	value="<?php echo $_ville; ?>" placeholder="Ville" /><br>

				<label for="jour">Jour : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="jour" class="jour"	value="<?php echo $_jour; ?>" placeholder="Jour" /><br>

				<label for="heure">Heure : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="heure" class="heure"	value="<?php echo $_heure; ?>" placeholder="Heure" /><br>

				<label for="age">Age : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="age" class="age"	value="<?php echo $_age; ?>" placeholder="Age" /><br>

				<label for="gymnase">Gymnase : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="gymnase" class="gymnase"	value="<?php echo $_gymnase; ?>" placeholder="Gymnase" /><br>

				<br><br>
				
				<div class="item submit">
					<input type="submit" name="envoyer"  class="btn btn-primary" value="Envoyer" />
					<input type="button" class="btn btn-primary" onclick="history.back();" value="Retour">
				</div>
				</form>
			<script src="./js/bootstrap.min.js"></script>		
   			<script src="./js/admin.js"></script>	
		</div>
	</body>