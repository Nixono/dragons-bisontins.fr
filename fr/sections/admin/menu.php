		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img src="../pictures/site/favicon.png" width="30px"> Club Unihockey Bisontin - Partie admin</a>
				</div>
				
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="Actualite.detail.php">News</a></li>
						<li><a href="Event.detail.php">Evenements</a></li>	
						<li><a href="Results.detail.php">Classement</a></li>	
						<li><a href="Album.detail.php">Albums</a></li>
						<li><a href="Album.detail.php">Photos (TODO)</a></li>
						<?php 
							if((isset($_SESSION['auth'])) && ($_SESSION['auth'] == 1)){
						?>
							<li><a href="unauth.php">Déconnexion</a></li>

						<?php 
							}
							else{
						?>
							<li><a href="auth.php">Connexion</a></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
        </nav>