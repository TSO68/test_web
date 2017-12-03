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
							<h3 style=\"font-size:30px; font-weight:900; margin-top: 0px; margin-bottom: 7px; color:#db1111;\">".$uneRecette->libRec."</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">Auteur : ".$uneRecette->utilNom." ".$uneRecette->prenom."</h3>							
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">Difficulté : ".$uneRecette->difficulte."</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">Prix : ".$uneRecette->prix." sur 5</h3>
							<h3 style=\"margin-top: 0px; margin-bottom: 7px; font-size:20px\">Pour ".$uneRecette->nbPersonnes." personne(s)</h3>		
						</div>
					</div>
					<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Ingrédients : </h3>";
						foreach($unIngredient as $donnees) {
							echo "<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$donnees->qte." ".$donnees->libIng."</h3>";
						}
						echo "<h3 style=\"margin-left:18%; font-weight:700;\">Valeur nutritionelle : </h3>	
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->cal." calories</h3>
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->prot." protéines</h3>
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->glu." glucides</h3>
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->lip." lipides</h3>
						<h3 style=\"margin-left:18%; font-weight:700;\">Descriptif : </h3>	
						<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$uneRecette->descriptif."</h3>
					</div>
				</div>
			  </div>";
	?>
</center>