<?php
require_once("../sections/admin/head.php");
require_once("../conf.php");
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
		header('Location: auth.php');
		die();
	}
$_e = (int)Misc::extractDataIfSet($_GET, 'e', 0);
$_id = abs((int)Misc::extractDataIfSet($_GET, 'id', 0));


$sql = "SELECT * from results ORDER BY id_club";
$sqlR = $db->query($sql);
$results = array();
while($ligne = $sqlR->fetch())
	$results[] = $ligne;

//-- initialisation des variables
$_place = $_nom = $_points = $_joues = $_victoires = $_nuls = $_defaites = $_butMis = $_butPris = $_difference = "";

if($_id){
	$sql = "SELECT * from results WHERE $_id = id_club";
	$sqlR = $db->query($sql);
	$Result = array();
	while ($ligne = $sqlR->fetch())
		$Result[] = $ligne; 
	//Misc::debug($Result);

	$_place = $Result[0]['Place'];
	$_nom = $Result[0]['Nom'];
	$_points = $Result[0]['Points'];
	$_joues = $Result[0]['Joues'];
	$_victoires = $Result[0]['Victoires'];
	$_nuls = $Result[0]['Nuls'];
	$_defaites = $Result[0]['Defaites'];
	$_butMis = $Result[0]['But_mis'];
	$_butPris = $Result[0]['But_pris'];
	$_difference = $_butMis - $_butPris;
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
			<center><h2>Ajouter une équipe</h2>				
				<span class='required'>* Champs obligatoires</span></center>
			<?php
			if ($_e == 1)
				echo "<div class='alert alert-success'>L'&eacute;venement a bien &eacute;t&eacute; ajout&eacute;.</div>";
			if ($_e == 2)
				echo "<div class='alert alert-danger'>Erreur. Un champ obligatoire n'a pas été saisi</div>";
			?>
			<form action="Results.ctrl.php" method="post" class="form" enctype="multipart/form-data">


				<!--FAIRE UN SELECT SUR MAX EQUIPE-->

				<label for="nom">Nom de l'équipe : <span class='required'>*</span></label><br>
				<input class="input-large"  type="text" name="nom" class="nom"	value="<?php echo $_nom; ?>" placeholder="Nom de l'équipe" /><br>

				<label for="points">Points : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="points" class="points"	value="<?php echo $_points; ?>" placeholder="Points" /><br>

				<label for="joues">Matchs joués : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="joues" class="joues"	value="<?php echo $_joues; ?>" placeholder="Matchs joués" /><br>

				<label for="victoires">Nombre de victoires : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="victoires" class="victoires"	value="<?php echo $_victoires; ?>" placeholder="Nombre de victoires" /><br>
				
				<label for="nuls">Nombre de matchs nuls : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="nuls" class="nuls"	value="<?php echo $_nuls; ?>" placeholder="Nombre de matchs nuls" /><br>
				
				<label for="defaites">Nombre de défaites : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="defaites" class="defaites"	value="<?php echo $_defaites; ?>" placeholder="Nombre de défaites nuls" /><br>
				
				<label for="butMis">Nombre de buts inscrits : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="butMis" class="butMis"	value="<?php echo $_butMis; ?>" placeholder="Nombre de buts inscrits" /><br>
				
				<label for="butPris">Nombre de buts encaissés : <span class='required'>*</span></label><br>
				<input class="input-large"  type="number" name="butPris" class="butPris"	value="<?php echo $_butPris; ?>" placeholder="Nombre de buts encaissés" /><br>
				<br>

				<input type="hidden" name="difference" value="<?php echo $_difference;?>">

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