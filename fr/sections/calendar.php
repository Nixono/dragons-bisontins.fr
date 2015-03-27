<hr class="nl-md">
<div class="container">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="text-center">
					Calendrier
				</h1>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div class="items">
					<div class="item">
						<table class="table text-center">
							<thead>
								<th colspan="3"><small>Événements à venir</small></th>
							</thead>
							<thead>
								<th>Quoi ?</th>
								<th>Où ?</th>
								<th>Quand ?</th>
							</thead>
							<tbody>
								
							<?php
								include("conf.php");
								$res = $db->query("select * from Evenement order by ev_date_debut;");
								$i = 1;
								while ($result = $res->fetch(PDO::FETCH_ASSOC) ) :
							?>
								<tr>
									<td><?php echo $result['ev_titre']; ?></td>
									<td><?php echo $result['ev_lieu']; ?></td>
									<?php 
										$dateDebut = $result['ev_date_debut'];
										$dateDebutExplode = explode('-', $dateDebut);
										$annee = $dateDebutExplode[0];
										$mois = $dateDebutExplode[1];
										$jour1 = $dateDebutExplode[2];
										
										$dateFin = $result['ev_date_fin'];
										$dateFinExplode = explode('-', $dateFin);
										$jour2 = $dateFinExplode[2];

										switch ($mois) {
											case 1:
												$mois = "Janvier";
												break;
											case 2:
												$mois = "Février";
												break;
											case 3:
												$mois = "Mars";
												break;
											case 4:
												$mois = "Avril";
												break;
											case 5:
												$mois = "Mai";
												break;
											case 6:
												$mois = "Juin";
												break;
											case 7:
												$mois = "Juillet";
												break;
											case 8:
												$mois = "Août";
												break;
											case 9:
												$mois = "Septembre";
												break;
											case 10:
												$mois = "Octobre";
												break;
											case 11:
												$mois = "Novembre";
												break;
											case 12:
												$mois = "Décembre";
												break;
											default:
												$mois = "Erreur";
												break;
										}
										$date = $jour1 . ' - ' . $jour2 . ' ' . $mois . ' ' . $annee;
									?>
									<td><?php echo $date; ?></td>
								</tr>
							<?php 
								endwhile;
							?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
	</section>
</div>