<hr class="nl-md">
<div class="container">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="text-center">
					<?php
						$res = $db->prepare("select nom from album where id=?;");
						$res->execute(array(
							$_GET['id']
						));
						$albumName = $res->fetch(PDO::FETCH_NUM);
						$albumName = $albumName[0];
						$res->closeCursor();
					?>
					<?php print $albumName; ?>
				</h1>
				<h4 class="text-center">
					<a href="albums.php">&larr; Retour aux albums</a>
				</h4>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

				<div id="carPhotos" class="carousel slide">
					<div class="carousel-inner">
						<?php
							$res = $db->prepare("select * from pictures where album = :album;");
							$res->bindParam( ":album", $_GET['id'], PDO::PARAM_INT );
							$res->execute();
							$pictures = $res->fetchAll( PDO::FETCH_ASSOC );
							$res->closeCursor();
							$i = 0;
			    			foreach ( $pictures as $picture ):
			    				$active = $i === 0 ? "active" : "";
			    				$i+=1;
						?>

								<div class="item <?php print $active; ?>">
									<img src="pictures/<?php print $picture['path']; ?>" alt="" width="60%">
								</div>

						<?php
							endforeach;
						?>
					</div>
					<a class="left carousel-control" href="#carPhotos" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></a>
					<a class="right carousel-control" href="#carPhotos" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></a>
				</div>
			</div>
			
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
	</section>
</div>