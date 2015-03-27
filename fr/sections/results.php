<hr class="nl-md">
<div class="container text-center">
	<section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="container text-center">
					Classement
				</h1>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table">
					<colgroup>
						<col width="5%">
						<col width="20%">
						<col width="10%">
						<col width="5%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
					</colgroup>
					<thead id="res">
						<tr>
							<th></th>
							<th>Nom</th>
							<th>Points</th>
							<th>Joués</th>
							<th>Victoires</th>
							<th>Nuls</th>
							<th>Défaites</th>
							<th>But mis</th>
							<th>But pris</th>
							<th>Différence</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include("conf.php");
							$res = $db->query("select * from results order by Points DESC, Difference DESC;");
							$i = 1;
							while ($result = $res->fetch(PDO::FETCH_ASSOC) ) :
								if ($i <= 2) :
						?>
							<tr class="premiers">
								<td><?php echo $i;?></td>
								<td><?php echo $result['Nom'];?></td>
								<td><?php echo $result['Points'];?></td>
								<td><?php echo $result['Joues'];?></td>
								<td><?php echo $result['Victoires'];?></td>
								<td><?php echo $result['Nuls'];?></td>
								<td><?php echo $result['Defaites'];?></td>
								<td><?php echo $result['But_mis'];?></td>
								<td><?php echo $result['But_pris'];?></td>
								<td><?php echo $result['Difference'];?></td>
							</tr>
						<?php
						 		$i++;
								else :
						?>
							<tr class="derniers">
								<td><?php echo $i;?></td>
								<td><?php echo $result['Nom'];?></td>
								<td><?php echo $result['Points'];?></td>
								<td><?php echo $result['Joues'];?></td>
								<td><?php echo $result['Victoires'];?></td>
								<td><?php echo $result['Nuls'];?></td>
								<td><?php echo $result['Defaites'];?></td>
								<td><?php echo $result['But_mis'];?></td>
								<td><?php echo $result['But_pris'];?></td>
								<td><?php echo $result['Difference'];?></td>
							</tr>
						<?php
								$i++;
								endif;
							endwhile;
						?>
					</tbody>
				</table>
			</div>
		</div>
		<hr class="nl-md">
	</section>
</div>