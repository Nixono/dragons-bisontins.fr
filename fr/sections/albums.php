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

				<div id="albums" class="carousel slide">
					<div class="carousel-inner">
						<?php
							$res = $db->query("select p.album as id, p.path as photo, a.al_nom as nom from pictures p inner join Album a on p.album = a.id group by p.album;");
							$i = 0;
			    			while ( $album = $res->fetch( PDO::FETCH_ASSOC ) ):
			    				$active = $i === 0 ? "active" : "";
			    				$i+=1;
						?>

								<div class="item <?php print $active; ?>">
									<img src="pictures/<?php print $album['photo']; ?>" alt="" width="60%"
									onclick="javascript:window.location='album.php?id=<?php print $album['id']; ?>';">
									<div class="carousel-caption">
										<h4><?php print $album['nom']; ?></h4>
									</div>
								</div>

						<?php
							endwhile;
						?>
					</div>
					<a class="left carousel-control" href="#albums" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#albums" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>

			</div>
			
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
	</section>
</div>