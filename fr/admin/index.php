<?php include_once "../sections/admin/head.php";
		if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1){
			header('Location: auth.php');
			die();
		} 
		?>
	</head>

	<body>
		<?php include_once "../sections/admin/home.php"; ?>
		<br>
		<br>
		<br>
		<?php include_once "../sections/admin/footer.php"; ?>

		<?php include_once "../js.php"; ?>
	</body>
</html>