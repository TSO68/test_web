<center>
		<?php
			echo "<div class=\"liste\">";
			while($uneRecette=$lesRecettes->fetch(PDO::FETCH_OBJ))
			{
					echo "
							<div class=\"col-lg-4\">
								<a href=\"index.php?do=detail&idRecette=".$uneRecette->idRec."\">
									<img class=\"img-circle\" src=".$uneRecette->adresse.">
								</a>
								<h2 style=\"color:#db1111; font-weight:900\">".$uneRecette->nom."</h2>
								<h3 style=\"color:#fff\">".$uneRecette->difficulte."</h3>
								<br>
							</div>
					";
			}
			echo "</div>";
		?>
</center>