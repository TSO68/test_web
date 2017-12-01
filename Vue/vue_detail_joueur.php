<center>
	<?php
	
	$nbMatchsJoues=0 + $unJoueur->nbMatchsJoues;
	$minutesJouees=0 + $unJoueur->nbMinutesJouees;
	$nbButs=0 + $unJoueur->nbButs;
	$nbPassesDe=0 + $unJoueur->nbPassesDe;
	$nbCartonsJaunes=0 + $unJoueur->nbCartonsJaunes;
	$nbCartonsRouges=0 + $unJoueur->nbCartonsRouges; 
	
	$date= explode("-",$unJoueur->dateNaiss);
	
		echo "<div class=\"liste\">
				<div class=\"row\">
					<br>
					<div class=\"col-lg-6\">
						<img class=\"img-rounded\" style=\"max-width: 80%; height:auto;\" src=".$unJoueur->lien.">		
					</div>
					<div class=\"col-lg-6\" style=\"color:#fff;\" align=\"left\">
						<div style=\"margin-left:18%; margin-right:37%;\">
							<h3 style=\"font-size:30px; font-weight:900; margin-top: 0px; margin-bottom: 7px; color:#db1111;\">".$unJoueur->num."</h3> 
							<h3 style=\"font-weight:700; margin-top: 0px; margin-bottom: 7px;\">".$unJoueur->nom." ".$unJoueur->prenom."</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">".$unJoueur->libelle." <br>Né le ".$date[2]."/".$date[1]."/".$date[0]." à ".$unJoueur->lieuNaiss." <br>".$unJoueur->taille." m, ".$unJoueur->poids." kg, ".$unJoueur->pied." <br>".$unJoueur->venueClub."<br> Nationalité : ".$unJoueur->libelleNat."</h3>		
						</div>
					</div>
					<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Biographie : </h3>	
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$unJoueur->biographie."</h3>						
					</div>
					<div class=\"col-lg-12\" style=\"color:#fff;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Statistiques : </h3>
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$nbMatchsJoues." Match(s) Joué(s) <br>".$minutesJouees." Minute(s) Jouée(s) <br>".$nbButs." But(s) Inscrit(s) <br>".$nbPassesDe." Passe(s) Décisive(s) <br>".$nbCartonsJaunes." Carton(s) Jaune(s)<br>".$nbCartonsRouges." Carton(s) Rouge(s)</h3>
					</div>
				</div>
				<br>
			  </div>";
	?>
</center>