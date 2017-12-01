<center>
	<?php
	$date= explode("-",$unStaff->dateNaiss);
	
		echo "<div class=\"liste\">
				<div class=\"row\">
					<br>
					<div class=\"col-lg-6\">
						<img class=\"img-rounded\" style=\"max-width: 80%; height:auto;\" height=\"200\" width=\"140\" src=".$unStaff->lien.">		
					</div>
					<div class=\"col-lg-6\" style=\"color:#fff;\" align=\"left\">
						<div style=\"margin-left:18%; margin-right:37%;\">
							<h3 style=\"font-weight:700; margin-top: 0px; margin-bottom: 7px;\">".$unStaff->nom." ".$unStaff->prenom."</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">".$unStaff->libelle." <br>Né le ".$date[2]."/".$date[1]."/".$date[0]." à ".$unStaff->lieuNaiss." <br> Nationalité : ".$unStaff->libelleNat."</h3>		
						</div>
					</div>
					<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Biographie : </h3>	
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$unStaff->biographie."</h3>						
					</div>
				</div>
				<br>
			  </div>";
	?>
</center>