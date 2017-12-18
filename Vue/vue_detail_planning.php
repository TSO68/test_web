<center>
	<?php
		echo "<div class=\"liste\">
				<div class=\"row\">
					<br>
					<div class=\"col-lg-12\" style=\"color:#fff; text-align: justify;\" align=\"left\">
						<br>
						<h3 style=\"margin-left:18%; font-weight:700;\">Ingrédients : </h3>";
						foreach($uneRecette as $donnees) {
							echo "<h3 style=\"margin-left:18%; margin-right:18%; font-size:20px\">".$donnees->recNom." ".$donnees->utilNom." ".$donnees->dateServi."</h3>";
						}
				echo "</div>
				</div>
			  </div>";
	?>
</center>