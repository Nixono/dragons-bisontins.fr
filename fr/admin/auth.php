<?php 
	require_once("Misc.class.php");
	include('../sections/admin/head.php');

	$_from = Misc::extractDataIfSet($_GET, 'from', './');
	$_login = Misc::extractDataIfSet($_POST, 'login', '');
	$_pass = Misc::extractDataIfSet($_POST, 'pass', '');
	$_from = Misc::extractDataIfSet($_POST, 'from', $_from);

	if (!empty($_login) && !empty($_pass)){
		if ($_login == "" && $_pass == "") {
			$_SESSION['auth'] = 1;
			$_SESSION['login'] = $_login;
			$_SESSION['pass'] = $_pass;
			header('Location: ' . $_from);
			die();
		}
		else{
			echo " <p> Nom d'utilisateur/mot de passe incorrects </p>";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<style type="text/css">
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #f5f5f5;
			}

			.form-signin {
				max-width: 300px;
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
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
				color:black;
			}
			.form-signin input[type="text"],
			.form-signin input[type="password"] {
				font-size: 16px;
				height: auto;
				margin-bottom: 15px;
				padding: 7px 9px;
			}
		</style>
	</head>

	<body>
		<?php include("../sections/admin/menu.php"); ?>
		<div class="container">
			<form method="POST" action="auth.php" class="form-signin">
				<h2 class="form-signin-heading">Identification</h2><br>
				<?php if (isset($msgErr))  echo "<div class=\"alert alert-error\">$msgErr</div>"; ?>
				<input type="text" name="login" class="input-block-level" placeholder="Nom d'utilisateur">
				<input type="password" name="pass" class="input-block-level" placeholder="Password" value="">
				<input type="hidden" name="from" value="<?php echo $_from ?>"/>
				<button class="btn btn-large btn-primary" type="submit">Valider</button>
			</form>
		</div>

		<script src="./js/jquery-1.8.3.js"></script>
		<script src="./js/bootstrap.min.js"></script>
	</body>
</html>