<!doctype html>
<html>
	<head>
		<?php include_once "sections/head.php"; ?>
	</head>
<hr class="nl-md">
<div class="container">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="text-center">
					News
				</h1>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

				<p class="lead text-justify">
					<?php 
						require_once("feedparser.php");
						echo FeedParser("http://floorball.fr/spip.php?page=backend", 6);
					?>
				</p>

			</div>
			
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
	</section>
</div>