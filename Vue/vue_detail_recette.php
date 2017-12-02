<center>
	<?php	
		echo "<div class=\"liste\">
				<div class=\"row\">
					<br>
					<div class=\"col-lg-6\">
						<img class=\"img-rounded\" style=\"max-width: 80%; height:auto;\" src=".$uneRecette->adresse.">		
					</div>
					<div class=\"col-lg-6\" style=\"color:#fff;\" align=\"left\">
						<div style=\"margin-left:18%; margin-right:37%;\">
							<h3 style=\"font-size:30px; font-weight:900; margin-top: 0px; margin-bottom: 7px; color:#db1111;\">".$uneRecette->nom."</h3> 
							<h3 style=\"font-weight:700; margin-top: 0px; margin-bottom: 7px;\">".$uneRecette->difficulte."</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">".$uneRecette->nbPersonnes."</h3>		
						</div>
					</div>
					<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Descriptif : </h3>	
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->descriptif."</h3>						
					</div>
				</div>
			  </div>";
	?>
</center>