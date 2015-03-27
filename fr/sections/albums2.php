<hr class="nl-md">
<div class="container">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="text-center">
					Albums
				</h1>
				<h4 class="text-center">
					Cliquer sur l'image pour accéder à l'album
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<?php
					$res = $db->query("select p.album as id, p.path as photo, a.al_nom as nom from pictures p inner join Album a on p.album = a.id group by p.album;");
					$i = 0;
					while ( $album = $res->fetch( PDO::FETCH_ASSOC ) ):
						$i+=1;
					?>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<a href="album.php?id=<?php print $album['id']; ?>"><img src="pictures/<?php print $album['photo']; ?>" alt="" height="150px"width="250px" class="img-thumbnail"></a>
					</div>
				<?php
					endwhile;
				?>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
	</section>
</div>

<!--deux boucles imbriquées
	- lignes
	- images

